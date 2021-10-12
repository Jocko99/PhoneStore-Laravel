@extends("pages.admin.specification.template.templateA")
@section("naslov-specifikacije") Tip baterije @endsection
@section("rows")
    @foreach($battery as $b)
        <tr>
            <td>{{$b->nazivBaterija}}</td>
            <td><a href="{{route("battery-type.edit",["battery_type"=>$b->idBaterijaTip])}}" class="btn btn-info">Izmeni</a></td>
            <td>
                <form action="{{route("battery-type.destroy",["battery_type"=>$b->idBaterijaTip])}}" method="POST">
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
