@extends("layout.layout")
@section("keywords")content="Uporedi,uređaji"@endsection
@section("description")content="Uporedite uređaje"@endsection
@section("title") Uporedi @endsection
@section("content")
    <!--UPOREDJIVANJE TELEFONA-->
    <div>
        <img src="{{asset("assets/images/compare/s21_poklon.jpg")}}" alt="S21" class="w-100"/>
    </div>
    <div class="container-fluid line"></div>
        <div class="container-fluid">
        <div class="container">
            <h1 class="h3 text-center mt-3">Uporedite uređaje</h1>
            <div class="row mt-2 d-flex justify-content-center">
                <div class="col-4">
                    <form class=" d-flex flex-row">
                        <input type="text" class="form-control mr-3" placeholder="Uređaj 1.." id="firstMobile"/>
                        <input type="text" class="form-control" placeholder="Uređaj 2.." id="secondMobie"/>
                    </form>
                </div>
            </div>
            <div class="row d-flex justify-content-center">
                <div class="col-4 d-flex">
                    <div class="col-6 mr-3" >
                        <div class="list-group" id="show-list1">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="list-group" id="show-list2">
                        </div>
                    </div>
                </div>
            </div>
            <!--SPECIFIKACIJE-->
            <div class="row">
                <div id="tableForFirstMobile" class="col-6">

                </div>
                <div id="tableForSecondMobile" class="col-6">

                </div>
            </div>
            <!--ENDSPECIFIKACIJE-->
            <div class="row" id="freeSpace1">

            </div>
        </div>
    </div>
@endsection
@section("script")
    <script src="{{asset("assets/js/compare.js")}}" type="text/javascript"></script>
    <script src="{{asset("assets/js/product.js")}}" type="text/javascript"></script>
@endsection
