<?php

namespace App\Models\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Mobile
{
    public function createWeight(){
        for($i=100;$i<=200;$i++){
            DB::table("tezina")->insert(["idTezina" => NULL,"vrednost"=>$i]);
        }
    }



    //***************************INSERT MOBILE*************************************

    public function insertMobile($mobile){
        if($mobile["mobileCardSlot"]=="0"){
            $mobile["mobileCardSlot"]=NULL;
        }
        DB::table("telefon")->
        insert([
            "idTelefon"=>NULL,
            "naziv"=>$mobile["mobileName"],
            "coverSlika"=>$mobile["coverSlika"],
            "idMarka"=>$mobile["mobileBrand"],
            "idOs"=>$mobile["mobileOs"],
            "idChipset"=>$mobile["mobileChipset"],
            "idVelicinaEkrana"=>$mobile["mobileDisplaySize"],
            "idNaDodir"=>$mobile["mobileTouch"],
            "idRezolucija"=>$mobile["mobileDisplayResolution"],
            "idVrstaEkrana"=>$mobile["mobileDisplayType"],
            "idBaterijaTip"=>$mobile["mobileBattery"],
            "idBaterijaKapacitet"=>$mobile["mobileBatteryCapacity"],
            "idRam"=>$mobile["mobileRam"],
            "idInterna"=>$mobile["mobileInternal"],
            "idEksterna"=>$mobile["mobileCardSlot"],
            "idWifi"=>$mobile["mobileWifi"],
            "idBluetooth"=>$mobile["mobileBluetooth"],
            "idUsb"=>$mobile["mobileUsb"],
            "idNfc"=>$mobile["mobileNfc"],
            "idGps"=>$mobile["mobileGps"],
            "idTezina"=>$mobile["mobileWeight"]
        ]);
    }
    public function insertPrice($price){
        $lastMobileId = DB::table("telefon")->max("idTelefon");
        DB::table("cenovnik")->insert([
            "idTelefon"=>$lastMobileId,
            "cena"=>$price["mobilePrice"],
            "datum"=>date("Y-m-d")
        ]);
    }
    public function insertBackCameraSpecification($camera){
        $lastMobileId = DB::table("telefon")->max("idTelefon");
        DB::table("zadnja_specifikacija")
            ->insert([
            "idKamera"=>$camera["mobileMainCamera"],
            "idTelefon"=>$lastMobileId,
            "idHdr"=>$camera["mobileBackCameraHdr"],
            "idDetekcijaOsmeha"=>$camera["mobileBackCameraDetectionSmile"],
            "idVideoZapis"=>$camera["mobileBackCameraVideo"],
            "idBlic"=>$camera["mobileBackCameraBlic"],
            "idAutofokus"=>$camera["mobileBackCameraAutoFocus"]
        ]);
    }
    public function insertFrontCameraSpecification($camera){
        $lastMobileId = DB::table("telefon")->max("idTelefon");
        DB::table("prednja_specifikacija")
            ->insert([
                "idKamera"=>$camera["mobileFrontCamera"],
                "idTelefon"=>$lastMobileId,
                "idHdr"=>$camera["mobileFrontCameraHdr"],
                "idDetekcijaOsmeha"=>$camera["mobileFrontCameraDetectionSmile"],
                "idVideoZapis"=>$camera["mobileFrontCameraVideo"],
                "idBlic"=>$camera["mobileFrontCameraBlic"],
                "idAutofokus"=>$camera["mobileFrontCameraAutoFocus"]
            ]);
    }

    //******************************END_INSERT******************************



    //****************************UPDATE***************************

