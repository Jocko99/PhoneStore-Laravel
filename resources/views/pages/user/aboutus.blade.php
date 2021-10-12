@extends("layout.layout")
@section("title") O nama @endsection
@section("content")
    <div class="">
        <div class="container py-5">
            <div class="row h-100 align-items-center py-5">
                <div class="col-lg-6">
                    <h1>O nama</h1>
                    <p class="mb-0"><b>PhoneStore</b> je firma koja se bavi uvozom, izvozom i distribucijom mobilnih telefona svih brendova.</p>
                    <p>
                        Nudimo Vam veliki izbor najpoznatijih mobilnih telefona po najpovoljnijim cenama.
                    </p>
                </div>
                <div class="col-lg-6 d-none d-lg-block"><img src="{{asset("assets/images/onama/aboutus.png")}}" alt="Phone store" class="img-fluid"></div>
            </div>
        </div>
    </div>
@endsection
