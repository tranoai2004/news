<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class AdminController extends Controller
{
    public function logon(){
        return view('admin.logon');
    }

    public function postlogon(Request $request){
        if(Auth::attempt(['email'=>$request->email, 'password'=>$request->password, 'role'=>1])){
            return redirect()->route('admin.index');
        }else{
            return redirect()->back()->with('error', 'Invalid email or password');
        }
    }

    public function signOut(){
        Auth::logout();
        return redirect()->route('admin.logon');
    }
}
