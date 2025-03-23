<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CreateOrderController extends Controller
{
    public function index()
    {
        return view('create-order'); 
    }
}
