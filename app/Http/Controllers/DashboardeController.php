<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardeController extends Controller
{
    public function index(){
        return view('admin');
    }
}
