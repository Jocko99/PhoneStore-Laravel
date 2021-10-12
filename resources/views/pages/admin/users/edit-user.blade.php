@extends("layout.layout")
@section("title") Izmeni korisnika @endsection

@section("content")
    <div class="container-fluid mt-2 mb-2">
        <a href="{{route("users")}}"><i class="far fa-arrow-alt-circle-left back"></i></a>
    </div>
    <div class="container-fluid">
        <table class="w-100 table text-center" id="korisnici">
            <form>
                <thead>
                <tr>
                    <th>RB.</th>
                    <th>Ime</th>
                    <th>Prezime</th>
                    <th>Email</th>
                    <th>Lozinka</th>
                    <th>Br.telefona</th>
                    <th>Mesto</th>
                    <th>Uloga</th>
                    <th>Potvrdi</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    @php $i=1; @endphp
                    @foreach($users as $user)
                    <td><input type="hidden" value="{{$user->idKorisnik}}" id="hiddenID" name="hiddenID"/>{{$i++}}</td>
                    <td><input type="text" class="form-control" value="{{$user->ime}}" id="updateIme" name="updateIme"/></td>
                    <td><input type="text" class="form-control" value="{{$user->prezime}}" id="updatePrezime" name="updatePrezime"/></td>
                    <td><input type="text" class="form-control" value="{{$user->email}}" id="updateEmail" name="updateEmail"/></td>
                    <td><input type="password" class="form-control" id="updateLozinka" name="updateLozinka"/></td>
                    <td><input type="text" class="form-control" value="{{$user->brojTelefona}}" id="updateBrTelefon" name="updateBrTelefon"/></td>
                    <td><input type="text" class="form-control" value="{{$user->idMesta}}" id="updateMesto" name="updateMesto"/></td>
                    <td><select name="updateUloga" id="updateUloga" class="form-control">
                            @if($user->idUloga == 1)
                            <option value="1" selected="selected">Admin</option>
                            <option value="2">Korisnik</option>
                            @else
                            <option value="1">Admin</option>
                            <option value="2" selected="selected">Korisnik</option>
                            @endif
                        </select>
                    </td>
                    <td><button id="btnUpdateUser" type="button" class="btn btn-outline-info">Potvrdi</button></td>
                </tr>
                @endforeach
                </tbody>
            </form>
        </table>
    </div>
    <div id="messageForUser"></div>
    <div id="freeSpace"></div>
@endsection
@section("script")
    <script src="{{asset("assets/js/user.js")}}" type="text/javascript"></script>
@endsection
