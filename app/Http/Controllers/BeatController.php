<?php

namespace App\Http\Controllers;

use App\Models\Beat;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use phpDocumentor\Reflection\Types\AggregatedType;

class BeatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $pagetitle = "beats";
        $categories=Category::all();

        $beats = Beat::orderBy('id','desc')->paginate(5);
        session()->put('categories', $categories);
        return view('admin.beats',compact('beats') ,['pagetitle' => $pagetitle]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin.create_beat', ['pagetitle' => 'create_beat']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\StoreBeatRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $messages=[
            'title.required' => 'فیلد عنوان برای بیت الزامی است ',
            'image.mimes' => 'فرمت عکس ها فقط jpeg و jpg می باشد',
            'image.max' => 'اندازه عکس ها حداکثر 10 مگابایت می باشد',
            'audio.max' => 'حجم موزیک حداکثر 10 مگابایت است',
            'audio.mimes' => 'فرمت موزیک ها فقط mp3 و org می باشد',

        ];
        $validate=$request->validate([
            'title'=>['required'],
            'image'=>['mimes:jpeg,jpg'],
            'audio'=>['mimes:mp3,org|max:10000'],
        ],$messages);

        $image_name = $request->file('image')->getClientOriginalName();
        $image_path = $request->file('image')->storeAs('public/images', $image_name);

        $audio_name = $request->file('audio')->getClientOriginalName();
        $audio_path = $request->file('audio')->storeAs('public', $audio_name);
        $beat = new Beat;
        $beat->title = $request->input('title');
        $beat->category_id = $request->input('category');
        $beat->image = $image_path;
        $beat->audio =  $audio_path;

        $beat->save();
        return redirect()->route('show_beats')->with('msg','is done');

    }


    /**
     * Display the specified resource.
     *
     * @param \App\Models\Beat $beat
     * @return \Illuminate\Http\Response
     */
    public function show(Beat $beat)
    {

        $pagetitle="more information for beat: ".$beat->title;
        $category=$beat->category;
$comments=$beat->comments;
        return view('admin.show_one_beat',compact('beat','category','comments','pagetitle'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Beat $beat
     * @return \Illuminate\Http\Response
     */
    public function edit(Beat $beat)
    {
        $pagetitle="edit beat ".$beat->id;
 return view('admin.edit_beats',['pagetitle'=>$pagetitle],compact('beat'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\UpdateBeatRequest $request
     * @param \App\Models\Beat $beat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Beat $beat)
    {
        $messages=[
            'title.required' => 'فیلد عنوان برای بیت الزامی است ',
            'image.mimes' => 'فرمت عکس ها فقط jpeg و jpg می باشد',
            'image.max' => 'اندازه عکس ها حداکثر 10 مگابایت می باشد',
            'audio.max' => 'حجم موزیک حداکثر 10 مگابایت است',
            'audio.mimes' => 'فرمت موزیک ها فقط mp3 و org می باشد',

        ];
        $validate=$request->validate([
            'title'=>['required'],
            'image'=>['mimes:jpeg,jpg'],
            'audio'=>['mimes:mp3,org|max:10000'],
        ],$messages);

        $image_name = $request->file('image')->getClientOriginalName();
        Storage::delete($beat->image);
        $image_path = $request->file('image')->storeAs('public/images', $image_name);

        $audio_name = $request->file('audio')->getClientOriginalName();
        Storage::delete($beat->audio);
        $audio_path = $request->file('audio')->storeAs('public', $audio_name);
        $beat->title = $request->input('title');
        $beat->category_id = $request->input('category');
        $beat->image = $image_path;
        $beat->audio = $audio_path;

        $beat->save();
        return redirect()->back()->with('msg','change is done');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Beat $beat
     * @return \Illuminate\Http\Response
     */
    public function destroy(Beat $beat)
    {
        session()->pull('beats',$beat);
        $a=Storage::delete($beat->image);
        $b=Storage::delete($beat->audio);
       $c= $beat->delete();
       if ($a && $b && $c)
           return redirect()->back()->with('msg','بیت با موفقیت حذف شد');
    }

    public function search(Request $request)
    {
        $temp=$request->input('search');
        $result=Beat::where('title',$temp)->get();
        return view('admin.result_search',['pagetitle'=>'Result_search'],compact('result'));
    }

    public function download($beat)
    {
$beat=Beat::findorfail($beat);
if (Storage::url($beat->audio))
 return Storage::download($beat->audio);
return back()->with('msg','download file not exit');
    }
}
