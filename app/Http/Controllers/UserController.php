<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Providers\RouteServiceProvider;
class UserController extends Controller
{
    public function index()
    {
        $pagetitle="لیست کاربران ";
        $users=User::orderBy('id','desc')->get();
        return view('admin.users',compact('users','pagetitle'));
    }


}
