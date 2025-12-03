<?php

namespace App\Http\Controllers\Backoffice;

use App\Http\Controllers\Controller;
use App\Models\Logs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;

class Logout_controller extends Controller
{
    public function logout()
    {
        
        $data_log = array(
            'subject' => 'ออกจากระบบ', 
            'detail' => 'ออกจากระบบ ชื่อ-นามสกุล : '. session('first_name') .' '. session('last_name'), 
            'type' => 'Logout', 
        );
        Logs::writeLog($data_log['subject'], $data_log['detail'], $data_log['type']);

        Auth::logout();

        // เคลียร์ session ทั้งหมด
        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect('/backoffice/login')->with('success', 'ออกจากระบบเรียบร้อยแล้ว');
    }
}
