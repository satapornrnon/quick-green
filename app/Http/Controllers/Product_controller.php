<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Product_controller extends Controller
{
    function solar()
    {
        return view('product.solar');
    }

    function inverter()
    {
        return view('product.inverter');
    }

    function sensor()
    {
        return view('product.sensor');
    }
}
