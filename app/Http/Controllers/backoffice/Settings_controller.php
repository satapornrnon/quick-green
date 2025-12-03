<?php

namespace App\Http\Controllers\Backoffice;

use App\Http\Controllers\Controller;
use App\Models\Settings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;

class Settings_controller extends Controller
{
    public function genenal()
    {
        return view('backoffice.settings.general');
    }

    public function get_setting_genenal(Request $request)
    {
        $data = array(
            'logo' => asset('uploads/system/'. Settings::get('logo')),
            'favicon' => asset('uploads/system/'. Settings::get('favicon')),
            'website_title' => Settings::get('website_title'),
            'company_name' => Settings::get('company_name'),
            'company_address' => Settings::get('company_address'),
            'company_telephone' => Settings::get('company_telephone'),
            'company_email' => Settings::get('company_email'),
        );
    
        $responseData = array(
            "search_data" => $data 
        );
    
        echo json_encode($responseData);
    }

    public function save_genenal(Request $request)
    {
        $request->validate([
            'website_title' => 'required|string|max:255',
            'company_name' => 'required|string|max:255',
            'company_address' => 'required',
            'company_telephone' => 'required',
            'company_email' => 'required',
        ]);

        try {
            if ($request->hasFile('logo')) {
                $logo = move_temp_file($request->file('logo'), public_path('uploads/system'), 'logo');
                $data['logo'] = $logo['file_name'];
                Settings::set('logo', $data['logo']);
            }

            if ($request->hasFile('favicon')) {
                $favicon = move_temp_file($request->file('favicon'), public_path('uploads/system'), 'favicon');
                $data['favicon'] = $favicon['file_name'];
                Settings::set('favicon', $data['favicon']);
            }

            Settings::set('website_title', $request->website_title);
            Settings::set('company_name', $request->company_name);
            Settings::set('company_address', $request->company_address);
            Settings::set('company_telephone', $request->company_telephone);
            Settings::set('company_email', $request->company_email);

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
}