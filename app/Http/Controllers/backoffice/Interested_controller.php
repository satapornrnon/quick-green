<?php

namespace App\Http\Controllers\Backoffice;

use App\Http\Controllers\Controller;
use App\Models\Interested;
use App\Models\Logs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;

class Interested_controller extends Controller
{
    public function index()
    {
        return view('backoffice.interested.index');
    }

    public function get_data(Request $request)
    {
        // ดึงค่าจาก DataTables request
        $draw   = $request->input('draw');
        $start  = $request->input('start', 0);
        $length = $request->input('length', 10);
        $order  = $request->input('order')[0] ?? ['column' => 0, 'dir' => 'asc'];
        $search = $request->input('search')['value'] ?? '';

        // mapping column index -> field name
        $columns = [
            0 => 'tbl_interested.id',
            1 => 'tbl_interested.id',
            2 => 'interested_date',
            3 => 'interested_code',
            4 => 'first_name',
            5 => 'mobile',
            6 => 'interested_status',
            7 => 'time_callback',
        ];

        $query = DB::table('tbl_interested')->leftJoin('tbl_product', 'tbl_interested.product_id', '=', 'tbl_product.id')->where('tbl_interested.deleted', 0);

        // ถ้ามีการค้นหา
        if (!empty($search)) {
            $query->where(function($q) use ($search) {
                $q->where('tbl_interested.interested_date', 'like', "%{$search}%")
                ->orWhere('tbl_interested.interested_code', 'like', "%{$search}%")
                ->orWhere('tbl_interested.interested_status', 'like', "%{$search}%")
                ->orWhere('tbl_interested.first_name', 'like', "%{$search}%")
                ->orWhere('tbl_interested.last_name', 'like', "%{$search}%")
                ->orWhere('tbl_interested.mobile', 'like', "%{$search}%")
                ->orWhere('tbl_interested.time_callback', 'like', "%{$search}%");
            });
        }

        // นับจำนวนทั้งหมด
        $recordsTotal = DB::table('tbl_interested')->where('deleted', 0)->count();
        $recordsFiltered = $query->count();

        // สั่ง order ตาม DataTables
        $orderColumn = $columns[$order['column']] ?? 'id';
        $interestedes = $query->orderBy($orderColumn, $order['dir'])->offset($start)->limit($length)->get();

        $data = [];
        foreach ($interestedes as $value) {

            $modal_edit  = '';
            if (in_array($value->interested_status, ['completed', 'cancelled'])) {
                $modal_edit .= render_button('success', 'view_modal', $value->id, 'รายละเอียด', 'fa-solid fa-magnifying-glass');
            } else {
                if(get_check_roles('can_edit_interested') == 1){
                    $modal_edit .= render_button('warning', 'edit_modal', $value->id, 'แก้ไขรายงานลงทะเบียน', 'far fa-edit');
                }
                if(get_check_roles('can_deleted_interested') == 1){
                    $modal_edit .= render_button('danger', 'cancel_modal', $value->id, 'ลบ', 'far fa-trash-alt');
                }
            }

            $data[] = [
                $modal_edit,
                '',
                datetimethai($value->interested_date .' '. $value->interested_time),
                $value->interested_code,
                $value->product_name,
                $value->first_name .' '. $value->last_name,
                mobile_format($value->mobile),
                get_interested_label($value->interested_status),
                $value->time_callback,
            ];
        }
    
        $responseData = array(
            "draw" => intval($draw),
            "recordsTotal" => $recordsTotal,
            "recordsFiltered" => $recordsFiltered,
            "data" => $data
        );
    
        echo json_encode($responseData);
    }

    public function get_detail(Request $request)
    {
        $id = $request->input('id');

        $result = DB::table('tbl_interested')->leftJoin('tbl_product', 'tbl_interested.product_id', '=', 'tbl_product.id')->where('tbl_interested.id', $id)->get();
        if($result->count() > 0){
            foreach ($result as $key => $value) {
                $data = array(
                    "interested_id" => $value->id,
                    "product_name" => $value->product_name,
                    "datetime" => datethai($value->interested_date .' '. $value->interested_time),
                    "interested_code" => $value->interested_code,
                    "interested_status" => $value->interested_status,
                    "interested_status_show" => get_interested_label($value->interested_status),
                    "full_name" => $value->first_name .' '. $value->last_name,
                    "mobile" => mobile_format($value->mobile),
                    "time_callback" => $value->time_callback,
                    "finish_date" => ($value->finish_date != null) ? datethai($value->finish_date) : '',
                    "finish_time" => ($value->finish_time != null) ? timethai($value->finish_time) : '',
                    "remark" => ($value->remark != null) ? $value->remark : '-',
                );
            }
        }
    
        $responseData = array(
            "search_data" => $data 
        );
    
        echo json_encode($responseData);
    }

