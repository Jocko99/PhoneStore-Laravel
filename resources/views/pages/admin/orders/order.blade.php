@extends("layout.layout")
@section("title")Porudzbine @endsection
@section("links")
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.0/font/bootstrap-icons.css">
@endsection
@section("content")
    <div class="container-fluid">
        <div class="container">
            <h1 class="h3 text-center">Porudžbine</h1>
        </div>
        <div class="container">
            <div class="row mt-3=">
                <a href="{{route("admin")}}"><i class="far fa-arrow-alt-circle-left back"></i></a>
            </div>
            <table class="table w-100 mt-2">
                <thead>
                    <tr>
                        <th>Ime</th>
                        <th>Prezime</th>
                        <th>Kontakt</th>
                        <th>Naziv</th>
                        <th>Slika</th>
                        <th>Datum</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($orders as $order)
                    <tr>
                        <td>{{$order->ime}}</td>
                        <td> {{$order->prezime}}</td>
                        <td>{{$order->brojTelefona}} {{$order->email}}</td>
                        <td>{{$order->naziv}}</td>
                        <td><img src="{{asset("storage/mobiles/".$order->coverSlika)}}" alt="{{$order->naziv}}" class="w-25"/></td>
                        <td>{{$order->datum}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{ $orders->links("vendor.pagination.simple-bootstrap-4")}}
        </div>
    </div>
@endsection
