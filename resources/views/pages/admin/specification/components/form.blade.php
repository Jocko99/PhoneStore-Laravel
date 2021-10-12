@extends("layout.layout")
@section("title") Izmeni specifikaciju @endsection
@section("content")
    <form method="POST">
        @csrf
        <table class="w-100 table">
            <thead>
                <tr>
                    <th>Naziv</th>
                    <th>Sačuvaj</th>
                </tr>
            </thead>
            <tbody>
                @fore
            </tbody>
        </table>
    </form>
@endsection
