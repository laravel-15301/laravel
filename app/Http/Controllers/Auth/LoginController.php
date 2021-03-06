<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function loginForm(){
        return view('auth.login-form');
    }

    public function postLogin(Request $request){
        $email = $request->email;
        $password = $request->password;
        if (Auth::attempt([
            'email' => $email,
            'password' => $password
        ])){
            return redirect()->route('cate.add');
        }

        return redirect()->route('login');


    }
}
