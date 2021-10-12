@extends("pages.admin.specification.template.templateA")
@section("naslov-specifikacije") Chipset @endsection
@section("rows")
    @foreach($allChipset as $c)
        <tr>
            <td>{{$c->nazivChipset}}</td>
            <td><a href="{{route("chipset.edit",["chipset"=>$c->idChipset])}}" class="btn btn-info">Izmeni</a></td>
            <td>
                <form action="{{route("chipset.destroy",["chipset"=>$c->idChipset])}}" method="POST">
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
