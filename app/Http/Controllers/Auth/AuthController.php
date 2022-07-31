<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function logout()
    {
        if (Auth::guest())
            return redirect()->back();
        else if (Auth::hasUser()) {
            Auth::logout();
            return redirect()->route('login')->with('msg','با موفقیت خارج شدید');
        }
    }
}
