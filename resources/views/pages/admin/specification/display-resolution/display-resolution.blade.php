@extends("pages.admin.specification.template.templateA")
@section("naslov-specifikacije") Rezolucija ekrana @endsection
@section("rows")
    @foreach($resolution as $r)
        <tr>
            <td>{{$r->nazivRezolucija}}</td>
            <td><a href="{{route("display-resolution.edit",["display_resolution"=>$r->idRezolucija])}}" class="btn btn-info">Izmeni</a></td>
            <td>
                <form action="{{route("display-resolution.destroy",["display_resolution"=>$r->idRezolucija])}}" method="POST">
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
