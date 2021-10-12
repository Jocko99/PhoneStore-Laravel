@extends("pages.admin.specification.template.templateA")
@section("naslov-specifikacije") Marka @endsection
@section("rows")
    @foreach($mark as $m)
    <tr>
        <td>{{$m->nazivMarka}}</td>
        <td><a href="{{route("mark.edit",["mark"=>$m->idMarka])}}" class="btn btn-info">Izmeni</a></td>
        <td>
            <form action="{{route("mark.destroy",["mark"=>$m->idMarka])}}" method="POST">
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
