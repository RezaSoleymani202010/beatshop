
@extends('admin.home')
@section('content')

<h1>list of beats</h1>
<div class="container" style=" color: #e2e8f0;height: 50%;width: 50%;text-align: center;background-color: darkgoldenrod">
    @foreach($beats as $beat)
        <label for="title"> beat_id : </label>
        <span>{{$beat->id}}</span><br>
        <label for="title">title:</label>
        <span>{{$beat->title}}</span><br>
       <b> <label for="category">category:</label></b>
        <span>{{$beat->category}}</span><br>
        <label for="category">path_image:</label>
        <span>{{$beat->image}}</span>
        <label for="category">audio_path:</label>
        <span>{{$beat->audio}}</span>
        <div style="text-align: center;width: 100%;height: 50%">
        <img style="width: 500px;height:400px" src="{{\Illuminate\Support\Facades\Storage::url($beat->image)}}" alt="" srcset=""/>
<br>
        </div><br>
        <div style="text-align: center;width: 100%;height: 50%" >

        <audio style="margin: 20px" controls="" type="audio/mp3"  src="{{\Illuminate\Support\Facades\Storage::url($beat->audio)}}" ></audio>
<br>
        <a href="{{route('delete_beat',['beat'=>$beat->id])}}" >   <button class="btn btn-dark" >Delete</button></a>
            <a href="{{route('edit_beat',['beat'=>$beat->id])}}" >   <button class="btn btn-dark" >Edit</button></a>
<br><br>
            <a href="{{route('show_beat',['beat'=>$beat->id])}}" >   <button class="btn btn-dark" >More</button></a>
<br><br>
            <br>

        </div>


    @endforeach

         {{$beats->links()}}

</div>
@endsection
