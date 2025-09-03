<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Our_work_controller extends Controller
{
    function index()
    {
        return view('our_work.index');
    }
}
