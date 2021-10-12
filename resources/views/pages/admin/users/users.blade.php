@extends("layout.layout")
@section("title") Uređaji @endsection
@section("links")
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.0/font/bootstrap-icons.css">
@endsection
@section("content")
    <div class="container-fluid">
        <div class="container">
            <h1 class="h3 text-center">Korisnici</h1>
        </div>
        <a href="{{route("admin")}}"><i class="far fa-arrow-alt-circle-left back"></i></a>
        <div class="container">
            <div class="row">
                <form>
                    <div class="input-group w-100 mt-5">
                        <input type="search" id="userSearchAdmin" class="form-control rounded" placeholder="Ime.." aria-label="Search" aria-describedby="search-addon">
                        <button type="button" id="btnUserSearch" class="btn btn-outline-primary"><i class="bi bi-search"></i></button>
                    </div>
                </form>
            </div>
            <table class="w-100 table">
                <thead>
                <tr>
                    <th>RB.</th>
                    <th>Ime</th>
                    <th>Prezime</th>
                    <th>Email</th>
                    <th>Lozinka</th>
                    <th>Br.telefona</th>
                    <th>Mesto</th>
                    <th>Uloga</th>
                    <th>Izmeni</th>
                    <th>Obriši</th>
                </tr>
                </thead>
                <tbody id="allUsers">

                </tbody>
            </table>
{{--            {{ $items->links("vendor.pagination.simple-bootstrap-4") }}--}}
        </div>
    </div>
@endsection
@section("script")
    <script src="{{asset("assets/js/user.js")}}" type="text/javascript"></script>
@endsection
