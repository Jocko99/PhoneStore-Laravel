@extends("pages.admin.specification.template.templateA")
@section("naslov-specifikacije") Hdr @endsection
@section("rows")
    @foreach($hdr as $h)
        <tr>
            <td>{{$h->nazivHdr}}</td>
            <td><a href="{{route("hdr.edit",["hdr"=>$h->idHdr])}}" class="btn btn-info">Izmeni</a></td>
            <td>
                <form action="{{route("hdr.destroy",["hdr"=>$h->idHdr])}}" method="POST">
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
