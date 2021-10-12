@extends("pages.admin.specification.template.templateA")
@section("naslov-specifikacije") Kapacitet baterije @endsection
@section("rows")
    @foreach($batterycapacity as $bc)
        <tr>
            <td>{{$bc->kapacitet}}</td>
            <td><a href="{{route("battery-capacity.edit",["battery_capacity"=>$bc->idBaterijaKapacitet])}}" class="btn btn-info">Izmeni</a></td>
            <td>
                <form action="{{route("battery-capacity.destroy",["battery_capacity"=>$bc->idBaterijaKapacitet])}}" method="POST">
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
