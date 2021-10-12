@extends("pages.admin.specification.template.templateA")
@section("naslov-specifikacije")Gps @endsection
@section("rows")
    @foreach($gps as $g)
        <tr>
            <td>{{$g->nazivGps}} </td>
            <td><a href="{{route("gps.edit",["gp"=>$g->idGps])}}" class="btn btn-info">Izmeni</a></td>
            <td>
                <form action="{{route("gps.destroy",["gp"=>$g->idGps])}}" method="POST">
                    @method("DELETE")
                    @csrf
                    <button type="submit" class="btn btn-info">Obriši</button>
                </form>
            </td>
        </tr>
    @endforeach
@endsection
@section("messages")
    @if(session()->has('success'))
        <div class="alert alert-success text-center">
            {{ session()->get('success') }}
        </div>
    @endif
    @if(session()->has('error'))
        <div class="alert alert-danger text-center">
            {{ session()->get('error') }}
        </div>
    @endif

@endsection
