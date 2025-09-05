<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Contact_us_controller extends Controller
{
	public function __construct()
    {
    }

    public function index()
    {
        return view('contact_us.index');
    }
}
