@extends("layout.layout")
@section("title") Izmeni OS verziju @endsection
@section("content")
    <div class="container-fluid">
        <h1 class="h3 text-center">Izmeni OS verziju</h1>
        <a href="{{route("os-version.index")}}" class="pt-3"><i class="far fa-arrow-alt-circle-left back"></i></a>
        <div class="container">
            <form action="{{route("os-version.update",["os_version"=>$editOsVersion->idOsVerzija])}}" method="POST">
                @method("PUT")
                @csrf
                <table class="w-100 table">
                    <thead>
                    <tr>
                        <th>Naziv</th>
                        <th>OS</th>
                        <th>Sačuvaj</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td><input type="text" class="form-control" name="osVersionName" value="{{$editOsVersion->nazivOsVerzija}}"></td>
                        <td><select name="osName" class="form-control">
                                @foreach($getAllOs as $as)
                                    @if($editOsVersion->idOs == $as->idOs)
                                        <option value="{{$as->idOs}}" selected="selected">{{$as->nazivOs}}</option>
                                    @else
                                        <option value="{{$as->idOs}}">{{$as->nazivOs}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </td>
                        <td><input type="submit" class="btn btn-info" value="Sačuvaj"/></td>
                    </tr>
                    </tbody>
                </table>
            </form>
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
            @if ($errors->any())
                <div class="alert alert-danger text-center">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
    </div>
@endsection
