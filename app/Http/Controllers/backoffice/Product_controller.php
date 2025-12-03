<?php

namespace App\Http\Controllers\Backoffice;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Logs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;

class Product_controller extends Controller
{
    public function index()
    {
        return view('backoffice.product.index');
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
            0 => 'id',
            1 => 'id',
            2 => 'product_code',
            3 => 'product_name',
            4 => 'product_status',
            5 => 'product_image',
            6 => 'product_cover',
        ];

        $query = DB::table('tbl_product')->get();

        // ถ้ามีการค้นหา
        if (!empty($search)) {
            $query->where(function($q) use ($search) {
                $q->where('product_name', 'like', "%{$search}%")
                ->orWhere('product_code', 'like', "%{$search}%");
            });
        }

        $recordsTotal = DB::table('tbl_product')->where('deleted', 0)->count();
        $recordsFiltered = $query->count();

        // สั่ง order ตาม DataTables
        $orderColumn = $columns[$order['column']] ?? 'id';
        $products = DB::table('tbl_product')->where('deleted', 0)->orderBy($orderColumn, $order['dir'])->offset($start)->limit($length)->get();

        $data = [];
        foreach ($products as $value) {

            $product_status = $value->product_status == 'on' ? "<span class='badge bg-success'>เปิด</span>" : "<span class='badge bg-danger'>ปิด</span>";
            $product_image = $value->product_image ? '<img class="img-thumbnail" src="'. asset('uploads/product/'. $value->product_image) .'" width="65">' : '';
            $product_cover = $value->product_cover ? '<img class="img-thumbnail" src="'. asset('uploads/cover/'. $value->product_cover) .'" width="125">' : '';

            $modal_edit  = '';
            if(get_check_roles('can_edit_product') == 1){
                $modal_edit .= render_button('warning', 'edit_modal', $value->id, 'แก้ไขผลิตภัณฑ์สินเชื่อ', 'far fa-edit');
            }
            if(get_check_roles('can_deleted_product') == 1){
                $modal_edit .= render_button('danger', 'cancel_modal', $value->id, 'ลบ', 'far fa-trash-alt');
            }

            $data[] = [
                $modal_edit,
                '',
                $value->product_code,
                $value->product_name,
                $product_status,
                $product_image,
                $product_cover,
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

        $result = DB::table('tbl_product')->where('id', $id)->get();
        if($result->count() > 0){
            foreach ($result as $key => $value) {
                
                if($value->product_image){
                    $product_image = '<a href="'. asset('uploads/product/'. $value->product_image) .'" target="_blank">';
                    $product_image .=     '<img class="img-thumbnail" src="'. asset('uploads/product/'. $value->product_image) .'" alt="Preview image" width="75">';
                    $product_image .= '</a>';
                } else {
                    $product_image = '';
                }

                if($value->product_cover){
                    $product_cover = '<a href="'. asset('uploads/product/'. $value->product_cover) .'" target="_blank">';
                    $product_cover .=     '<img class="img-thumbnail" src="'. asset('uploads/cover/'. $value->product_cover) .'" alt="Preview image" width="175">';
                    $product_cover .= '</a>';
                } else {
                    $product_cover = '';
                }

                $data = array(
                    "product_id" => $value->id,
                    "product_name" => $value->product_name,
                    "product_description" => $value->product_description,
                    "product_status" => $value->product_status,
                    "product_image" => $product_image,
                    "product_cover" => $product_cover,
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
            'product_name' => 'required|string|max:255',
            'product_description' => 'required'
        ]);

        try {
            $data_save = [
                'product_name' => $request->product_name,
                'product_description' => $request->product_description,
                'product_status' => $request->product_status,
            ];

            if ($request->hasFile('product_image')) {
                $product_image = move_temp_file($request->file('product_image'), public_path('uploads/product'), 'product');
                $data_save['product_image'] = $product_image['file_name'];
            }

            if ($request->hasFile('product_cover')) {
                $product_cover = move_temp_file($request->file('product_cover'), public_path('uploads/cover'), 'cover');
                $data_save['product_cover'] = $product_cover['file_name'];
            }

            if(!$request->product_id){
                $data_save['product_code'] = gen_product_code();
                $data_save['created_at'] = Config::get('myarrays.current_datetime');
                $data_save['created_by'] = session('user_id');

                $success = DB::table('tbl_product')->insert($data_save);
            } else {
                $data_save['updated_at'] = Config::get('myarrays.current_datetime');
                $data_save['updated_by'] = session('user_id');

                $success = DB::table('tbl_product')->where('id', $request->product_id)->update($data_save);
            }

            if($success) {
                $data_log = array(
                    'subject' => (!$request->roles_id) ? 'เพิ่มข้อมูล' : 'แก้ไขข้อมูล', 
                    'detail' => (!$request->roles_id) ? 'เพิ่มข้อมูลผลิตภัณฑ์ บทบาท : '. $request->product_name : 'แก้ไขข้อมูลผลิตภัณฑ์ บทบาท : '. $request->product_name, 
                    'type' => (!$request->roles_id) ? 'Insert' : 'Update', 
                );
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
        $success = DB::table('tbl_product')->where('id', $id)->update($data);
        if($success){
            $product = DB::table('tbl_product')->where('id', $id)->first();

            $data_log = array(
                'subject' => 'ลบข้อมูล', 
                'detail' => 'ลบข้อมูลผลิตภัณฑ์ ชื่อสินค้า : '. $product->product_name, 
                'type' => 'Deleted', 
            );
            Logs::writeLog($data_log['subject'], $data_log['detail'], $data_log['type']);

            echo json_encode(array("success" => true, 'message' => 'บันทึกข้อมูลเรียบร้อยแล้ว'));
        } else {
            echo json_encode(array("success" => false, 'message' => 'เกิดข้อผิดพลาด'));
        }
    }

    private function _upload_file($field, $path, $prefix){
        if(isset($_FILES[$field]) && $_FILES[$field]['size'] > 0){
            $file_data = move_temp_file($_FILES[$field], $path, $prefix, $_FILES[$field]['tmp_name']);
            return $file_data['file_name'];
        }
        return '';
    }
}