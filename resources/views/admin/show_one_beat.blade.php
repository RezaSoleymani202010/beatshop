@extends('admin.home')
@section('content')

    <div class="container"
         style=" color: #e2e8f0;margin-top:25px;height: 50%;width: 50%;text-align: center;background-color: darkgoldenrod">

        <label for="title"> beat_id : </label>
        <span>{{$beat->id}}</span><br>
        <label for="title">title:</label>
        <span style="font-weight: bold">{{$beat->title}}</span><br>
        <h1>Category : {{$category->name}}</h1>
        <b> <label for="category">category:</label></b>
        <span>{{$category}}</span><br>
        <label for="category">path_image:</label>
        <span>{{$beat->image}}</span>
        <label for="category">audio_path:</label>
        <span>{{$beat->audio}}</span>
        <div style="text-align: center;width: 100%;height: 50%">
            <img style="width: 500px;height:400px" src="{{\Illuminate\Support\Facades\Storage::url($beat->image)}}"
                 alt="" srcset=""/>
            <br>
        </div>
        <br>
        <div style="text-align: center;width: 100%;height: 50%">

            <audio style="margin: 20px" controls="" type="audio/mp3"
                   src="{{\Illuminate\Support\Facades\Storage::url($beat->audio)}}"></audio>
            <br>
            <a href="{{route('delete_beat',['beat'=>$beat->id])}}">
                <button class="btn btn-dark">Delete</button>
            </a>
            <a href="{{route('edit_beat',['beat'=>$beat->id])}}">
                <button class="btn btn-dark">Edit</button>
            </a>
            <br><br>
            <a href="{{route('edit_beat',['beat'=>$beat->id])}}">
                <button class="btn btn-dark">More</button>
            </a>
            <br><br>
            <br>
        </div>


{{--commentss_________________________________________________________--}}



    </div>

    <!-- Main Body -->
    <section>
        <div class="container">
            <div class="row">
                <div class="col-sm-5 col-md-6 col-12 pb-4">
                    <h1>Comments</h1>
                    @foreach($comments as $comment)
                    <div class="comment mt-4 text-justify float-left"> <img src="https://i.imgur.com/yTFUilP.jpg" alt="" class="rounded-circle" width="40" height="40">
                        <h4>{{$comment->user->user_name}}</h4> <span>- {{$comment->created_at}}</span> <br>
<p>{{$comment->body}}</p>
                    </div>
                    @endforeach

                </div>
                <div class="col-lg-4 col-md-5 col-sm-4 offset-md-1 offset-sm-1 col-12 mt-4">
                    <form id="algin-form">
                        <div class="form-group">
                            <h4>Leave a comment</h4> <label for="message">Message</label> <textarea name="msg" id="" msg cols="30" rows="5" class="form-control" style="background-color: black;"></textarea>
                        </div>
                        <div class="form-group"> <label for="name">Name</label> <input type="text" name="name" id="fullname" class="form-control"> </div>
                        <div class="form-group"> <label for="email">Email</label> <input type="text" name="email" id="email" class="form-control"> </div>
                        <div class="form-group">
                            <p class="text-secondary">If you have a <a href="#" class="alert-link">gravatar account</a> your address will be used to display your profile picture.</p>
                        </div>
                        <div class="form-inline"> <input type="checkbox" name="check" id="checkbx" class="mr-1"> <label for="subscribe">Subscribe me to the newlettter</label> </div>
                        <div class="form-group"> <button type="button" id="post" class="btn">Post Comment</button> </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
