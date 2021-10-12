@extends("layout.layout")
@section("title") Izveštaji korisnika @endsection
@section("links")
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.0/font/bootstrap-icons.css">
@endsection
@section("content")
    <div class="container-fluid">
        <h1 class="h2 text-center">Izveštaji korisnika</h1>
       <div class="row">
           <a href="{{route("admin")}}"><i class="far fa-arrow-alt-circle-left back"></i></a>
           <div class="col-lg-3">
               <form action="{{route("izvestaji")}}" method="GET">
                   @csrf
                   <label for="datumOd">Datum od:</label>
                   <input type="date" id="datumOd" name="datumOd" class="form-control"/>
                   <label for="datumDo">Datum do:</label>
                   <input type="date" id="datumDo" name="datumDo" class="form-control"/>
                   <div class="mt-2">
                       <button type="submit" class="btn btn-outline-primary">Pretraži <i class="bi bi-search"></i></button>
                   </div>
               </form>
           </div>
       </div>
        <div class="container">
            <table class="table">
                <thead>
                    <tr>
                        <th>Email</th>
                        <th>Aktivnost</th>
                        <th>Datum</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($reports as $report)
                    <tr>
                        <td>{{$report->email}}</td>
                        <td>{{$report->aktivnost}}</td>
                        <td>{{$report->datumAktivnosti}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{ $reports->links("vendor.pagination.simple-bootstrap-4") }}
        </div>
    </div>
@endsection
