<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Homepage_controller extends Controller
{
    function index()
    {
        return view('homepage.index');
    }
}
