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
            $modal_edit .= '<button type="button" class="btn btn-sm btn-outline-warning mx-1 edit_modal" data-post-id="'. $value->id .'" title="แก้ไขรายงานลงทะเบียน" data-title="แก้ไขรายงานลงทะเบียน"><i class="far fa-edit"></i></button>';
            $modal_edit .= '<button type="button" class="btn btn-sm btn-outline-danger mx-1 cancel_modal" data-post-id="'. $value->id .'" title="ลบ"><i class="far fa-trash-alt"></i></button>';

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
}
