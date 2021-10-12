@extends("pages.admin.specification.template.templateA")
@section("naslov-specifikacije") Detekcija osmeha @endsection
@section("rows")
    @foreach($video as $v)
        <tr>
            <td>{{$v->nazivVideo}}</td>
            <td><a href="{{route("video.edit",["video"=>$v->idVideoZapis])}}" class="btn btn-info">Izmeni</a></td>
            <td>
                <form action="{{route("video.destroy",["video"=>$v->idVideoZapis])}}" method="POST">
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
