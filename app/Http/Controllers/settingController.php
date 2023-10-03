<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class settingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    function setting(){
        return view('setting');
    }
}
