<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashBoard extends Controller
{
    public function dashboard(){
        return view("dashboard");
    }
}
