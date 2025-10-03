<?php

namespace App\Http\Controllers;

use App\Models\Interested;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;

class Product_controller extends Controller
{
	public function __construct()
    {
    }

    public function solar()
    {
        $data = array(
            'product_id' => 1,
            'interested_url' => url('/product/solar'),
        );
        return view('product.solar', $data);
    }

    public function inverter()
    {
        $data = array(
            'product_id' => 2,
            'interested_url' => url('/product/inverter'),
        );
        return view('product.inverter', $data);
    }

    public function sensor()
    {
        $data = array(
            'product_id' => 3,
            'interested_url' => url('/product/sensor'),
        );
        return view('product.sensor', $data);
    }

    public function save(Request $request)
    {
        $data_save = [
            'product_id' => $request->input('product_id'),
            'interested_date' => Config::get('myarrays.current_date'),
            'interested_time' => Config::get('myarrays.current_time'),
            'interested_status' => 'pending',
            'interested_code' => gen_interested_code(),
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'mobile' => str_replace("-", "", $request->input('mobile')),
            'more_information' => $request->input('more_information') ?? '',
            'time_callback' => Config::get('myarrays.time_callback')[$request->input('time_callback')],
            'accept_policy' => $request->input('accept_policy'),
            'created_at' => Config::get('myarrays.current_datetime'),
        ];
        $success = DB::table('tbl_interested')->insert($data_save);
        if ($success) {
            return response()->json(['status' => true, 'message' => 'บันทึกข้อมูลเรียบร้อยแล้ว']);
        } else {
            return response()->json(['status' => false, 'message' => 'เกิดข้อผิดพลาด']);
        }
    }
}
