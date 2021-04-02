<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthConroller extends Controller
{
    //
    public function login(){
        return view('admin.login');
    }
}
