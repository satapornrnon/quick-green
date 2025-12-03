<?php

namespace App\Http\Controllers\Backoffice;

use App\Http\Controllers\Controller;
use App\Models\Roles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;

class Roles_controller extends Controller
{
    public function index()
    {
        return view('backoffice.roles.index');
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
            2 => 'roles_name',
            3 => 'roles_permissions',
        ];

        $query = DB::table('tbl_roles')->get();

        // ถ้ามีการค้นหา
        if (!empty($search)) {
            $query->where(function($q) use ($search) {
                $q->where('roles_name', 'like', "%{$search}%")
                ->orWhere('roles_permissions', 'like', "%{$search}%");
            });
        }

        $recordsTotal = DB::table('tbl_roles')->where('deleted', 0)->count();
        $recordsFiltered = $query->count();

        // สั่ง order ตาม DataTables
        $orderColumn = $columns[$order['column']] ?? 'id';
        $roles = DB::table('tbl_roles')->where('deleted', 0)->orderBy($orderColumn, $order['dir'])->offset($start)->limit($length)->get();

        $data = [];
        foreach ($roles as $value) {

            $modal_edit  = '';
            $modal_edit .= render_button('success', 'view_modal', $value->id, 'รายละเอียด', 'fa-solid fa-magnifying-glass');

            if(get_check_roles('can_edit_roles') == 1){
                $modal_edit .= render_button('warning', 'edit_modal', $value->id, 'แก้ไขสิทธิการใช้งาน', 'far fa-edit');
            }
            if(get_check_roles('can_deleted_roles') == 1){
                $modal_edit .= render_button('danger', 'cancel_modal', $value->id, 'ลบ', 'far fa-trash-alt');
            }

            $data[] = [
                $modal_edit,
                '',
                $value->roles_name,
                $value->roles_permissions,
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

        $result = DB::table('tbl_roles')->where('id', $id)->get();
        if($result->count() > 0){
            foreach ($result as $key => $value) {
                $permissions = json_decode($value->roles_permissions);

                $data = array(
                    "roles_id" => $value->id,
                    "roles_name" => $value->roles_name,
                    "can_manage_all" => $permissions->can_manage_all,
                );  
                
                foreach (config('myarrays.roles_check') as $key => $value) {
                    $roles_view = 'can_view_'. $key;
                    $roles_create = 'can_create_'. $key;
                    $roles_edit = 'can_edit_'. $key;
                    $roles_deleted = 'can_deleted_'. $key;

                    if(!isset($permissions->$roles_view)){
                        $permissions->$roles_view = 0;
                    }
                    if(!isset($permissions->$roles_create)){
                        $permissions->$roles_create = 0;
                    }
                    if(!isset($permissions->$roles_edit)){
                        $permissions->$roles_edit = 0;
                    }
                    if(!isset($permissions->$roles_deleted)){
                        $permissions->$roles_deleted = 0;
                    }

                    $data['checked'][] = array(
                        'roles_view' => $roles_view,
                        'roles_view_value' => $permissions->$roles_view,
                        'roles_create' => $roles_create,
                        'roles_create_value' => $permissions->$roles_create,
                        'roles_edit' => $roles_edit,
                        'roles_edit_value' => $permissions->$roles_edit,
                        'roles_deleted' => $roles_deleted,
                        'roles_deleted_value' => $permissions->$roles_deleted,
                    );
                }
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

        $result = DB::table('tbl_roles')->where('id', $id)->get();
        if($result->count() > 0){
            foreach ($result as $key => $value) {
                $permissions = json_decode($value->roles_permissions);

                $data = array(
                    "roles_name" => $value->roles_name,
                );  
                
                foreach (config('myarrays.roles_check') as $key => $value) {
                    $roles_view = 'can_view_'. $key;
                    $roles_create = 'can_create_'. $key;
                    $roles_edit = 'can_edit_'. $key;
                    $roles_deleted = 'can_deleted_'. $key;

                    $data['roles_permissions'][$key] = array(
                        'roles_permissions_name' => $value,
                        'roles_view' => (!isset($permissions->$roles_view)) ? '<i class="fa-solid fa-xmark" style="color: #700101;"></i>' : '<i class="fa-solid fa-check" style="color: #017057;"></i>',
                        'roles_create' => (!isset($permissions->$roles_create)) ? '<i class="fa-solid fa-xmark" style="color: #700101;"></i>' : '<i class="fa-solid fa-check" style="color: #017057;"></i>',
                        'roles_edit' => (!isset($permissions->$roles_edit)) ? '<i class="fa-solid fa-xmark" style="color: #700101;"></i>' : '<i class="fa-solid fa-check" style="color: #017057;"></i>',
                        'roles_deleted' => (!isset($permissions->$roles_deleted)) ? '<i class="fa-solid fa-xmark" style="color: #700101;"></i>' : '<i class="fa-solid fa-check" style="color: #017057;"></i>',
                    );
                }
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
            'roles_name' => 'required|string|max:255',
        ]);

        try {
            $permissions = array(
                "can_manage_all" => $request->can_manage_all,
            );

            foreach (config('myarrays.roles_check') as $key => $value) {
                $roles_view = 'can_view_'. $key;
                $roles_create = 'can_create_'. $key;
                $roles_edit = 'can_edit_'. $key;
                $roles_deleted = 'can_deleted_'. $key;

                $permissions[$roles_view] = $request->$roles_view;
                $permissions[$roles_create] = $request->$roles_create;
                $permissions[$roles_edit] = $request->$roles_edit;
                $permissions[$roles_deleted] = $request->$roles_deleted;
            }

            $data_save = array(
                "roles_name" => $request->roles_name,
                "roles_permissions" => json_encode($permissions, JSON_UNESCAPED_UNICODE),
            );

            if(!$request->roles_id){
                $data_save['created_at'] = Config::get('myarrays.current_datetime');
                $data_save['created_by'] = auth()->id() ?? 0;

                $success = DB::table('tbl_roles')->insert($data_save);
            } else {
                $data_save['updated_at'] = Config::get('myarrays.current_datetime');
                $data_save['updated_by'] = auth()->id() ?? 0;

                $success = DB::table('tbl_roles')->where('id', $request->roles_id)->update($data_save);
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
        $success = DB::table('tbl_roles')->where('id', $id)->update($data);
        if($success){
            echo json_encode(array("success" => true, 'message' => 'บันทึกข้อมูลเรียบร้อยแล้ว'));
        } else {
            echo json_encode(array("success" => false, 'message' => 'เกิดข้อผิดพลาด'));
        }
    }
}
