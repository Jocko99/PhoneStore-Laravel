@extends("layout.layout")
@section("title") {{$mobileInfo->naziv}} @endsection
@section("content")
    <div class="container-fluid">
        <div class="container">
            <div class="row">
                <div class="col-4">
                    <img src="{{asset("storage/mobiles/".$mobileInfo->coverSlika)}}" alt="{{$mobileInfo->naziv}}"/>
                </div>
                <div class="col-8">
                    <h1>{{$mobileInfo->naziv}}</h1>
                    <span class="font-weight-bold">Osnovne karakteristike:</span>
                    <p>{{$mobileInfo->nazivOs}} - {{$mobileInfo->nazivOsVerzija}}</p>
                    <p>{{$mobileInfo->vrednostVelicina}} inch</p>
                    <p>{{$mobileInfo->kapacitet}}mAh</p>
                    <p>{{$mobileInfo->ram}} GB RAM</p>
                    <div class="addToCart w-25">
                        <a href="#" class="text-uppercase btn addCard" data-id="{{$mobileInfo->idTelefon}}">Dodaj u korpu<i class="fas fa-shopping-cart pl-1 "></i></a>
                    </div>
                </div>
            </div>
            <h2 class="h3">Specifikacije:</h2>
            <table class="table w-100">
                <tbody>
                <tr class="table-active">
                    <td class="font-weight-bold">Osnovne karakteristike</td>
                </tr>
                <tr>
                    <td>{{$mobileInfo->nazivOs}}</td>
                </tr>
                <tr>
                    <td>{{$mobileInfo->nazivOs}} - {{$mobileInfo->nazivOsVerzija}}</td>
                </tr>
                <tr>
                    <td>{{$mobileInfo->nazivChipset}}</td>
                </tr>
                <tr>
                    <td>{{$mobileInfo->nazivProcesor}}</td>
                </tr>
                <tr class="table-active">
                    <td class="font-weight-bold">Ekran</td>
                </tr>
                <tr>
                    <td>{{$mobileInfo->vrednostVelicina}}</td>
                </tr>
                <tr>
                    <td>{{$mobileInfo->nazivNaDodir}}</td>
                </tr>
                <tr>
                    <td>{{$mobileInfo->nazivEkrana}}</td>
                </tr>
                <tr>
                    <td>{{$mobileInfo->nazivRezolucija}}</td>
                </tr>
                <tr class="table-active">
                    <td class="font-weight-bold">Baterija</td>
                </tr>
                <tr>
                    <td>{{$mobileInfo->nazivBaterija}}</td>
                </tr>
                <tr>
                    <td>{{$mobileInfo->kapacitet}}</td>
                </tr>
                <tr class="table-active">
                    <td class="font-weight-bold">Memorija</td>
                </tr>
                <tr>
                    <td>{{$mobileInfo->ram}}</td>
                </tr>
                <tr>
                    <td>{{$mobileInfo->interna}}</td>
                </tr>
                <tr>
                    <td>{{$mobileInfo->eksterna}}</td>
                </tr>
                <tr class="table-active">
                    <td class="font-weight-bold">Glavna kamera</td>
                </tr>
                <tr>
                    <td>{{$backInfo->brojPiksela}} mpx</td>
                </tr>
                <tr>
                    <td>{{$backInfo->nazivHdr}}</td>
                </tr>
                <tr>
                    <td>{{$backInfo->nazivOsmeh}}</td>
                </tr>
                <tr>
                    <td>{{$backInfo->nazivVideo}}</td>
                </tr>
                <tr>
                    <td>{{$backInfo->nazivBlic}}</td>
                </tr>
                <tr>
                    <td>{{$backInfo->nazivAutofokus}}</td>
                </tr>
                <tr class="table-active">
                    <td class="font-weight-bold">Prednja  kamera</td>
                </tr>
                <tr>
                    <td>{{$frontInfo->brojPiksela}} mpx</td>
                </tr>
                <tr>
                    <td>{{$frontInfo->nazivHdr}}</td>
                </tr>
                <tr>
                    <td>{{$frontInfo->nazivOsmeh}}</td>
                </tr>
                <tr>
                    <td>{{$frontInfo->nazivVideo}}</td>
                </tr>
                <tr>
                    <td>{{$frontInfo->nazivBlic}}</td>
                </tr>
                <tr>
                    <td>{{$frontInfo->nazivAutofokus}}</td>
                </tr>
                <tr class="table-active">
                    <td class="font-weight-bold">Komunikacija</td>
                </tr>
                <tr>
                    <td>{{$mobileInfo->nazivWifi}}</td>
                </tr>
                <tr>
                    <td>{{$mobileInfo->nazivBluetooth}}</td>
                </tr>
                <tr>
                    <td>{{$mobileInfo->nazivUsb}}</td>
                </tr>
                <tr>
                    <td>{{$mobileInfo->nazivNfc}}</td>
                </tr>
                <tr>
                    <td>{{$mobileInfo->nazivGps}}</td>
                </tr>
                <tr class="table-active">
                    <td class="font-weight-bold">Težina</td>
                </tr>
                <tr>
                    <td>{{$mobileInfo->vrednost}} g</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
@section("script")
    <script src="{{asset("assets/js/product.js")}}" type="text/javascript"></script>
@endsection
