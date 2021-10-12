@extends("layout.layout")
@section("title") Nalog @endsection

@section("content")
    @if(session()->has("user"))
        <div class="container-fluid">
            <div class="container">
                <h1 class="h2 text-center">Korisnički nalog</h1>
                <div class="row">
                    <div class="col-3 mt-5">
                        <p>Ime: <strong>{{session()->get("user")->ime}}</strong></p>
                        <p>Prezime: <strong>{{session()->get("user")->prezime}}</strong></p>
                        <p>Email: <strong id="newEmail">{{session()->get("user")->email}}</strong></p>
                        <p>Telefon: <strong id="newMobile">{{session()->get("user")->brojTelefona}}</strong></p>
                        <p>Mesto: <strong>{{session()->get("user")->nazivMesta}}</strong></p>
                    </div>
                    <div class="col-6 mt-5">
                        <a href="#" id="promeniLozinku" class="btn-info btn mt-1">Promeni lozinku</a>
                        <a href="#" id="promeniTelefon" class="btn-info btn mt-1">Promeni broj telefona</a>
                        <a href="#" id="promeniEmail" class="btn-info btn mt-1">Promeni email</a>
                    </div>
                    <div class="col-3" id="formForChange"></div>
                </div>
                <hr>
                <div class="row">
                    <h1 class="h2">Porudžbine</h1>
                    <div class="col-12 d-flex">
                        @foreach($orders as $o)
                            <div class="t">
                                <p>Naziv: <strong>{{$o->naziv}}</strong></p>
                                <p><img src="{{asset("storage/mobiles/".$o->coverSlika)}}" alt="{{$o->naziv}}" class="w-25"/></p>
                                <p>Cena: <strong>{{$o->cena}}</strong> dinara</p>
                                <p>Datum porudžbine: <strong>{{$o->datum}}</strong></p>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection
