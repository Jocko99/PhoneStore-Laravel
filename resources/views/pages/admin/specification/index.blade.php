@extends("layout.layout")
@section("title") Uređaji @endsection
@section("links")
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.0/font/bootstrap-icons.css">
@endsection
@section("content")
    <div class="container-fluid">
        <div class="container">
            <h1 class="h3 text-center">Specifikacije</h1>
        </div>
        <a href="{{route("admin")}}"><i class="far fa-arrow-alt-circle-left back"></i></a>
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
        <div class="container">
            <table class="w-100 table">
                <thead>
                <tr>
                    <th>Naziv</th>
                    <th>Pregled</th>
                    <th>Dodaj</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>Marka</td>
                    <td><a class="btn btn-info" href="{{route("mark.index")}}" id="showMark">Pregled</a></td>
                    <td><a class="btn btn-info" href="{{route("mark.create")}}" id="addMark">Dodaj</a></td>
                </tr>
                <tr>
                    <td>Chipset</td>
                    <td><a class="btn btn-info" href="{{route("chipset.index")}}" id="showChipset">Pregled</a></td>
                    <td><a class="btn btn-info" href="{{route("chipset.create")}}" id="addChipset">Dodaj</a></td>
                </tr>
                <tr>
                    <td>Procesor</td>
                    <td><a class="btn btn-info" href="{{route("processor.index")}}" id="showProcessor">Pregled</a></td>
                    <td><a class="btn btn-info" href="{{route("processor.create")}}" id="addProcessor">Dodaj</a></td>
                </tr>
                <tr>
                    <th>Sistem</th>
                </tr>
                <tr>
                    <td>OS</td>
                    <td><a class="btn btn-info" href="{{route("os.index")}}" id="showOs">Pregled</a></td>
                    <td><a class="btn btn-info" href="{{route("os.create")}}" id="addOs">Dodaj</a></td>
                </tr>
                <tr>
                    <td>Verzija - Os</td>
                    <td><a class="btn btn-info" href="{{route("os-version.index")}}" id="showOsVersion">Pregled</a></td>
                    <td><a class="btn btn-info" href="{{route("os-version.create")}}" id="addOsVersion">Dodaj</a></td>
                </tr>
                <tr>
                    <th>Kamera</th>
                </tr>
                <tr>
                    <td>Kamera</td>
                    <td><a class="btn btn-info" href="{{route("camera.index")}}" id="showHdr">Pregled</a></td>
                    <td><a class="btn btn-info" href="{{route("camera.create")}}" id="addHdr">Dodaj</a></td>
                </tr>
                <tr>
                    <td>Hdr</td>
                    <td><a class="btn btn-info" href="{{route("hdr.index")}}" id="showHdr">Pregled</a></td>
                    <td><a class="btn btn-info" href="{{route("hdr.create")}}" id="addHdr">Dodaj</a></td>
                </tr>
                <tr>
                    <td>Detekcija osmeha</td>
                    <td><a class="btn btn-info" href="{{route("smile-detection.index")}}" id="showSmileDetection">Pregled</a></td>
                    <td><a class="btn btn-info" href="{{route("smile-detection.create")}}" id="addSmileDetection">Dodaj</a></td>
                </tr>
                <tr>
                    <td>Video</td>
                    <td><a class="btn btn-info" href="{{route("video.index")}}" id="showVideo">Pregled</a></td>
                    <td><a class="btn btn-info" href="{{route("video.create")}}" id="addVideo">Dodaj</a></td>
                </tr>
                <tr>
                    <td>Blic</td>
                    <td><a class="btn btn-info" href="{{route("blic.index")}}" id="showBlic">Pregled</a></td>
                    <td><a class="btn btn-info" href="{{route("blic.create")}}" id="addBlic">Dodaj</a></td>
                </tr>
                <tr>
                    <td>Autofokus</td>
                    <td><a class="btn btn-info" href="{{route("autofocus.index")}}" id="showAutofocus">Pregled</a></td>
                    <td><a class="btn btn-info" href="{{route("autofocus.create")}}" id="addAutofocus">Dodaj</a></td>
                </tr>
                <tr>
                    <th>Baterija</th>
                </tr>
                <tr>
                    <td>Kapacitet baterije</td>
                    <td><a class="btn btn-info" href="{{route("battery-capacity.index")}}" id="showBatteryCapacity">Pregled</a></td>
                    <td><a class="btn btn-info" href="{{route("battery-capacity.create")}}" id="addBatteryCapacity">Dodaj</a></td>
                </tr>
                <tr>
                    <td>Tip baterije</td>
                    <td><a class="btn btn-info" href="{{route("battery-type.index")}}" id="showBatteryType">Pregled</a></td>
                    <td><a class="btn btn-info" href="{{route("battery-type.create")}}" id="addBatteryType">Dodaj</a></td>
                </tr>
                <tr>
                    <th>Ekran</th>
                </tr>
                <tr>
                    <td>Veličina ekrana</td>
                    <td><a class="btn btn-info" href="{{route("display-size.index")}}" id="showDisplaySize">Pregled</a></td>
                    <td><a class="btn btn-info" href="{{route("display-size.create")}}" id="addDisplaySize">Dodaj</a></td>
                </tr>
                <tr>
                    <td>Ekran na dodir</td>
                    <td><a class="btn btn-info" href="{{route("display-on-touch.index")}}" id="showDisplayOnTouch">Pregled</a></td>
                    <td><a class="btn btn-info" href="{{route("display-on-touch.create")}}" id="addDisplayOnTouch">Dodaj</a></td>
                </tr>
                <tr>
                    <td>Rezolucija ekrana</td>
                    <td><a class="btn btn-info" href="{{route("display-resolution.index")}}" id="showDisplayResoluton">Pregled</a></td>
                    <td><a class="btn btn-info" href="{{route("display-resolution.create")}}" id="addDisplayResoluton">Dodaj</a></td>
                </tr>
                <tr>
                    <th>Memorija</th>
                </tr>
                <tr>
                    <td>Ram memorija</td>
                    <td><a class="btn btn-info" href="{{route("ram.index")}}" id="showRamMemory">Pregled</a></td>
                    <td><a class="btn btn-info" href="{{route("ram.create")}}" id="addRamMemory">Dodaj</a></td>
                </tr>
                <tr>
                    <td>Interna emorija</td>
                    <td><a class="btn btn-info" href="{{route("internal.index")}}" id="showInternalMemory">Pregled</a></td>
                    <td><a class="btn btn-info" href="{{route("internal.create")}}" id="addInternalMemory">Dodaj</a></td>
                </tr>
                <tr>
                    <td>Eksterna memorija</td>
                    <td><a class="btn btn-info" href="{{route("external.index")}}" id="showExternalMemory">Pregled</a></td>
                    <td><a class="btn btn-info" href="{{route("external.create")}}" id="addExternalMemory">Dodaj</a></td>
                </tr>
                <tr>
                    <th>Povezivanje</th>
                </tr>
                <tr>
                    <td>Wifi</td>
                    <td><a class="btn btn-info" href="{{route("wifi.index")}}" id="showWifi">Pregled</a></td>
                    <td><a class="btn btn-info" href="{{route("wifi.create")}}" id="addWifi">Dodaj</a></td>
                </tr>
                <tr>
                    <td>Bluetooth</td>
                    <td><a class="btn btn-info" href="{{route("bluetooth.index")}}" id="showBluetooth">Pregled</a></td>
                    <td><a class="btn btn-info" href="{{route("bluetooth.create")}}" id="addBluetooth">Dodaj</a></td>
                </tr>
                <tr>
                    <td>Usb</td>
                    <td><a class="btn btn-info" href="{{route("usb.index")}}" id="showUsb">Pregled</a></td>
                    <td><a class="btn btn-info" href="{{route("usb.create")}}#" id="addUsb">Dodaj</a></td>
                </tr>
                <tr>
                    <td>Nfc</td>
                    <td><a class="btn btn-info" href="{{route("nfc.index")}}" id="showNfc">Pregled</a></td>
                    <td><a class="btn btn-info" href="{{route("nfc.create")}}" id="addNfc">Dodaj</a></td>
                </tr>
                <tr>
                    <td>Gps</td>
                    <td><a class="btn btn-info" href="{{route("gps.index")}}" id="showGps">Pregled</a></td>
                    <td><a class="btn btn-info" href="{{route("gps.create")}}" id="addGps">Dodaj</a></td>
                </tr>
                <tr>
                    <th>Težina</th>
                </tr>
                <tr>
                    <td>Weight</td>
                    <td><a class="btn btn-info" href="{{route("weight.index")}}" id="showWeight">Pregled</a></td>
                    <td><a class="btn btn-info" href="{{route("weight.create")}}#" id="addWeight">Dodaj</a></td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
