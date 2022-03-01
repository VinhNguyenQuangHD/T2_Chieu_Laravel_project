<?php

namespace App\Http\Controllers;

use App\Models\LoginModel;
use App\Models\User;
use Illuminate\Http\Request;

class CustomAuth extends Controller
{
    public function login(){
        return view("auth.login");
    }

    public function register(){
        return view("auth.login");
    }

    public function registerUser(Request $request){
        $request -> validate([
            'Username' => 'required',
            'Email' => 'required|email|unique:dangnhaptaikhoan',
            'Password' => 'required|min:5|max:15'
        ]);

        $user = new LoginModel();
        $user -> name = $request -> Username;
        $user -> email = $request -> Email;
        $user -> password = $request -> Password;
        $res = $user -> save();
        if($res){
            return back() -> with('success', 'Dang ky thanh cong');
        }else{
            return back() -> with('fail', 'Dang ky thanh thu');
        }
    }
}
