<?php

namespace App\Http\Controllers\Backoffice;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;

class User_controller extends Controller
{
    public function index()
    {
        $roles = DB::table('tbl_roles')->where('deleted', 0);

        return view('backoffice.user.index', ['roles' => $roles]);
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
            0 => 'tbl_user.id',
            1 => 'tbl_user.id',
            2 => 'first_name',
            3 => 'last_name',
            4 => 'email',
            5 => 'user_type',
            6 => 'roles_name',
            7 => 'status',
        ];

        $query = DB::table('tbl_user')->get();

        // ถ้ามีการค้นหา
        if (!empty($search)) {
            $query->where(function($q) use ($search) {
                $q->where('first_name', 'like', "%{$search}%")
                ->orWhere('last_name', 'like', "%{$search}%")
                ->orWhere('email', 'like', "%{$search}%")
                ->orWhere('user_type', 'like', "%{$search}%")
                ->orWhere('status', 'like', "%{$search}%");
            });
        }

        $recordsTotal = DB::table('tbl_user')->where('deleted', 0)->count();
        $recordsFiltered = $query->count();

        // สั่ง order ตาม DataTables
        $orderColumn = $columns[$order['column']] ?? 'id';
        $users = DB::table('tbl_user')->leftJoin('tbl_roles', 'tbl_user.roles_id', '=', 'tbl_roles.id')->where('tbl_user.deleted', 0)->orderBy($orderColumn, $order['dir'])->offset($start)->limit($length)->get();

        $data = [];
        foreach ($users as $value) {

            $modal_edit  = '';
            $modal_edit .= render_button('success', 'view_modal', $value->id, 'รายละเอียด', 'fa-solid fa-magnifying-glass');

            if(get_check_roles('can_edit_user') == 1){
                $modal_edit .= render_button('warning', 'edit_modal', $value->id, 'แก้ไขผู้ใช้งานระบบ', 'far fa-edit');
            }
            if(get_check_roles('can_deleted_user') == 1){
                $modal_edit .= render_button('danger', 'cancel_modal', $value->id, 'ลบ', 'far fa-trash-alt');
            }

            $data[] = [
                $modal_edit,
                '',
                $value->first_name .' '. $value->last_name,
                $value->email,
                $value->user_type,
                $value->roles_name,
                get_user_status_label($value->status),
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

        $result = DB::table('tbl_user')->where('id', $id)->get();
        if($result->count() > 0){
            foreach ($result as $key => $value) {
                $data = array(
                    "user_id" => $value->id,
                    "roles_id" => $value->roles_id,
                    "first_name" => $value->first_name,
                    "last_name" => $value->last_name,
                    "email" => $value->email,
                    "user_type" => $value->user_type,
                    "status" => $value->status,
                );  
            }
        }
    
        $responseData = array(
            "search_data" => $data 
        );
    
        echo json_encode($responseData);
    }

    public function get_view_detail(Request $request)
    {
        $id = $request->input('id');

        $result = DB::table('tbl_user')->leftJoin('tbl_roles', 'tbl_user.roles_id', '=', 'tbl_roles.id')->where('tbl_user.id', $id)->get();
        if($result->count() > 0){
            foreach ($result as $key => $value) {
                $data = array(
                    "roles_id" => $value->roles_id,
                    "roles_name" => $value->roles_name,
                    "username" => $value->username,
                    "full_name" => $value->first_name .' '. $value->last_name,
                    "email" => $value->email,
                    "user_type" => $value->user_type,
                    "status" => get_user_status_label($value->status),
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
            'username' => 'required|string|max:255',
            'password' => 'required|string|min:6',
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|max:255',
            'user_type' => 'required',
            'status' => 'required',
        ]);

        try {

            $data_save = array(
                "roles_id" => $request->roles_id,
                "username" => $request->username,
                "password" => bcrypt($request->password),
                "first_name" => $request->first_name,
                "last_name" => $request->last_name,
                "email" => $request->email,
                "user_type" => $request->user_type,
                "status" => $request->status,
            );

            if(!$request->user_id){
                $data_save['created_at'] = Config::get('myarrays.current_datetime');
                $data_save['created_by'] = auth()->id() ?? 0;

                $success = DB::table('tbl_user')->insert($data_save);
            } else {
                $data_save['updated_at'] = Config::get('myarrays.current_datetime');
                $data_save['updated_by'] = auth()->id() ?? 0;

                $success = DB::table('tbl_user')->where('id', $request->user_id)->update($data_save);
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
        $success = DB::table('tbl_user')->where('id', $id)->update($data);
        if($success){
            echo json_encode(array("success" => true, 'message' => 'บันทึกข้อมูลเรียบร้อยแล้ว'));
        } else {
            echo json_encode(array("success" => false, 'message' => 'เกิดข้อผิดพลาด'));
        }
    }
}
