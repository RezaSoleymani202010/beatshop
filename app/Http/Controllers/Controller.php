<?php

namespace App\Http\Controllers;

use App\Models\Beat;
use App\Models\Category;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function home()
    {
        $pagetitle="Home_page";
        $beats=[];
        session()->put('beats',$beats);
        $categories=Category::categories();
        session()->put('categories',$categories);
        foreach ($categories as $category)
            foreach ($category->beats as $beat)
                session()->push('beats',$beat);
        return view('layouts.homepage',compact('pagetitle'));
    }

    public function more_beats()
    {
        $pagetitle="بیت های رایگان";
        $beats=Beat::orderBy('created_at')->paginate(6);
//        $beats=session('beats')->paginate(5);
        return view('layouts.beats',compact('beats','pagetitle'));
    }
}
