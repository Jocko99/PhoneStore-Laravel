@extends("layout.layout")
@section("title") Admin panel @endsection

@section("content")
    <div class="container-fluid">
        <div class="container">
           <h1 class="h2 text-center">Admin panel</h1>
            <div class="row d-flex justify-content-center">
                <div class="col-4">
                    <ul class="list-group text-center" id="adminNav">
                        <a href="{{route("mobiles.index")}}"><li class="list-group-item">Uređaji</li></a>
                        <a href="{{ route("specification") }}"><li class="list-group-item">Specifikacije</li></a>
                        <a href="{{route("users")}}"><li class="list-group-item">Korisnici</li></a>
                        <a href="{{route("porudzbine")}}"><li class="list-group-item">Porudzbine</li></a>
                        <a href="{{route("izvestaji")}}"><li class="list-group-item">Izveštaji korisnika</li></a>
                        <a href="{{route("poruke")}}"><li class="list-group-item">Poruke</li></a>
                    </ul>
                </div>
            </div>
            <div class="row">
                @if(session()->has('success'))
                    <div class="alert alert-success">
                        {{ session()->get('success') }}
                    </div>
                @endif
                @if(session()->has('error'))
                        <div class="alert alert-danger">
                            {{ session()->get('error') }}
                        </div>
                @endif
            </div>
        </div>
    </div>
@endsection
