@extends('layouts.app')
@section('content')
<!-- Section-->
<section class="py-5" style="background-color: #14171d">
    <div class="container px-4 px-lg-5 mt-5" style="background-color: #2e4b60">
        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
            {{--            @foreach(session('beats') as $beat)--}}
                <div class="col  mb-5 m-5 ">
                    @foreach($beats as $beat)

                    <div  class="card h-100 w-100 m-10">
                        <!-- Product image-->
                        <img class="card-img-top" src="{{\Illuminate\Support\Facades\Storage::url($beat->image)}}" alt="..." />
                        <!-- Product details-->
                        <div class="card-body p-4">
                            <div class="text-center">
                                <!-- Product name-->
                                <h5 class="fw-bolder">{{$beat->title}}</h5>
                                <h5 class="fw-bolder">دسته بندی :{{$beat->category->name}}</h5>

                                <audio class="audio w-100" controls="" type="mp3/org" src="{{\Illuminate\Support\Facades\Storage::url($beat->audio)}}"></audio>
                                <!-- Product price-->
                                <a @class('btn btn-primary') href="{{route('download',['beat'=>$beat->id])}}">Download</a>
                            </div>
                        </div>
                        <!-- Product actions-->
                        <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                            <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#">View options</a></div>
                        </div>
                        @endforeach   </div>
                </div>


            {{ $beats->links('vendor.pagination.bootstrap-4') }}

        </div>
    </div>
</section>

@endsection
