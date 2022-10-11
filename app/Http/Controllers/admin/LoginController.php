<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function index()
    {
        return view('admin.auth.login',[
            'title'=>'Đăng Nhập Hệ Thống'
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'bail',
            'email'=>'required|email',
            'password'=>'required',
        ]);

        if (Auth::attempt(['email'=>$request->input('email'),'password'=>$request->input('password')]))
        {
            return redirect()->route('login.dashboard');
        }

        Session::flash('error','email hoac mk sai r');
        return redirect()->back();
    }
}
