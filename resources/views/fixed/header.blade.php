
    <!--Navigacija-->
    <div class="container-fluid">
        <nav class="navbar navbar-expand-lg ">
            <div class="container">
                <a class="navbar-brand" href="{{route("home")}}"><img src="{{asset("assets/images/logo/logo1.jpg")}}" alt="Phone store"/></a>
                <button class="navbar-toggler navbar-dark bg-dark" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">
                        @foreach($menu as $link)
                            <li class="nav-item @if(request()->routeIs($link->putanja)) active @endif">
                                <a class="nav-link" href="{{ route($link->putanja) }}">{{ $link->naziv }}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    <div class="container-fluid line"></div>
