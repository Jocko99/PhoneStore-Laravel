<!--FOOTER-->
    <div class="container-fluid mt-3 hfColor">
        <div class="container">
            <div class="row pt-4" id="footer">
                <div class="col-lg-3 nav hrWhiteLine">
                    <!--NAVIGACIJA-->
                    <a href="{{route("home")}}"><img src="{{asset("assets/images/logo/logo1.jpg")}}" alt="Logo" class="rounded"/></a>
                    <ul class="text-uppercase">
                        @foreach($menu as $link)
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route($link->putanja) }}">{{ $link->naziv }}</a>
                            </li>
                        @endforeach
                    </ul>
                    <!--END NAVIGACIJA-->
                </div>
                <div class="col-lg-3 text-center">

                    <p class="pt-3">Pratite nas i na:</p>
                    <a href="https://www.facebook.com"><i class="fab fa-facebook-square text-white h5 pr-1"></i></a>
                    <a href="https://www.instagram.com"><i class="fab fa-instagram text-white h5 pr-1 "></i></a>
                    <a href="https://www.twiter.com"><i class="fab fa-twitter-square text-white h5 pr-1"></i></a>
                </div>
                <div class="col-lg-3 text-center hrWhiteLine">
                    <h5 class="h5">Kontakt:</h5>
                    <p><i class="fa fa-envelope pr-1" aria-hidden="true"></i>phonestoreinfo@gmail.com</p>
                    <p><i class="fas fa-mobile pr-1"></i>066-111-333</p>
                    <h6 class="h5">Adresa:</h6>
                    <p><i class="fa fa-map-marker pr-1" aria-hidden="true"></i>Zdravka Čelara 16,</p>
                    <p>11000 Beograd</p>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 text-center">
                    <p class="text-white"><a href="{{route("autor")}}">Autor</a></p>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 text-center">
                    <p>Copyright &copy; 2021 All rights reserved </p>
                </div>
            </div>
        </div>
    </div>
    <!--ENDFOOTER-->
    <div id="scrollToTop"><i class="fas fa-arrow-circle-up"></i></div>
