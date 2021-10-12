@extends("pages.admin.specification.template.templateA")
@section("naslov-specifikacije")Wifi @endsection
@section("rows")
    @foreach($wifi as $w)
        <tr>
            <td>{{$w->nazivWifi}} </td>
            <td><td><a href="{{route("wifi.edit",["wifi"=>$w->idWifi])}}" class="btn btn-info">Izmeni</a></td></td>
            <td>
                <form action="{{route("wifi.destroy",["wifi"=>$w->idWifi])}}" method="POST">
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
