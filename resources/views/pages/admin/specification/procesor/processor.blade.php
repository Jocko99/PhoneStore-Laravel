@extends("pages.admin.specification.template.templateA")
@section("naslov-specifikacije") Chipset @endsection
@section("relation")
    <th>Chipset</th>
@endsection
@section("rows")
    @foreach($chipset as $c)
        <tr>
            <td>{{$c->nazivProcesor}}</td>
            <td>{{$c->nazivChipset}}</td>
            <td><a href="{{route("processor.edit",["processor"=>$c->idProcesor])}}" class="btn btn-info">Izmeni</a></td>
            <td><form action="{{route("processor.destroy",["processor"=>$c->idProcesor])}}" method="POST">
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
