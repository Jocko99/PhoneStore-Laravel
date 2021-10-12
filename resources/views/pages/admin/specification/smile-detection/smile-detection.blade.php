@extends("pages.admin.specification.template.templateA")
@section("naslov-specifikacije") Detekcija osmeha @endsection
@section("rows")
    @foreach($smileDetect as $smile)
        <tr>
            <td>{{$smile->nazivOsmeh}}</td>
            <td><a href="{{route("smile-detection.edit",["smile_detection"=>$smile->idDetekcijaOsmeha])}}" class="btn btn-info">Izmeni</a></td>
            <td>
                <form action="{{route("smile-detection.destroy",["smile_detection"=>$smile->idDetekcijaOsmeha])}}" method="POST">
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
