@extends("pages.admin.specification.template.templateA")
@section("naslov-specifikacije")Bluetooth @endsection
@section("rows")
    @foreach($bluetooth as $bl)
        <tr>
            <td>{{$bl->nazivBluetooth}} </td>
            <td><td><a href="{{route("bluetooth.edit",["bluetooth"=>$bl->idBluetooth])}}" class="btn btn-info">Izmeni</a></td></td>
            <td>
                <form action="{{route("bluetooth.destroy",["bluetooth"=>$bl->idBluetooth])}}" method="POST">
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
