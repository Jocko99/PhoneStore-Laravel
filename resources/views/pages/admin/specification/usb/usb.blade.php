@extends("pages.admin.specification.template.templateA")
@section("naslov-specifikacije")Usb @endsection
@section("rows")
    @foreach($usb as $u)
        <tr>
            <td>{{$u->nazivUsb}} </td>
            <td><a href="{{route("usb.edit",["usb"=>$u->idUsb])}}" class="btn btn-info">Izmeni</a></td>
            <td>
                <form action="{{route("usb.destroy",["usb"=>$u->idUsb])}}" method="POST">
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
