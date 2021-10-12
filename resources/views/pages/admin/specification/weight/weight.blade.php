@extends("pages.admin.specification.template.templateA")
@section("naslov-specifikacije")Težina @endsection
@section("rows")
    @foreach($getAllWeight as $weight)
        <tr>
            <td>{{$weight->vrednost}} </td>
            <td><a href="{{route("weight.edit",["weight"=>$weight->idTezina])}}" class="btn btn-info">Izmeni</a></td>
            <td>
                <form action="{{route("weight.destroy",["weight"=>$weight->idTezina])}}" method="POST">
                    @method("DELETE")
                    @csrf
                    <button type="submit" class="btn btn-info">Obriši</button>
                </form>
            </td>
        </tr>
    @endforeach
    {{$getAllWeight->links()}}
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
