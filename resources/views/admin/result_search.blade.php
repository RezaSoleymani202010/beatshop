@extends('admin.home')
@section('content')
    <div>
        @foreach($result as $r)
            <div class="container">
    {{json_encode($r)}}
            </div>
        @endforeach
    </div>
@endsection
