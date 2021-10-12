@extends("pages.admin.specification.template.templateA")
@section("naslov-specifikacije") Veličina ekrana @endsection
@section("rows")
    @foreach($displaysize as $ds)
        <tr>
            <td>{{$ds->vrednostVelicina}}</td>
            <td><a href="{{route("display-size.edit",["display_size"=>$ds->idVelicinaEkrana])}}" class="btn btn-info">Izmeni</a></td>
            <td>
                <form action="{{route("display-size.destroy",["display_size"=>$ds->idVelicinaEkrana])}}" method="POST">
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
