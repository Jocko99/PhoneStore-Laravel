@extends("layout.layout")
@section("title") Specifikacije @endsection
@section("links")<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.0/font/bootstrap-icons.css"/>@endsection
@section("content")
    <div class="container-fluid">
        <div class="container">
            <h1 class="h3 text-center">@yield("naslov-specifikacije")</h1>
        </div>
        <a href="{{route("specification")}}"><i class="far fa-arrow-alt-circle-left back"></i></a>
        <div class="container">
            <table class="w-100 table">
                <thead>
                <tr>
                    <th>Naziv</th>
                    @yield("relation")
                    <th>Izmeni</th>
                    <th>Obriši</th>
                </tr>
                </thead>
                <tbody>
                @yield("rows")
                </tbody>
            </table>
            @yield("messages")
        </div>
    </div>
@endsection


