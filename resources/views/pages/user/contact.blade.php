@extends("layout.layout")
@section("keywords")content="PhoneStore,Kontakt"@endsection
@section("description")content="phonestoreinfo@gmail.com,066-111-333,Zdravka Čelara 16,11000 Beograd"@endsection
@section("title") Kontakt @endsection
@section("content")
    <div class="container-fluid">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 text-center m-auto ">
                    <h1 class="h2">Kontaktirajte nas</h1>
                    <form action="#" name="forma" id="formular" method="POST" class="d-flex flex-column align-items-center">
                        <input type="text" name="kontaktIme" id="kontaktIme" class="text-center form-control" placeholder="Ime..*"/>
                        <small class="form-text text-danger text-center mb-2" id="kontaktImeInfo"></small>
                        <input type="text" name="kontaktPrezime" id="kontaktPrezime" class="text-center form-control" placeholder="Prezime..*" />
                        <small class="form-text text-danger text-center mb-2" id="kontaktPrezimeInfo"></small>
                        <input type="text" name="kontaktEmail" id="kontaktEmail" class="text-center form-control" placeholder="Email..*"/>
                        <small class="form-text text-danger text-center mb-2" id="kontaktEmailInfo" class="text-center"></small>
                        <textarea rows="5" placeholder="Poruka..*" id="kontaktPoruka" class="text-center form-control" ></textarea>
                        <small class="form-text text-danger text-center mb-2" id="kontaktPorukaInfo"></small>
                        </small>
                        <input type="button" value="Pošalji" class="m-2 btn btn-info" id="btnKontakt"/>
                    </form>
                    <div class="text-center m-auto alert-success" id="uspesnoPoslata">
                    </div>
                </div>
                <div class="col-lg-7 mt-5 d-flex justify-content-between">
                    <div class="mapouter"><div class="gmap_canvas"><iframe width="393" height="335" id="gmap_canvas" src="https://maps.google.com/maps?q=11000%20Zdravka%20%C4%8Celara%2016%20&t=&z=15&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a href="https://soap2day-to.com">soap2day</a><br><style>.mapouter{position:relative;text-align:right;height:335px;width:393px;}</style><a href="https://www.embedgooglemap.net"></a><style>.gmap_canvas {overflow:hidden;background:none!important;height:335px;width:393px;}</style></div></div>
                    <div>
                        <h5 class="h5">Kontakt:</h5>
                        <p><i class="fa fa-envelope pr-1" aria-hidden="true"></i>phonestoreinfo@gmail.com</p>
                        <p><i class="fas fa-mobile pr-1"></i>066-111-333</p>
                        <h6 class="h5">Adresa:</h6>
                        <p><i class="fa fa-map-marker pr-1" aria-hidden="true"></i>Zdravka Čelara 16,</p>
                        <p>11000 Beograd</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
