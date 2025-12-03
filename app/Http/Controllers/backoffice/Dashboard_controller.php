<?php

namespace App\Http\Controllers\Backoffice;

use App\Http\Controllers\Controller;
use App\Models\Interested;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;

class Dashboard_controller extends Controller
{
    public function index()
    {
        return view('backoffice.dashboard.index');
    }

    public function get_data(Request $request)
    {
        $data['general'] = Interested::get_data_dashboard();
    
        $responseData = array(
            "search_data" => $data 
        );
    
        echo json_encode($responseData);
    }
}
