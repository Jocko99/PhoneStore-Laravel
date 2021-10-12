@extends("pages.admin.specification.template.templateA")
@section("naslov-specifikacije")Ram memorija @endsection
@section("rows")
    @foreach($ram as $r)
        <tr>
            <td>{{$r->memorija}} GB</td>
            <td><i class="bi bi-x h-3"></i></td>
            <td>
                <form action="{{route("ram.destroy",["ram"=>$r->idRam])}}" method="POST">
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
