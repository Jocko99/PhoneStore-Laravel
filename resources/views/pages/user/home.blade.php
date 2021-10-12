@extends("layout.layout")
@section("keywords")content="PhoneStore,Početna"@endsection
@section("description")content="Pronađite uređaj po vašem ukusu"@endsection
@section("title") Početna @endsection
@section("content")
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner hfColor">
            @foreach($slider as $s)
                <div class="carousel-item @if($loop->index==0) active @endif">
                    <div class="container">
                        <div class="row d-flex justify-content-around">
                            <div class="akcijaMobilni text-center">
                                <div class="slikaAkcije">
                                    <img src="{{asset("storage/mobiles/".$s->coverSlika)}}" class="rounded w-50" alt="{{$s->naziv}}"/>
                                </div>
                                <div class="info">
                                    <p>{{$s->naziv}}</p>
                                    <p>Cena: <span class="text-success">{{$s->cena}}</span> din</p>
                                    <p><a class="text-white" href="{{route("telefoni",["telefon"=>$s->idTelefon])}}">Više..</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <!--AKCIJA,MESTO ZA REKLAMU-->
    <div class="container-fluid pt-4 ">
        <img src="{{asset("assets/images/reklame/iphoneReklama.png")}}" alt="Iphone" id="reklama" class="w-100"/>
    </div>
    <!--END AKCIJA-->
    <!--pretraga -->
    <div class="container-fluid">
        <div class="container hfColor mt-3 p-3 text-center rounded">
            <div class="row">
                <div class="col-lg-12">
                    <h4>Pronađite uređaj po vašem ukusu</h4>
                    <form>
                        <div class="d-flex justify-content-center">
                            <input type="text" class="form-control w-25 text-center" id="nazivTelefona" placeholder="Uređaj.. ">
                        </div>
                        <div class="d-flex justify-content-center p-3">
                            <button type="button" class="w-25 btn btn-info" id="pronadji">Pronađi<i class="fa fa-search pl-1"></i></button>
                        </div>
                    </form>
                </div>
            </div>
            <!--UREDJAJI ZA PRIKAZIVANJE-->
        </div>
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-lg-8 col-md-8 col-sm-8 text-center" id="prikaziUredjaj">
                    <!--UREDJAJI-->
                </div>
            </div>
        </div>
    </div>
    <!--END PRETRAGA-->
@endsection
@section("script")
    <script src="{{asset("assets/js/product.js")}}" type="text/javascript"></script>
@endsection
