@extends("layout.layout")
@section("title") Specifikacije @endsection
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
                    <th>@yield("relation")</th>
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


