@extends("pages.admin.specification.template.templateA")
@section("naslov-specifikacije") Kamera @endsection
@section("rows")
    @foreach($camera as $c)
        <tr>
            <td>{{$c->brojPiksela}}</td>
            <td><a href="{{route("camera.edit",["camera"=>$c->idKamera])}}" class="btn btn-info">Izmeni</a></td>
            <td>
                <form action="{{route("camera.destroy",["camera"=>$c->idKamera])}}" method="POST">
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
