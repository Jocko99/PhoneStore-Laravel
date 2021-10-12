@extends("pages.admin.specification.template.templateA")
@section("naslov-specifikacije") Blic @endsection
@section("rows")
    @foreach($blic as $b)
        <tr>
            <td>{{$b->nazivBlic}}</td>
            <td><a href="{{route("blic.edit",["blic"=>$b->idBlic])}}" class="btn btn-info">Izmeni</a></td>
            <td>
                <form action="{{route("blic.destroy",["blic"=>$b->idBlic])}}" method="POST">
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
