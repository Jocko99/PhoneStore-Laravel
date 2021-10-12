@extends("layout.layout")
@section("title") Uređaji @endsection
@section("links")
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.0/font/bootstrap-icons.css">
@endsection
@section("content")
    <div class="container-fluid">
        <div class="container">
            <h1 class="h3 text-center">Uređaji</h1>
        </div>
        <a href="{{route("admin")}}"><i class="far fa-arrow-alt-circle-left back"></i></a>
        <div class="container">
            <a href="{{ route("mobiles.create") }}" class="btn btn-info float-right">Dodaj uređaj</a>
                <div class="row">
                    <form action="{{route("mobiles.index")}}" method="GET">
                        @csrf
                        <div class="input-group w-100 mt-5">
                            <input type="search" name="mobileSearchAdmin" class="form-control rounded" placeholder="Naziv..Marka..Cena.." aria-label="Search" aria-describedby="search-addon">
                            <button type="submit" class="btn btn-outline-primary"><i class="bi bi-search"></i></button>
                        </div>
                    </form>
                </div>
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
            <table class="w-100 table">
                <thead>
                <tr>
                    <th>R.B</th>
                    <th>Naziv</th>
                    <th>Slika</th>
                    <th>Cena</th>
                    <th>Marka</th>
                    <th>Ram</th>
                    <th>Izmeni</th>
                    <th>Obriši</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($items as $i => $item)
                        <tr>
                            <td>{{$item->idTelefon}}</td>
                            <td>{{$item->naziv}}</td>
                            <td><img src="{{asset("storage/mobiles/".$item->slika)}}" alt="{{$item->naziv}}" class="w-25"/> </td>
                            <td>{{$item->cena}}</td>
                            <td>{{$item->marka}}</td>
                            <td>{{$item->memorija}} GB</td>
                            <td><a href="{{route("mobiles.edit",["mobile"=>$item->idTelefon])}}" class="btn btn-info">Izmeni</a></td>
                            <td><form action="{{route("mobiles.destroy",["mobile"=>$item->idTelefon])}}" method="POST">
                                    @method("DELETE")
                                    @csrf
                                    <button type="submit" class="btn btn-info">Obriši</button>
                                </form></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $items->links("vendor.pagination.simple-bootstrap-4") }}
        </div>
    </div>
@endsection
