@extends('layouts.app')
@section('content')
<!-- Section-->
<section class="py-5" style="background-color: #14171d">
    <div class="container px-4 px-lg-5 mt-5" style="text-align: center">
        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
{{--            @foreach(session('beats') as $beat)--}}

            <div class="col mb-5 w-65 h-50" >
                @for($i=0;$i<4;$i++)

                <div class="card h-50 w-60 mt-5">
                    <!-- Product image-->
                    <img class="card-img-top" src="{{\Illuminate\Support\Facades\Storage::url(session('beats')[$i]->image)}}" alt="..." />
                    <!-- Product details-->
                    <div class="card-body p-4">
                        <div class="text-center">
                            <!-- Product name-->
                            <h5 class="fw-bolder">{{session('beats')[$i]->title}}</h5>
                            <h5 class="fw-bolder">دسته بندی :{{session('beats')[$i]->category->name}}</h5>

<audio class="audio w-100" controls="" type="mp3/org" src="{{\Illuminate\Support\Facades\Storage::url(session('beats')[$i]->audio)}}"></audio>
                            <!-- Product price-->
                          <a @class('btn btn-primary') href="{{route('download',['beat'=>session('beats')[$i]->id])}}">Download</a>
                        </div>
                    </div>
                    <!-- Product actions-->
                    <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                        <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#">View options</a></div>
                    </div>

                     </div>@endfor
            </div>

        </div>
        <a @cl  ass('btn btn-primary') href="{{route('more_beats')}}"> بیت های رایگان بیشتر</a>
    </div>
</section>
@endsection

