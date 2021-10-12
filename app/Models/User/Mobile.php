<?php


namespace App\Models\User;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Mobile
{
    public function getMobiles(Request $request){

        $query = DB::table("telefon as t")
            ->join("velicina_ekrana as ve","t.idVelicinaEkrana","=","ve.idVelicinaEkrana")
            ->join("ram as r","t.idRam","=","r.idRam")
            ->join("interna as i","t.idInterna","=","i.idInterna")
            ->join("zadnja_specifikacija as zs","t.idTelefon","=","zs.idTelefon")
            ->join("baterija_kapacitet as bk","t.idBaterijaKapacitet","=","bk.idBaterijaKapacitet")
            ->join("cenovnik as c","t.idTelefon","=","c.idTelefon")
            ->join("kamera as kam","zs.idKamera","=","kam.idKamera");
        if($request->input("search")!=null){
            //dd($request->input("search"));
            $query = $query->where("t.naziv","like","%".$request->input("search")."%");
        }
        if($request->input("mark")!=null){

            $query = $query->where("t.idMarka","=",$request->input("mark"));
        }
        if($request->has("priceFrom") || $request->has("priceTill")){
            //dd($request->input("priceFrom"));
            $query = $query->where("c.cena",">=",$request->input("priceFrom"));
            $query = $query->where("c.cena","<=",$request->input("priceTill"));
        }
        if($request->input("sort")!=null){
            $sort = $request->input("sort");
            if($sort=="1"){
                $query = $query->orderBy("t.naziv","ASC");
            }
            if($sort=="2"){
                $query = $query->orderBy("t.naziv","DESC");
            }
            if($sort=="3"){
                $query = $query->orderBy("c.cena","ASC");
            }
            if($sort=="4"){
                $query = $query->orderBy("c.cena","DESC");
            }
        }
        $query = $query->select("t.idTelefon","t.naziv","t.coverSlika","c.cena","ve.vrednostVelicina","bk.kapacitet","kam.brojPiksela","r.memorija as ram","i.memorija as interna")
            ->paginate(6);
        return $query;
    }
    public function getMark(){
        return DB::table("marka")->get();
    }


    public function findMobile(Request $request){
        return DB::table("telefon")->where("naziv","like","%".$request->input("mobile")."%")->get();
    }

    public function findMobileSpecification(){

    }


    public function getMobileSpecification($id){
        $query = DB::table("telefon as t")
            ->join("os","t.idOs","=","os.idOs")
            ->join("os_verzija as osv","os.idOs","=","osv.idOs")
            ->join("chipset","t.idChipset","=","chipset.idChipset")
            ->join("procesor as prc","chipset.idChipset","=","prc.idChipset")
            ->join("velicina_ekrana as ve","t.idVelicinaEkrana","=","ve.idVelicinaEkrana")
            ->join("na_dodir as nad","t.idNaDodir","=","nad.idNaDodir")
            ->join("vrsta_ekrana as vrstae","t.idVrstaEkrana","=","vrstae.idVrstaEkrana")
            ->join("rezolucija as rez","t.idRezolucija","=","rez.idRezolucija")
            ->join("baterija_tip as battip","t.idBaterijaTip","=","battip.idBaterijaTip")
            ->join("baterija_kapacitet as batkap","t.idBaterijaKapacitet","=","batkap.idBaterijaKapacitet")
            ->join("ram","t.idRam","=","ram.idRam")
            ->join("interna","t.idInterna","=","interna.idInterna")
            ->join("eksterna","t.idEksterna","=","eksterna.idEksterna")
            ->join("wifi","t.idWifi","=","wifi.idWifi")
            ->join("bluetooth as blu","t.idBluetooth","=","blu.idBluetooth")
            ->join("usb","t.idUsb","=","usb.idUsb")
            ->join("nfc","t.idNfc","=","nfc.idNfc")
            ->join("gps","t.idGps","=","gps.idGps")
            ->join("tezina","t.idTezina","=","tezina.idTezina");
        //SELECT
        $query = $query->select("t.idTelefon","t.naziv","t.coverSlika","os.nazivOs","osv.nazivOsVerzija","chipset.nazivChipset","prc.nazivProcesor","ve.vrednostVelicina","nad.nazivNaDodir","vrstae.nazivEkrana","rez.nazivRezolucija","battip.nazivBaterija", "batkap.kapacitet", "ram.memorija as ram", "interna.memorija as interna", "eksterna.memorija as eksterna", "wifi.nazivWifi", "blu.nazivBluetooth","usb.nazivUsb","nfc.nazivNfc","gps.nazivGps", "tezina.vrednost");
        //WHERE
        $query = $query->where("t.idTelefon","=",$id)->first();

        return $query;
    }
    public function getFrontCameraSpecification($id){
        $query = DB::table("prednja_specifikacija as ps")
            ->join("kamera","ps.idKamera","=","kamera.idKamera")
            ->join("hdr","ps.idHdr","=","hdr.idHdr")
            ->join("detekcija_osmeha as ds","ps.idDetekcijaOsmeha","=","ds.idDetekcijaOsmeha")
            ->join("video_zapis as video","ps.idVideoZapis","=","video.idVideoZapis")
            ->join("blic","ps.idBlic","=","blic.idBlic")
            ->join("autofokus as focus","ps.idAutofokus","=","focus.idAutofokus");
        $query = $query->select("kamera.brojPiksela","hdr.nazivHdr","ds.nazivOsmeh","video.nazivVideo","blic.nazivBlic","focus.nazivAutofokus");
        $query = $query->where("ps.idTelefon","=",$id)->first();
        return $query;
    }

    public function getBackCameraSpecification($id){
        $query = DB::table("zadnja_specifikacija as zs")
            ->join("kamera","zs.idKamera","=","kamera.idKamera")
            ->join("hdr","zs.idHdr","=","hdr.idHdr")
            ->join("detekcija_osmeha as ds","zs.idDetekcijaOsmeha","=","ds.idDetekcijaOsmeha")
            ->join("video_zapis as video","zs.idVideoZapis","=","video.idVideoZapis")
            ->join("blic","zs.idBlic","=","blic.idBlic")
            ->join("autofokus as focus","zs.idAutofokus","=","focus.idAutofokus");
        $query = $query->select("kamera.brojPiksela","hdr.nazivHdr","ds.nazivOsmeh","video.nazivVideo","blic.nazivBlic","focus.nazivAutofokus");
        $query = $query->where("zs.idTelefon","=",$id)->first();
        return $query;
    }
}
