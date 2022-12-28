<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class landingpageController extends Controller
{
    //
    public function index(){
        return view('v_landingpage');
    }

    public function login(){
        return view('v_login');
    }
}
