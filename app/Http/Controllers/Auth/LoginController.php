<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function loginview()
    {
        $pagetitle="login";
        return view('auth.login',['pagetitle'=>$pagetitle]);
    }

    public function login(Request $request)
    {
        $validateDate=$request->validate([
            'name'=>'required',
            'email'=>'email|required',
            'password'=>'max:25|min:8'
        ]);
            if (Auth::attempt(['email' => $request->get('email'), 'password' => $request->get('password')])) {
                $request->session()->regenerate();
                if (Auth::user()->admin) {
                    return redirect()->route('show_beats')->with('msg', 'hello   ' . Auth::user()->name . "    your admin"); //کاربر احراز هویت شده ادمین است
                }
                else
    return redirect()->route('home')->with('msg','hello'.Auth::user()->name); //کاربر معمولی احراز هویت شده را با داشبورد منتقل می کنیم

            }
        return redirect()-> route('login')->withErrors([ //کاربر پیدا نشد و هنگام بازگشت به صفحه ورود خطا را نشان میدهیم
            'email' => 'کاربری با این مشخصات وجود ندارد',
        ]);
//        $credentials=$request->only('email','password');
//        if (Auth::attempt()){
//            $request->session()->regenerate();
//            return redirect()->route('home')->with('msg','hello'.Auth::user()->name); //کاربر احراز هویت شده را با داشبورد منتقل می کنیم
//        }
//        return back()->withErrors([ //کاربر پیدا نشد و هنگام بازگشت به صفحه ورود خطا را نشان میدهیم
//            'email' => 'کاربری با این مشخصات وجود ندارد',
//        ]);
        }

}
