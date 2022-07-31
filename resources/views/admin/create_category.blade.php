@extends('admin.home')

@section('content')
    <div @class('container') style="width: 60%;height: 50%;background-color: darkorange;margin-top: 20px">
        <form method="post"  action="{{route('store_category')}}">
            @csrf
            <div class="form-group">
                <label for="name">Title Category:</label>
                <input name="name" type="text" class="form-control" id="name" placeholder="name ...">
            </div>
            <div class="form-group">


            <div style="text-align: center">
                <button style="width: 150px;height: 30px" class="btn-warning " type="submit" ><b>save</b></button>
            </div>
            </div> </form>

    </div>
@endsection
