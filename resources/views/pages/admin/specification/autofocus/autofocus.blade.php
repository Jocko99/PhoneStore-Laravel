@extends("pages.admin.specification.template.templateA")
@section("naslov-specifikacije") Autofokus @endsection
@section("rows")
    @foreach($autofocus as $a)
        <tr>
            <td>{{$a->nazivAutofokus}}</td>
            <td><a href="{{route("autofocus.edit",["autofocu"=>$a->idAutofokus])}}" class="btn btn-info">Izmeni</a></td>
            <td>
                <form action="{{route("autofocus.destroy",["autofocu"=>$a->idAutofokus])}}" method="POST">
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
