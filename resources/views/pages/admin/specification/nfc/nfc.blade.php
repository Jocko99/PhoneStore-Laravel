@extends("pages.admin.specification.template.templateA")
@section("naslov-specifikacije")Nfc @endsection
@section("rows")
    @foreach($nfc as $n)
        <tr>
            <td>{{$n->nazivNfc}} </td>
            <td><a href="{{route("nfc.edit",["nfc"=>$n->idNfc])}}" class="btn btn-info">Izmeni</a></td>
            <td>
                <form action="{{route("nfc.destroy",["nfc"=>$n->idNfc])}}" method="POST">
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
