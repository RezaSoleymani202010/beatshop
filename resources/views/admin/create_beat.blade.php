@extends('admin.home')

@section('content')
    <div @class('container') style="width: 60%;height: 50%;background-color: darkorange;margin-top: 20px">
    <form method="post" enctype="multipart/form-data" action="{{route('store_beat')}}">
        @csrf
        <div class="form-group">
            <label for="title">Title Beat</label>
            <input name="title" type="text" class="form-control" id="title" placeholder="Title ...">
        </div>
        <div class="form-group">
            <label for="category">Category select</label>
            <select type="text" name="category" class="form-control" id="category">
            @foreach(session('categories') as $category)
                <option value="{{$category->id}}">{{$category->name}}</option>

                @endforeach   </select>
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
