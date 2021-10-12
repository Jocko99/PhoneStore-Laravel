@extends("pages.admin.specification.template.templateA")
@section("naslov-specifikacije") Ekran na dodir @endsection
@section("rows")
    @foreach($ontouch as $ot)
        <tr>
            <td>{{$ot->nazivNaDodir}}</td>
            <td><a href="{{route("display-on-touch.edit",["display_on_touch"=>$ot->idNaDodir])}}" class="btn btn-info">Izmeni</a></td>
            <td>
                <form action="{{route("display-on-touch.destroy",["display_on_touch"=>$ot->idNaDodir])}}" method="POST">
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
