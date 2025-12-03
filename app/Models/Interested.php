<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Interested extends Model
{
    use HasFactory;

    protected $table = 'tbl_interested';

    protected $fillable = [
        'product_id', 
        'interested_date', 
        'interested_time', 
        'interested_code', 
        'interested_status', 
        'first_name', 
        'last_name', 
        'mobile', 
        'time_callback', 
        'more_information', 
        'accept_policy', 
        'finish_date', 
        'finish_time', 
        'remark', 
        'created_at', 
        'created_by', 
        'updated_at', 
        'updated_by', 
        'deleted'
    ];

    public static function get_data_dashboard()
    {
        $data = array();

        $data['count_all'] = DB::table('tbl_interested')->where('deleted', 0)->count();
        $data['count_pending'] = DB::table('tbl_interested')->where('deleted', 0)->where('interested_status', '=', "pending")->count();
        $data['count_in_progress'] = DB::table('tbl_interested')->where('deleted', 0)->where('interested_status', '=', "in_progress")->count();
        $data['count_completed'] = DB::table('tbl_interested')->where('deleted', 0)->where('interested_status', '=', "completed")->count();
        $data['count_cancelled'] = DB::table('tbl_interested')->where('deleted', 0)->where('interested_status', '=', "cancelled")->count();

        return $data;
    }
}
