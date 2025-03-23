<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class ProfileController extends Controller
{
    public function index()
    {
        $orders = Auth::user()->orders;
        return view('profile', compact('orders'));
    }
    
    
}
