<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function create()
    {
        $pagetitle="new_user_register";
        return view('auth.register',['pagetitle'=>$pagetitle]);
    }

    public function register(Request $request)
    {


        $validated = $request->validate([ //داده ها را اعتبار سنجی می کنیم
            'name' => 'required|unique:users|max:255',
            'email' => 'required|email|unique:users|max:255',
            'password' => 'required|max:255|min:6',
        ]);
//        $user = new User(); //یک شی جدید از روی مدل یوزر میسازیم
//        $user->password = Hash::make($request->password); //پسورد را ابتدا با روش بی کریپت هش میکنیم
//        $user->name = $request->name; //ایمیل ارسالی را دریافت می کنیم
//        $user->email = $request->email; //ایمیل ارسالی را دریافت می کنیم
//        $user->save(); //اطلاعات را پایگاه داده ثبت می کنیم
//        event(new Registered($user));
//        Auth::login($user);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        Auth::login($user);
        return redirect(RouteServiceProvider::HOME);
//        return redirect()->route('home')->with('msg','user is register'); //کاربر را به صفحه مورد نظر هدایت میکنیم
    }


}
