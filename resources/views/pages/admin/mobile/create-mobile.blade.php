@extends("layout.layout")
@section("title") Dodaj uređaj @endsection
@section("content")
    <div class="container-fluid mt-2 mb-2">
        <a href="{{route("mobiles.index")}}"><i class="far fa-arrow-alt-circle-left back"></i></a>
    </div>
    <div class="container-fluid">
        <form action="{{route("mobiles.store")}}" method="POST" enctype="multipart/form-data">
            @csrf
            <table class="w-100 table" id="korisnici">
                <tbody>
                <tr>
                    <td>Cover slika</td>
                    <td><input type="file" name="coverSlika"/>
                    </td>
                </tr>
                <tr>
                    <td>Naziv</td>
                    <td><input type="text" class="form-control" name="mobileName"/></td>
                </tr>
                <tr>
                    <td>Marka</td>
                    <td><select name="mobileBrand" class="form-control">
                            <option value="0">Izaberi</option>
                            @foreach($mark as $m)
                            <option value="{{$m->idMarka}}">{{$m->nazivMarka}}</option>
                            @endforeach
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Cena</td>
                    <td><input type="text" class="form-control" placeholder="70.000 .." name="mobilePrice"/></td>
                </tr>
                <tr>
                    <td>Operativni sistem</td>
                    <td><select name="mobileOs" id="os" class="form-control">
                            <option value="0">Izaberi</option>
                            @foreach($os as $sistem)
                            <option value="{{$sistem->idOs}}">{{$sistem->nazivOs}}-{{$sistem->nazivOsVerzija}}</option>
                            @endforeach
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Chipset</td>
                    <td><select name="mobileChipset" class="form-control">
                            <option value="0">Izaberi</option>
                            @foreach($chipset as $c):?>
                            <option value="{{$c->idChipset}}">{{$c->nazivChipset}} - {{$c->nazivProcesor}}</option>
                             @endforeach
                        </select>
                    </td>
                </tr>
                <tr>
                    <th class="border-top-1 border-secondary">Zadnja kamera</th>
                    <td class="border-top-1 border-secondary"><select name="mobileMainCamera" class="form-control">
                            <option value="0">Izaberi</option>
                            @foreach($camera as $cam):?>
                            <option value="{{$cam->idKamera}}">{{$cam->brojPiksela}} mpx</option>
                            @endforeach
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Hdr</td>
                    <td><select name="mobileBackCameraHdr" class="form-control">
                            <option value="0">Izaberi</option>
                            @foreach($hdr as $h)
                                <option value="{{$h->idHdr}}">{{$h->nazivHdr}}</option>
                            @endforeach
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Detekcija osmeha</td>
                    <td><select name="mobileBackCameraDetectionSmile" class="form-control">
                            <option value="0">Izaberi</option>
                            @foreach($smileDetect as $sd)
                                <option value="{{$sd->idDetekcijaOsmeha}}">{{$sd->nazivOsmeh}}</option>
                            @endforeach
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Video zapis</td>
                    <td><select name="mobileBackCameraVideo" class="form-control">
                            <option value="0">Izaberi</option>
                            @foreach($video as $v)
                                <option value="{{$v->idVideoZapis}}">{{$v->nazivVideo}}</option>
                            @endforeach
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Blic</td>
                    <td><select name="mobileBackCameraBlic" class="form-control">
                            <option value="0">Izaberi</option>
                            @foreach($blic as $bl)
                                <option value="{{$bl->idBlic}}">{{$bl->nazivBlic}}</option>
                            @endforeach
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Autofokus</td>
                    <td><select name="mobileBackCameraAutoFocus" class="form-control">
                            <option value="0">Izaberi</option>
                            @foreach($autofocus as $af)
                                <option value="{{$af->idAutofokus}}">{{$af->nazivAutofokus}}</option>
                            @endforeach
                        </select>
                    </td>
                </tr>
                <tr>
                    <th class="border-top-1 border-secondary">Prednja kamera</th>
                    <td class="border-top-1 border-secondary"><select name="mobileFrontCamera" class="form-control">
                            <option value="0">Izaberi</option>
                            @foreach($camera as $cam):?>
                            <option value="{{$cam->idKamera}}">{{$cam->brojPiksela}} mpx</option>
                            @endforeach
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Hdr</td>
                    <td><select name="mobileFrontCameraHdr" class="form-control">
                            <option value="0">Izaberi</option>
                            @foreach($hdr as $h)
                                <option value="{{$h->idHdr}}">{{$h->nazivHdr}}</option>
                            @endforeach
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Detekcija osmeha</td>
                    <td><select name="mobileFrontCameraDetectionSmile" class="form-control">
                            <option value="0">Izaberi</option>
                            @foreach($smileDetect as $sd)
                                <option value="{{$sd->idDetekcijaOsmeha}}">{{$sd->nazivOsmeh}}</option>
                            @endforeach
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Video zapis</td>
                    <td><select name="mobileFrontCameraVideo" class="form-control">
                            <option value="0">Izaberi</option>
                            @foreach($video as $v)
                                <option value="{{$v->idVideoZapis}}">{{$v->nazivVideo}}</option>
                            @endforeach
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Blic</td>
                    <td><select name="mobileFrontCameraBlic" class="form-control">
                            <option value="0">Izaberi</option>
                            @foreach($blic as $bl)
                                <option value="{{$bl->idBlic}}">{{$bl->nazivBlic}}</option>
                            @endforeach
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Autofokus</td>
                    <td><select name="mobileFrontCameraAutoFocus" class="form-control">
                            <option value="0">Izaberi</option>
                            @foreach($autofocus as $af)
                                <option value="{{$af->idAutofokus}}">{{$af->nazivAutofokus}}</option>
                            @endforeach
                        </select>
                    </td>
                </tr>
                <tr>
                    <td class="border-top-1 border-secondary">Veličina ekrana</td>
                    <td class="border-top-1 border-secondary"><select name="mobileDisplaySize" class="form-control">
                            <option value="0">Izaberi</option>
                            @foreach($displaysize as $ds)
                                <option value="{{$ds->idVelicinaEkrana}}">{{$ds->vrednostVelicina}} inch</option>
                            @endforeach
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Na dodir</td>
                    <td><select name="mobileTouch" class="form-control">
                            <option value="0">Izaberi</option>
                            @foreach($ontouch as $touch)
                            <option value="{{$touch->idNaDodir}}">{{$touch->nazivNaDodir}}</option>
                            @endforeach
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Tip ekrana</td>
                    <td><select name="mobileDisplayType" class="form-control">
                            <option value="0">Izaberi</option>
                            @foreach($displaytype as $display)
                                <option value="{{$display->idVrstaEkrana}}">{{$display->nazivEkrana}}</option>
                            @endforeach
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Rezolucija</td>
                    <td><select name="mobileDisplayResolution" class="form-control">
                            <option value="0">Izaberi</option>
                            @foreach($resolution as $rs)
                                <option value="{{$rs->idRezolucija}}">{{$rs->nazivRezolucija}}</option>
                            @endforeach
                        </select>
                    </td>
                </tr>
                <tr>
                    <td class="border-top-1 border-secondary">Baterija</td>
                    <td class="border-top-1 border-secondary"><select name="mobileBattery" class="form-control">
                            <option value="0">Izaberi</option>
                            @foreach($battery as $bat)
                                <option value="{{$bat->idBaterijaTip}}">{{$bat->nazivBaterija}}</option>
                            @endforeach
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Kapacitet baterije</td>
                    <td><select name="mobileBatteryCapacity" class="form-control">
                            <option value="0">Izaberi</option>
                            @foreach($batterycapacity as $batCap)
                                <option value="{{$batCap->idBaterijaKapacitet}}">{{$batCap->kapacitet}} mAh</option>
                            @endforeach
                        </select>
                    </td>
                </tr>
                <tr>
                    <td class="border-top-1 border-secondary">Ram memorija</td>
                    <td class="border-top-1 border-secondary"><select name="mobileRam" class="form-control">
                            <option value="0">Izaberi</option>
                            @foreach($ram as $r)
                                <option value="{{$r->idRam}}">{{$r->memorija}} GB</option>
                            @endforeach
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Interna memorija</td>
                    <td><select name="mobileInternal" class="form-control">
                            <option value="0">Izaberi</option>
                            @foreach($inter as $interMemory)
                                <option value="{{$interMemory->idInterna}}">{{$interMemory->memorija}} GB</option>
                            @endforeach
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Eksterna memorija</td>
                    <td><select name="mobileCardSlot" class="form-control">
                            <option value="0">Izaberi</option>
                            @foreach($external as $ex)
                                <option value="{{$ex->idEksterna}}">do {{$ex->memorija}} GB</option>
                            @endforeach
                        </select>
                    </td>
                </tr>
                <tr>
                    <td class="border-top-1 border-secondary">Wifi</td>
                    <td class="border-top-1 border-secondary"><select name="mobileWifi" class="form-control">
                            <option value="0">Izaberi</option>
                            @foreach($wifi as $wf)
                                <option value="{{$wf->idWifi}}">{{$wf->nazivWifi}}</option>
                            @endforeach
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Bluetooth</td>
                    <td><select name="mobileBluetooth" class="form-control">
                            <option value="0">Izaberi</option>
                            @foreach($bluetooth as $bl)
                                <option value="{{$bl->idBluetooth}}">{{$bl->nazivBluetooth}}</option>
                            @endforeach
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Usb</td>
                    <td><select name="mobileUsb" class="form-control">
                            <option value="0">Izaberi</option>
                            @foreach($usb as $us)
                                <option value="{{$us->idUsb}}">Version {{$us->nazivUsb}}</option>
                            @endforeach
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Nfc</td>
                    <td><select name="mobileNfc" class="form-control">
                            <option value="0">Izaberi</option>
                            @foreach($nfc as $nf)
                                <option value="{{$nf->idNfc}}">{{$nf->nazivNfc}}</option>
                            @endforeach
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Gps</td>
                    <td><select name="mobileGps" class="form-control">
                            <option value="0">Izaberi</option>
                            @foreach($gps as $gp)
                                <option value="{{$gp->idGps}}">{{$gp->nazivGps}}</option>
                            @endforeach
                        </select>
                    </td>
                </tr>
                <tr>
                    <td class="border-top-1 border-secondary">Težina</td>
                    <td class="border-top-1 border-secondary"><select name="mobileWeight" class="form-control">
                            <option value="0">Izaberi</option>
                            @foreach($weight as $wght)
                                <option value="{{$wght->idTezina}}">{{$wght->vrednost}} g</option>
                            @endforeach
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><button name="btnInsertMobile" id="btnInsert" class="btn btn-outline-info">Dodaj</button></td>
                </tr>
                </tbody>
            </table>
        </form>
    </div>
    <div class="container-fluid">
        <div class="container">
            <div class="row d-flex justify-content-center">
                @if ($errors->any())
                    <div class="alert alert-danger" id="scrollToError">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
