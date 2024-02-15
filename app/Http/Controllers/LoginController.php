<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //
    public function auth(Request $request){
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        // if(Auth::attempt($credentials)){

            if(Auth::attempt($credentials)){
                 return redirect('home')->with('message','Berhasil');
            }
            return redirect()->back();
        // }
    }

    public function login(){
        return view('auth.login');
    } 

    public function hm(){
        return view('home');
    }

    public function logout(){
        Auth::logout();
        return redirect('login');
    }
}
