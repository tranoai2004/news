<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function login(){
        return view("fe.login");
    }
    public function register(){
        return view("fe.register");
    }
    public function postRegister(Request $request){

        $request->merge(['password' => Hash::make($request->password)]);
        try {
            User::create($request->all());
            return redirect()->route('login')->with('success', 'Đăng ký thành công!');
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors('Đã xảy ra lỗi khi đăng ký. Vui lòng thử lại.');
        }
    }
    public function postLogin(Request $request){

        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            return redirect()->route('index');
        }else{
            return redirect()->back()->with('error','Bạn Đã Nhập Sai Mật Khẩu!');
        }
    }
    public function logout(Request $request){

        Auth::logout();
        return redirect()->route('index');
    }
}
