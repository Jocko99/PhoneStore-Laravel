@extends("layout.layout")
@section("title") Uređaji @endsection

@section("content")
    <div class="container-fluid">
        <div class="container">
            <div class="row">
                <!--SORTIRANJE-->
                <div class="col-lg-12 mt-1" id="telefoni">
                    <div class="float-left">
                        <h2 class="h4">Mobilni telefoni</h2>
                    </div>
                    <div class="float-right">
                        <form id="hideForm">
                            <select name="sort" id="sort" class="form-control">
                                <option value="0">Sortiraj</option>
                                <option value="1">A-Z rastuće</option>
                                <option value="2">A-Z opadajuće</option>
                                <option value="3">Po ceni rastuće</option>
                                <option value="4">Po ceni opadajuće</option>
                            </select>
                        </form>
                    </div>
                </div>
                <!--END SORTIRANJE-->
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-4 col-sm-4">
                    <div class="text-center">
                        <form>
                            <input type="text" class="form-control mb-2" name="searchMobile" id="searchMobile" placeholder="P40 lite.."/>
                            <small id="searchMobileInfo" class="alert-danger"></small>
                            <select class="form-control mb-2" id="mark">
                                <option value="0">Marka</option>
                                @foreach($mark as $m)
                                    <option value="{{$m->idMarka}}">{{$m->nazivMarka}}</option>
                                @endforeach
                            </select>
                            <small id="markInfo" class="alert-danger"></small>
                            <label for="odCena">Cena od:</label>
                            <input type="text" name="odCena" id="odCena" min="10.000" class="form-control" value="10.000"/>
                            <small id="odCenaInfo" class="alert-danger"></small>
                            <label for="doCena">Cena do:</label>
                            <input type="text" name="doCena" id="doCena" class="form-control" value="200.000"/>
                            <small id="doCenaInfo" class="alert-danger"></small>
                            <div class="d-flex justify-content-center p-3">
                                <button type="button" class="m-auto btn btn-info" id="searchButton">Pronađi<i class="fa fa-search pl-1"></i></button>
                            </div>
                        </form>
                    </div>
                </div>
                <!--PRODUCTS-->
                <div class="col-lg-8 col-md-8 col-sm-8" id="products">
                    @forelse($mobile as $product)
                        @include('partials.product')
                    @empty
                        <h2>Trenutno nema proizvoda</h2>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
    <div class="p-2 d-flex justify-content-center">
        {{$mobile->links('vendor.pagination.bootstrap-4')}}
    </div>
    <!--END FILTRIRANJE-->
@endsection
@section("script")
    <script src="{{asset("assets/js/product.js")}}" type="text/javascript"></script>
@endsection

