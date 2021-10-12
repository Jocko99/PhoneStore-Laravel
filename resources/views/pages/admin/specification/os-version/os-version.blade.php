@extends("pages.admin.specification.template.templateA")
@section("naslov-specifikacije") OS - verzija @endsection
@section("relation")
    <th>OS</th>
@endsection
@section("rows")
    @foreach($os as $o)
        <tr>
            <td>{{$o->nazivOsVerzija}}</td>
            <td>{{$o->nazivOs}}</td>
            <td><a href="{{route("os-version.edit",["os_version"=>$o->idOsVerzija])}}" class="btn btn-info">Izmeni</a></td>
            <td><form action="{{route("os-version.destroy",["os_version"=>$o->idOsVerzija])}}" method="POST">
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
