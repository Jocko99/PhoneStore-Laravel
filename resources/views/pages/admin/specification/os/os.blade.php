@extends("pages.admin.specification.template.templateA")
@section("naslov-specifikacije") OS @endsection

@section("rows")
    @foreach($getAllOs as $o)
        <tr>
            <td>{{$o->nazivOs}}</td>
            <td><a href="{{route("os.edit",["o"=>$o->idOs])}}" class="btn btn-info">Izmeni</a></td>
            <td><form action="{{route("os.destroy",["o"=>$o->idOs])}}" method="POST">
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
