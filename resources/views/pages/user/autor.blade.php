@extends("layout.layout")
@section("keywords")content="Nikola, Jocković, ICT"@endsection
@section("description")content="Nikola Jockovic Visoka ICT"@endsection
@section("title") Autor @endsection
@section("content")
    <div class="container-fluid"></div>
    <div class="container-fluid">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center mt-2">
                    <h1>Autor</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-12 mb-3 d-flex flex-column align-items-center">
                    <div class="border">
                        <img src="{{asset("assets/images/autor/autor.jpg")}}" class="w-100" alt="Nikola Jocković"/>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 m-auto text-center">
                    <p>Rođen sam u Smederevskoj Palanci. Treća sam godina Visoke ICT škole, smer internet tehnologije. Želja mi je da do kraja školovanja proširim i usavršim svoje znanje o webu. Kontakt:</p>
                    <p>nikola.jockovic.23.18@ict.edu.rs</p>
                    <p><a href="sitemap.xml" class=" p-2">Sitemap</a></p>
                    <p><a href="models/autor/word.php">Preuzmi CV</a></p>
                </div>
            </div>
        </div>
    </div>
@endsection
