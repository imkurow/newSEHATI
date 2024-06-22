<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthManager extends Controller
{
    function login(){
        return view('login');
    }
    function registration(){
        return view('registration');
    }
    function stressTest(){
        return view('stressTest');
    }

    function loginPost(Request $request){
        $request->validate([
            'email'=> 'required',
            'password' => 'required'
        ]);

        //nampilin error kalo email gd di db
        $credentials = $request->only('email','password');

        if(Auth::attempt($credentials)){
            return redirect()->intended(route('home'))->with("success","You are logged in successfully!");
        }
        return redirect(route('login'))->with("error","Email or Password is incorrect");
    }

    function registrationPost(Request $request){
        $request->validate([
            'name'=> 'required',
            'username' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required',
            'sex' => 'required',
            'dob'=> 'required|date'
        ]);

        $data = $request->all();
        $data['password'] = Hash::make($data['password']);

        $user = User::create($data);

        if(!$user){
            return redirect(route('registration'))->with("error","Registration failed, Try again!");
        }
        return redirect(route('login'))->with("success","Registration success, Please login!");
    }

    function logout(){
        $request->session()->flush();
        Auth::logout();
        return redirect(route('login'));
    }
}