    public function updateMobile($mobile,$id){

        if($mobile["mobileCardSlot"]=="0"){
            $mobile["mobileCardSlot"]=NULL;
        }
        if(!isset($mobile["coverSlika"])){
            $mobile["coverSlika"] = $mobile["currentImage"];
        }
            DB::table("telefon")
            ->where("idTelefon",$id)
            ->update([
                "naziv"=>$mobile["mobileName"],
                "coverSlika"=>$mobile["coverSlika"],
                "idMarka"=>$mobile["mobileBrand"],
                "idOs"=>$mobile["mobileOs"],
                "idChipset"=>$mobile["mobileChipset"],
                "idVelicinaEkrana"=>$mobile["mobileDisplaySize"],
                "idNaDodir"=>$mobile["mobileTouch"],
                "idRezolucija"=>$mobile["mobileDisplayResolution"],
                "idVrstaEkrana"=>$mobile["mobileDisplayType"],
                "idBaterijaTip"=>$mobile["mobileBattery"],
                "idBaterijaKapacitet"=>$mobile["mobileBatteryCapacity"],
                "idRam"=>$mobile["mobileRam"],
                "idInterna"=>$mobile["mobileInternal"],
                "idEksterna"=>$mobile["mobileCardSlot"],
                "idWifi"=>$mobile["mobileWifi"],
                "idBluetooth"=>$mobile["mobileBluetooth"],
                "idUsb"=>$mobile["mobileUsb"],
                "idNfc"=>$mobile["mobileNfc"],
                "idGps"=>$mobile["mobileGps"],
                "idTezina"=>$mobile["mobileWeight"]
            ]);

    }
    public function updatePrice($price,$id){
        DB::table("cenovnik")->where("idTelefon","=",$id)
        ->update([
            "cena"=>$price["mobilePrice"],
            "datum"=>date("Y-m-d")
        ]);
    }
    public function updateBackCameraSpecification($camera,$id){
        DB::table("zadnja_specifikacija")->where("idTelefon","=",$id)
            ->update([
                "idKamera"=>$camera["mobileMainCamera"],
                "idHdr"=>$camera["mobileBackCameraHdr"],
                "idDetekcijaOsmeha"=>$camera["mobileBackCameraDetectionSmile"],
                "idVideoZapis"=>$camera["mobileBackCameraVideo"],
                "idBlic"=>$camera["mobileBackCameraBlic"],
                "idAutofokus"=>$camera["mobileBackCameraAutoFocus"]
            ]);
    }

    public function updateFrontCameraSpecification($camera,$id){
        DB::table("prednja_specifikacija")->where("idTelefon","=",$id)
            ->update([
                "idKamera"=>$camera["mobileMainCamera"],
                "idHdr"=>$camera["mobileBackCameraHdr"],
                "idDetekcijaOsmeha"=>$camera["mobileBackCameraDetectionSmile"],
                "idVideoZapis"=>$camera["mobileBackCameraVideo"],
                "idBlic"=>$camera["mobileBackCameraBlic"],
                "idAutofokus"=>$camera["mobileBackCameraAutoFocus"]
            ]);
    }

    //*****************************END_UPDATE*************************************

    public function getMobiles(Request $request){
       $query = DB::table("telefon")
                ->join("marka","telefon.idMarka","=","marka.idMarka")
                ->join("ram","telefon.idRam","=","ram.idRam")
                ->join("cenovnik","telefon.idTelefon","=","cenovnik.idTelefon");



       if($request->has("mobileSearchAdmin")){
           $query = $query->where("telefon.naziv","like","%".$request->get("mobileSearchAdmin")."%")
               ->orWhere("marka.nazivMarka", "like","%".$request->get("mobileSearchAdmin")."%")
               ->orWhere("cenovnik.cena", "like","%".$request->get("mobileSearchAdmin")."%");
       }

        $query = $query->select("telefon.idTelefon","telefon.naziv","telefon.coverSlika as slika","marka.nazivMarka as marka","ram.memorija","cenovnik.cena");


        return $query->paginate(2);

    }

    public function find($id){
        return DB::table("telefon as t")
            ->join("prednja_specifikacija as ps","t.idTelefon","=","ps.idTelefon")
            ->join("zadnja_specifikacija as zs","t.idTelefon","=","zs.idTelefon")
            ->join("cenovnik as c","t.idTelefon","=","c.idTelefon")
            ->select("t.*","ps.idKamera as idKameraPrednja","ps.idHdr as idHdrPrednja","ps.idDetekcijaOsmeha as idDetekcijaOsmehaPrednja", "ps.idVideoZapis as idVideoZapisPrednja", "ps.idBlic as idBlicPrednja", "ps.idAutofokus as idAutofokusPrednja","zs.idKamera as idKameraZadnja","zs.idHdr as idHdrZadnja","zs.idDetekcijaOsmeha as idDetekcijaOsmehaZadnja","zs.idVideoZapis as idVideoZapisZadnja", "zs.idBlic as idBlicZadnja","zs.idAutofokus as idAutofokusZadnja","c.cena")
            ->where("t.idTelefon","=",$id)->first();
    }

    public function deleteMobile($id){
        DB::table("prednja_specifikacija")->where("idTelefon","=",$id)->delete();
        DB::table("zadnja_specifikacija")->where("idTelefon","=",$id)->delete();
        $cenovnik = DB::table("cenovnik")->where("idTelefon","=",$id)->first();
        DB::table("porudzbina")->where("idCenovnik","=",$cenovnik->idCenovnik)->delete();
        DB::table("cenovnik")->where("idTelefon","=",$id)->delete();
        DB::table("telefon")->where("idTelefon","=",$id)->delete();
    }
}
