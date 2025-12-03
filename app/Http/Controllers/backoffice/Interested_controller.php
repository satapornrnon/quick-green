<?php

namespace App\Http\Controllers\Backoffice;

use App\Http\Controllers\Controller;
use App\Models\Interested;
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
                    "interested_status" => get_interested_label($value->interested_status),
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
            $data_save = [
                'interested_status' => $request->interested_status,
                'finish_date' => Config::get('myarrays.current_date'),
                'finish_time' => Config::get('myarrays.current_time'),
                'finish_by' => auth()->id() ?? 0,
                'remark' => $request->remark,
                'updated_at' => Config::get('myarrays.current_datetime'),
                'updated_by' => auth()->id() ?? 0,
            ];
            $success = DB::table('tbl_interested')->where('id', $request->interested_id)->update($data_save);

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
            echo json_encode(array("success" => true, 'message' => 'บันทึกข้อมูลเรียบร้อยแล้ว'));
        } else {
            echo json_encode(array("success" => false, 'message' => 'เกิดข้อผิดพลาด'));
        }
    }
}
