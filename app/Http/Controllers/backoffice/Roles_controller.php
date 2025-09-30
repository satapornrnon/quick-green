<?php

namespace App\Http\Controllers\Backoffice;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Roles_controller extends Controller
{
    public function index()
    {
        return view('backoffice.roles.index');
    }
}
