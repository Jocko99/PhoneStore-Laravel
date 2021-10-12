@extends("pages.admin.specification.template.templateA")
@section("naslov-specifikacije")Interna memorija @endsection
@section("rows")
    @foreach($inter as $i)
        <tr>
            <td>{{$i->memorija}} GB</td>
            <td><i class="bi bi-x h-3"></i></td>
            <td>
                <form action="{{route("internal.destroy",["internal"=>$i->idInterna])}}" method="POST">
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
