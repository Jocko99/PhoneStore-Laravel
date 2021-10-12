@extends("layout.layout")
@section("title") Izmeni nfc @endsection
@section("content")
    <div class="container-fluid">
        <h1 class="h3 text-center">Izmeni nfc</h1>
        <a href="{{route("gps.index")}}" class="pt-3"><i class="far fa-arrow-alt-circle-left back"></i></a>
        <div class="container">

            <form action="{{route("gps.update",["gp"=>$editGps->idGps])}}" method="POST">
                @method("PUT")
                @csrf
                <table class="w-100 table">
                    <thead>
                    <tr>
                        <th>Naziv</th>
                        <th>Sačuvaj</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td><input type="text" class="form-control" name="gpsName" value="{{$editGps->nazivGps}}"></td>
                        <td><input type="submit" class="btn btn-info" value="Sačuvaj"/></td>
                    </tr>
                    </tbody>
                </table>
            </form>
            @if(session()->has('success'))
                <div class="alert alert-success text-center">
                    {{ session()->get('success') }}
                </div>
            @endif
            @if(session()->has('error'))
                <div class="alert alert-danger text-center">
                    {{ session()->get('error') }}
                </div>
            @endif
            @if ($errors->any())
                <div class="alert alert-danger text-center">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
    </div>
@endsection
