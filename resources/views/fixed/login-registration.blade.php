
<div class="container-fluid">
    <div class="container">
        <!--Login i korpa-->
        <div class="row  hfColor rounded-bottom">
            <div class="col-lg-12 d-flex justify-content-end pt-2">
                @if(!session()->has("user"))
                    <p class="text-white"><a href="#" data-toggle="modal" data-target="#prijavaModal"><i class="fas fa-shopping-cart text-white"></i></a> &#124; <i class="fas fa-user-alt pr-1"></i><a href="#" data-toggle="modal" data-target="#prijavaModal" class="text-white pr-1">Prijava</a>&#124;<a href="" class="text-white pl-1" data-toggle="modal" data-target="#registracijaModal">Registracija</a></p>
                @else
                    <p>@if(session()->get("user")->isAdmin)
                            <a href="{{route("admin")}}" class="text-white">Admin</a> &#124;
                        @else
                            <a href="{{route("account")}}" class="text-white">Nalog</a> &#124;
                        @endif
                        <a href="{{route("korpa")}}"><i class="fas fa-shopping-cart text-white"></i></a> &#124;
                        <a href="{{route("logout")}}" class="text-white"><i class="fas fa-sign-out-alt text-white"></i>Odjavi se</a>
                    </p>
                @endif
            </div>
        </div>
        <!--MODAL ZA PRIJAVU-->
        <div class="modal fade" id="prijavaModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content  hfColor">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Prijava</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!--FORM-->
                        <form action="{{route("login")}}" method="POST">
                        @csrf
                            <div class="form-group">
                                <label for="email" class="col-form-label">Email:</label>
                                <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email">
                                @error('email')
                                <small class="text-danger">Email nije u dobrom formatu</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="lozinka" class="col-form-label">Lozinka:</label>
                                <input type="password" class="form-control" name="lozinka" id="lozinka"/>
                            </div>
                            <button type="submit" class="btn btn-info float-right mr-2">Prijavi se</button>
                            <button type="button" class="btn btn-secondary float-right mr-2" data-dismiss="modal">Odustani</button>
                        </form>
                        <!--ENDFORM-->
                    </div>
                    <div class="modal-footer">

                    </div>
                </div>
            </div>
        </div>
        <!--END MODAL-->
        <!--MODAL ZA REGISTRACIJU-->
        <div class="modal fade" id="registracijaModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content  hfColor">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Registracija</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!--FORM-->
                        <form>
                            <div class="form-group">
                                <label for="ime" class="col-form-label">Ime:</label>
                                <input type="text" class="form-control @error('ime') is-invalid @enderror" id="ime" name="ime">
                                <small id="imeInfo" class="text-danger"></small>
                                @error('ime')
                                <small class="text-danger"></small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="prezime" class="col-form-label">Prezime:</label>
                                <input type="text" class="form-control @error('prezime') is-invalid @enderror" id="prezime" name="prezime">
                                <small id="prezimeInfo" class="text-danger"></small>
                                @error('prezime')
                                <small class="text-danger"></small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="rgEmail" class="col-form-label">Email:</label>
                                <input type="text" class="form-control @error('email') is-invalid @enderror" id="rgEmail" name="rgEmail">
                                <small id="emailInfo" class="text-danger"></small>
                                @error('email')
                                <small class="text-danger"></small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="rgLozinka" class="col-form-label">Lozinka:</label>
                                <input type="password" class="form-control @error('lozinka') is-invalid @enderror" name="rgLozinka" id="rgLozinka"/>
                                <small id="lozinkaInfo" class="text-danger"></small>
                                @error('lozinka')
                                <small class="text-danger"></small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="lozinkaPonovo" class="col-form-label">Lozinka ponovo:</label>
                                <input type="password" class="form-control @error('lozinkaPonovo') is-invalid @enderror" id="lozinkaPonovo" name="lozinkaPonovo">
                                <small id="lozinkaPonovoInfo" class="text-danger"></small>
                                @error('lozinkaPonovo')
                                <small class="text-danger"></small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="brTelefon" class="col-form-label">Broj telefona:</label>
                                <input type="text" class="form-control @error('brTelefon') is-invalid @enderror" id="brTelefon" name="brTelefon">
                                <small id="telefonInfo" class="text-danger"></small>
                                @error('brTelefon')
                                <small class="text-danger"></small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="postBroj" class="col-form-label">Unesite poštanski broj:</label>
                                <input type="text" class="form-control @error('mesto') is-invalid @enderror" placeholder="11420.." name="postBroj" id="postBroj"/>
                                <small id="postBrojInfo" class="text-danger"></small>
                                @error('mesto')
                                <small class="text-danger"></small>
                                @enderror
                            </div>
                            <button type="button" id="btnRegister" name="btnRegister" class="btn btn-info float-right mr-2">Registruj se</button>
                            <button type="button" id="close" class="btn btn-secondary float-right mr-2" data-dismiss="modal">Odustani</button>
                        </form>
                        <!--ENDFORM-->
                    </div>
                    <div class="modal-footer">
                    </div>
                </div>
            </div>
        </div>
        <div class="alert alert-success alert-dismissible fade show text-center" id="hideSuccess" role="alert">
            <h5 class="alert-heading">Uspešno ste se registrovali</h5>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div id="addedToCart">

        </div>
        <!---->
        <!--END LOGIN I REGISTRACIJA-->
    </div>
</div>

