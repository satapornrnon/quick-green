<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Config;

class Logs extends Model
{
    use HasFactory;

    protected $table = 'tbl_logs';

    protected $fillable = [
        'user_id', 
        'datetime', 
        'name', 
        'subject', 
        'detail', 
        'type', 
        'ip_address', 
    ];

    public static function writeLog($subject, $detail, $type)
    {
        $data = [
            'user_id'   => session('user_id'),
            'datetime'  => Config::get('myarrays.current_datetime'),
            'name'      => session('first_name') . ' ' . session('last_name'),
            'subject'   => $subject,
            'detail'    => $detail,
            'type'      => $type,
            'ip_address'=> request()->ip(),   // ใช้ request() ได้ใน static
        ];

        return DB::table('tbl_logs')->insert($data);
    }
}
