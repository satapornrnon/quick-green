<?php

namespace App\Http\Controllers\Backoffice;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;

class Login_controller extends Controller
{
    public function index()
    {
        return view('backoffice.login.index');
    }

    public function authenticate(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        try {
            $result = DB::table('tbl_user')->where('username', $request->username)->first();

            if (!$result || !Hash::check($request->password, $result->password)) {
                return response()->json([
                    'success' => false,
                    'message' => 'ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง'
                ]);
            }

            $data_session = [
                'user_id' => $result->id,
                'roles_id' => $result->roles_id,
                'username' => $result->username,
                'first_name' => $result->first_name,
                'last_name' => $result->last_name,
                'email' => $result->email,
                'user_type' => $result->user_type,
                'is_logged_in' => true,
            ];
            session($data_session);

            return response()->json([
                'success' => true,
                'message' => 'เข้าสู่ระบบสำเร็จ'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ]);
        }
    }
}
