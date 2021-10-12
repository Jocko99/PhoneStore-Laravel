@extends("layout.layout")
@section("keywords")content="PhoneStore,korpa"@endsection
@section("description")content="Pronađi uređaj"@endsection
@section("title")Korpa @endsection
@section("content")
    <div class="container-fluid">
        <div class="container" id="proizvodiUkorpi">
            @if(session()->has("cartItems") && count(session()->get("cartItems")))
                <form>
                    <table class="table w-100">
                        <thead>
                        <tr>
                            <th>Naziv</th>
                            <th>Slika</th>
                            <th>Opis</th>
                            <th>Količina</th>
                            <th>Cena</th>
                            <th>#</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach(session()->get("cartItems") as $item)
                                <tr class="mobileProduct" data-allid="{{$item->mobile->idTelefon}}" data-price="{{$item->mobile->cena}}" id="cartItem{{$item->mobile->idTelefon}}">
                                    <td>{{$item->mobile->naziv}}</td>
                                    <td><img src="{{asset("storage/mobiles/".$item->mobile->coverSlika)}}" alt="{{$item->mobile->naziv}}" class="w-25"/></td>
                                    <td>{{$item->mobile->naziv}}: <p>-{{$item->mobile->vrednostVelicina}} inch,</p><p>-{{$item->mobile->kapacitet}}mAh,</p><p>-{{$item->mobile->brojPiksela}} mpx,</p><p>-{{$item->mobile->ram}} GB RAM</p></td>
                                    <td><input type="number" min="0" data-quantity="{{$item->mobile->idTelefon}}" class="quantity" id="quantityId{{$item->mobile->idTelefon}}" value="{{$item->quantity}}" class="form-control"/></td>
                                    <td>{{$item->mobile->cena}}</td>
                                    <td><a href="#" data-removeid="{{$item->mobile->idTelefon}}" class="removeMobileFromCart"><i class="fas fa-times text-danger"></i></a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </form>
                <div class="row">
                    <div class="col-4">
                        <a href="{{route("mobiles")}}" class="btn btn-info">Još proizvoda</a>
                    </div>
                    <div class="col-4 text-center">
                        <a href="#" id="naruci" class="btn btn-info">Naruči</a>
                    </div>
                    <div class="col-4 text-right">
                        @php
                            $ukupnaCena = 0;
                            foreach (session()->get("cartItems") as $item){
                                $ukupnaCena += $item->quantity * $item->mobile->cena;
                            }
                        @endphp
                        <h4 class="text-right">Ukupno <strong id="total">{{$ukupnaCena}}</strong> dinara</h4>
                    </div>
                </div>
        </div>
        <div class="container">
            <div class="row" id="pregledPredNarudzbinu"></div>
            <div id="orderConfirmed"></div>
        </div>
    </div>
            @else
                <div id="freeSpace" class="d-flex align-items-center justify-content-center">
                    <p class="text-muted h1">Korpa je prazna</p>
                </div>
                <a href="{{route("mobiles")}}" class="btn btn-info">Pronađi uređaj</a>
        </div>
    </div>
            @endif
@endsection
@section("script")
    <script src="{{asset("assets/js/product.js")}}" type="text/javascript"></script>
@endsection
