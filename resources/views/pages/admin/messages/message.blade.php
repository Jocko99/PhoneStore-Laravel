@extends("layout.layout")
@section("title") Admin panel @endsection

@section("content")
    <div class="container-fluid">
        <div class="container">
            <h1 class="h2 text-center">Poruke</h1>
            <a href="http://127.0.0.1:8000/admin"><i class="far fa-arrow-alt-circle-left back"></i></a>
            <div class="row">
                <form class="table">
                    <table>
                        <thead>
                            <tr>
                                <th>RB.</th>
                                <th>Ime</th>
                                <th>Prezime</th>
                                <th>Email</th>
                                <th>Poruka</th>
                                <th>Datum</th>
                                <th>Odgovori</th>
                                <th>Obriši</th>
                            </tr>
                        </thead>
                        <tbody id="tabelaPoruke">

                        </tbody>
                    </table>
                </form>
            </div>
        </div>
    </div>
@endsection
@section("script")
    <script src="{{asset("assets/js/contact.js")}}" type="text/javascript"></script>
@endsection
