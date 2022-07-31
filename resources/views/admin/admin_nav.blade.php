<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="{{route('show_beats')}}">Admin_home</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="#"> <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('create_beat')}}">insert_new_beat</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Categories
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    @foreach(session('categories') as $category)
                    <a class="dropdown-item" href="{{route('show_category',['category'=>$category->id])}}">{{$category->name}}</a>
                    @endforeach
                </div>
            </li>
            <div class="nav-item">
                <a class="nav-link" href="{{route('create_category')}}">insert category</a>
            </div>
            <div class="nav-item">
                <a class="nav-link" href="{{route('users_list')}}"> Users List</a>
            </div>
        </ul>
        <a href="#">hello</a>
        <form class="form-inline my-2 my-lg-0" action="{{route('search')}}">
            <input  name="search" class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
    </div>
</nav>
