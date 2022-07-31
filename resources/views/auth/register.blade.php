@extends('master')

@section('content')
    <div class="container" style="text-align: center;margin-top:100px ">
    <h3>فرم ثبت نام </h3><br>
<form @class('container') action="{{route('register')}}" method="post">
    @csrf
    <div class="form-group row">
        <label for="name" class="col-sm-2 col-form-label">نام</label>
        <div class="col-sm-10">
            <input name="name" type="text" class="form-control" id="user_name" placeholder="نام کاربری... ">
        </div>
    </div>
    <div class="form-group row">
        <label for="email" class="col-sm-2 col-form-label">ایمیل</label>
        <div class="col-sm-10">
            <input name="email" type="email" class="form-control" id="email" placeholder="ایمیل">
        </div>
    </div>
    <div class="form-group row">
        <label for="Password" class="col-sm-2 col-form-label">Password</label>
        <div class="col-sm-10">
            <input name="password" type="password" class="form-control" id="password" placeholder="گذرواژه...">
        </div>
    </div>


        <div class="col-sm-10">
            <input  class="button btn-dark col-sm-5" type="submit" class="form-control" id="submit" >
        </div>

</form>
    </div>
@endsection
