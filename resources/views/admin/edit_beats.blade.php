@extends('admin.home')

@section('content')
    <div @class('container') style="width: 60%;height: 50%;background-color: darkorange;margin-top: 20px">
        <h3>Edit beat {{$beat->title}}</h3>
        <form method="post" enctype="multipart/form-data" action="{{route('update_beat',['beat'=>$beat])}}">
           @method('put')
            @csrf
            <div class="form-group">
                <label for="title">New Title Beat</label>
                <input name="title" type="text" class="form-control" id="title" placeholder="{{$beat->title}}">
            </div>
            <div class="form-group">
                <label for="category">Category select</label>
                <select type="text" name="category" class="form-control" id="category">
                    @foreach(session('categories') as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>

                    @endforeach   </select>
                </select>
            </div>
            <div class="form-group">
                <label for="image">choose  <b>image</b> for Beat</label>
                <input name="image" type="file" class="form-control " id="image" placeholder="image ...">
            </div><br>
            <div class="form-group">
                <label for="audio">choose <b>audio</b> for Beat</label>
                <input name="audio" type="file" class="form-control " id="audio" placeholder="audio ...">
            </div>
            <div style="text-align: center">
                <button style="width: 150px;height: 30px" class="btn-warning " type="submit" ><b>save</b></button>
            </div>
        </form>

    </div>
@endsection
