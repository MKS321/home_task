<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Redirect;
class AuthConroller extends Controller
{
    //
    public function login(){
        return view('admin.login');
    }
    public function doLogin(request $request)
{
    
    if (auth()->attempt(['email' => $request->input('email'), 'password' => $request->input('password')])) {
        return Redirect::route('dashboard')->with('success', 'Admin succesfully login');
    } else {
        return Redirect::back()->with('error', 'These credentials do not match our records.')->withInput();
    }
}
}
