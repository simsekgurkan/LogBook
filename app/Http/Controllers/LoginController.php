<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(){
        return view('admin.login');
    }

    public function login(Request $request){
       $incomingFields = $request->validate([
          'email' => 'required',
          'password' => 'required'
       ]);
       if (Auth::attempt(['email'=>$incomingFields['email'],'password'=>$incomingFields['password']])){
           $request->session()->regenerate();
           return redirect()->route('admin.dashboard');
       }
        return back()->withErrors(['email' => 'Email or Password is wrong'])->onlyInput('email');

    }
    public function registerform(){
        return view('admin.register');
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('loginform');
    }
}