    public function save(Request $request)
    {
        $request->validate([
            'interested_status' => 'required'
        ]);

        try {
            if(!$request->interested_id){
                $data = [
                    'product_id' => $request->product_id,
                    'interested_date' => Config::get('myarrays.current_date'),
                    'interested_time' => Config::get('myarrays.current_time'),
                    'interested_status' => 'pending',
                    'interested_code' => gen_interested_code(),
                    'first_name' => $request->first_name,
                    'last_name' => $request->last_name,
                    'mobile' => str_replace("-", "", $request->mobile),
                    'more_information' => $request->more_information ?? '',
                    'time_callback' => Config::get('myarrays.time_callback')[$request->input('time_callback')],
                    'accept_policy' => 1,
                    'created_at' => Config::get('myarrays.current_datetime'),
                    'created_by' => session('user_id'),
                ];
                $success = DB::table('tbl_interested')->insert($data);

                $data_log = array(
                    'subject' => 'เพิ่มข้อมูล', 
                    'detail' => 'เพิ่มข้อมูลลงทะเบียน เลขที่ลงทะเบียน : '. $data['interested_code'], 
                    'type' => 'Insert', 
                );
            } else {
                $interested = DB::table('tbl_interested')->where('id', $request->interested_id)->first();

                switch ($request->interested_status) {
                    case 'in_progress':
                            $data = [
                                'interested_status' => 'in_progress',
                                'in_progress_date' => Config::get('myarrays.current_date'),
                                'in_progress_time' => Config::get('myarrays.current_time'),
                                'in_progress_by' => session('user_id'),
                                'updated_at' => Config::get('myarrays.current_datetime'),
                                'updated_by' => session('user_id'),
                            ];

                            $data_log = array(
                                'subject' => 'อัพเดทข้อมูล', 
                                'detail' => 'เพิ่มข้อมูลลงทะเบียน เลขที่ลงทะเบียน : '. $interested->interested_code .' เปลี่ยนสถานะจาก รอดำเนินการ เป็น กำลังดำเนินการ', 
                                'type' => 'Update', 
                            );
                        break;
                    case 'completed':
                            $data = [
                                'interested_status' => 'completed',
                                'finish_date' => Config::get('myarrays.current_date'),
                                'finish_time' => Config::get('myarrays.current_time'),
                                'finish_by' => session('user_id'),
                                'remark' => $request->remark,
                                'updated_at' => Config::get('myarrays.current_datetime'),
                                'updated_by' => session('user_id'),
                            ];

                            $data_log = array(
                                'subject' => 'อัพเดทข้อมูล', 
                                'detail' => 'เพิ่มข้อมูลลงทะเบียน เลขที่ลงทะเบียน : '. $interested->interested_code .' เปลี่ยนสถานะจาก กำลังดำเนินการ เป็น เสร็จสิ้น', 
                                'type' => 'Update', 
                            );
                        break;
                    case 'cancelled':
                            $data = [
                                'interested_status' => 'cancelled',
                                'finish_date' => Config::get('myarrays.current_date'),
                                'finish_time' => Config::get('myarrays.current_time'),
                                'finish_by' => session('user_id'),
                                'remark' => $request->remark,
                                'updated_at' => Config::get('myarrays.current_datetime'),
                                'updated_by' => session('user_id'),
                            ];

                            $data_log = array(
                                'subject' => 'อัพเดทข้อมูล', 
                                'detail' => 'เพิ่มข้อมูลลงทะเบียน เลขที่ลงทะเบียน : '. $interested->interested_code .' เปลี่ยนสถานะจาก กำลังดำเนินการ เป็น ยกเลิก', 
                                'type' => 'Update', 
                            );
                        break;
                    default:
                        # code...
                        break;
                }

                $success = DB::table('tbl_interested')->where('id', $request->interested_id)->update($data);
            }

            if($success) {
                Logs::writeLog($data_log['subject'], $data_log['detail'], $data_log['type']);
            }

            return response()->json([
                'success' => true,
                'message' => 'บันทึกข้อมูลเรียบร้อยแล้ว'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ]);
        }
    }

    public function deleted(Request $request)
    {
        $id = $request->input('id');

        $data = array(
            "updated_at" => Config::get('myarrays.current_datetime'),
            "updated_by" => 0,
            "deleted" => 1,
        );
        $success = DB::table('tbl_interested')->where('id', $id)->update($data);
        if($success){
            $interested = DB::table('tbl_interested')->where('id', $id)->first();

            $data_log = array(
                'subject' => 'ลบข้อมูล', 
                'detail' => 'ลบข้อมูลลงทะเบียน เลขที่ลงทะเบียน : '. $interested->interested_code, 
                'type' => 'Deleted', 
            );
            Logs::writeLog($data_log['subject'], $data_log['detail'], $data_log['type']);

            echo json_encode(array("success" => true, 'message' => 'บันทึกข้อมูลเรียบร้อยแล้ว'));
        } else {
            echo json_encode(array("success" => false, 'message' => 'เกิดข้อผิดพลาด'));
        }
    }
}
