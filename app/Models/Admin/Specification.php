<?php


namespace App\Models\Admin;


use Illuminate\Support\Facades\DB;

class Specification
{
    public function getMarkName(){
        return DB::table("marka")->orderBy("nazivMarka")->get();
    }
    public function getOs(){
        return DB::table("os")->join("os_verzija","os.idOs","=","os_verzija.idOs")->orderBy("os_verzija.nazivOsVerzija")->get();
    }
    public function getAllOs(){
        return DB::table("os")->get();
    }
    public function getChipSet(){
        return DB::table("chipset")->join("procesor","chipset.idChipset","=","procesor.idChipset")->get();
    }
    public function getAllChipset(){
        return DB::table("chipset")->get();
    }
    public function getCameraPx(){
        return DB::table("kamera")->orderBy("brojPiksela")->get();
    }
    public function getHdr(){
        return DB::table("hdr")->get();
    }
    public function getSmileDetection(){
        return DB::table("detekcija_osmeha")->get();
    }
    public function getVideo(){
        return DB::table("video_zapis")->get();
    }
    public function getBlic(){
        return DB::table("blic")->get();
    }
    public function getAutoFocus(){
        return DB::table("autofokus")->get();
    }
    public function getDisplaySize(){
        return DB::table("velicina_ekrana")->get();
    }
    public function getOnTouch(){
        return DB::table("na_dodir")->get();
    }
    public function getDisplayType(){
        return DB::table("vrsta_ekrana")->get();
    }
    public function getResolution(){
        return DB::table("rezolucija")->orderBy("nazivRezolucija","DESC")->get();
    }
    public function getBattery(){
        return DB::table("baterija_tip")->get();
    }
    public function getBatteryCapacity(){
        return DB::table("baterija_kapacitet")->get();
    }
    public function getRam(){
        return DB::table("ram")->get();
    }
    public function getInter(){
        return DB::table("interna")->get();
    }
    public function getExternal(){
        return DB::table("eksterna")->get();
    }
    public function getWifi(){
        return DB::table("wifi")->get();
    }
    public function getBluetooth(){
        return DB::table("bluetooth")->get();
    }
    public function getUsb(){
        return DB::table("usb")->get();
    }
    public function getNfc(){
        return DB::table("nfc")->get();
    }
    public function getGps(){
        return DB::table("gps")->get();
    }
    public function getWeight(){
        return DB::table("tezina")->get();
    }

    /*************MARK*****************/
    public function findMark($id){
        return DB::table("marka")->where("idMarka","=",$id)->first();
    }
    public function updateMark($mark,$id){
        DB::table("marka")->where("idMarka","=",$id)->update(["nazivMarka"=>$mark]);
    }
    public function insertMark($mark){
        DB::table("marka")->insert(["nazivMarka"=>$mark]);
    }
    public function deleteMark($id){
        DB::table("marka")->where("idMarka","=",$id)->delete();
    }

    /***************Chipset*******************/
    public function findChipset($id){
        return DB::table("chipset")->where("idChipset","=",$id)->first();
    }
    public function updateChipset($chipset,$id){
        DB::table("chipset")->where("idChipset","=",$id)->update(["nazivChipset"=>$chipset]);
    }
    public function insertChipset($chipset){
        DB::table("chipset")->insert(["nazivChipset"=>$chipset]);
    }
    public function deleteChipset($id){
        DB::table("chipset")->where("idChipset","=",$id)->delete();
    }

    /**************Processor******************/
    public function findProcessor($id){
        return DB::table("chipset")->join("procesor","chipset.idChipset","=","procesor.idChipset")->where("procesor.idProcesor","=",$id)->first();
    }
    public function updateProcessor($chipset,$processor,$id){
        DB::table("procesor")->where("idProcesor","=",$id)->update(["idChipset"=>$chipset,"nazivProcesor"=>$processor]);
    }
    public function insertProcessor($processor,$chipset){
        DB::table("procesor")->insert(["idChipset"=>$chipset,"nazivProcesor"=>$processor]);
    }
    public function deleteProcessor($id){
        DB::table("procesor")->where("idProcesor","=",$id)->delete();
    }

    /***********************OS***********************/
    public function findOs($id){
        return DB::table("os")->where("idOs","=",$id)->first();
    }
    public function updateOs($osName,$id){
        DB::table("os")->where("idOs","=",$id)->update(["nazivOs"=>$osName]);
    }
    public function insertOs($os){
        DB::table("os")->insert(["nazivOs"=>$os]);
    }
    public function deleteOs($id){
        DB::table("os")->where("idOs","=",$id)->delete();
    }

    /******************OS-VERSION*********************/
    public function findOsVersion($id){
    return DB::table("os_verzija")->join("os","os_verzija.idOs","=","os.idOs")->where("os_verzija.idOsVerzija","=",$id)->first();
    }
    public function updateOsVersion($osVersionName,$idOs,$id){
        DB::table("os_verzija")->where("idOsVerzija","=",$id)->update(["idOs"=>$idOs,"nazivOsVerzija"=>$osVersionName]);
    }
    public function insertOsVersion($osVersionName,$idOs){
        DB::table("os_verzija")->insert(["idOs"=>$idOs,"nazivOsVerzija"=>$osVersionName]);
    }
    public function deleteOsVersion($id){
        DB::table("os_verzija")->where("idOsVerzija","=",$id)->delete();
    }

    /***********************Camera*******************/
    public function findCamera($id){
        return DB::table("kamera")->where("idKamera","=",$id)->first();
    }
    public function updateCamera($px,$id){
        DB::table("kamera")->where("idKamera","=",$id)->update(["brojPiksela"=>$px]);
    }
    public function insertCamera($px){
        DB::table("kamera")->insert(["brojPiksela"=>$px]);
    }
    public function deleteCamera($id){
        DB::table("kamera")->where("idKamera","=",$id)->delete();
    }

    /***********************HDR*******************/
    public function findHdr($id){
        return DB::table("hdr")->where("idHdr","=",$id)->first();
    }
    public function updateHdr($hdr,$id){
        DB::table("hdr")->where("idHdr","=",$id)->update(["nazivHdr"=>$hdr]);
    }
    public function insertHdr($hdrName){
        DB::table("hdr")->insert(["nazivHdr"=>$hdrName]);
    }
    public function deleteHdr($id){
        DB::table("hdr")->where("idHdr","=",$id)->delete();
    }

    /*********************SMILE_DETECION*****************/
    public function findSmileDetection($id){
        return DB::table("detekcija_osmeha")->where("idDetekcijaOsmeha","=",$id)->first();
    }
    public function insertSmileDetecion($smileDetectionName){
        DB::table("detekcija_osmeha")->insert(["nazivOsmeh"=>$smileDetectionName]);
    }
    public function updateSmileDetection($smileName,$id){
        DB::table("detekcija_osmeha")->where("idDetekcijaOsmeha","=",$id)->update(["nazivOsmeh"=>$smileName]);
    }
    public function deleteSmileDetection($id){
        DB::table("detekcija_osmeha")->where("idDetekcijaOsmeha","=",$id)->delete();
    }

    /**************************VIDEO**********************************/
    public function findVideo($id){
        return DB::table("video_zapis")->where("idVideoZapis","=",$id)->first();
    }
    public function updateVideo($videoName,$id){
        DB::table("video_zapis")->where("idVideoZapis","=",$id)->update(["nazivVideo"=>$videoName]);
    }
    public function insertVideo($videoName){
        $lastId = DB::table("video_zapis")->max("idVideoZapis");
        DB::table("video_zapis")->insert(["idVideoZapis"=>$lastId+1,"nazivVideo"=>$videoName]);
    }
    public function deleteVideo($id){
        DB::table("video_zapis")->where("idVideoZapis","=",$id)->delete();
    }
    /************************BLIC**********************************/
    public function findBlic($id){
        return DB::table("blic")->where("idBlic","=",$id)->first();
    }
    public function updateBlic($blicName,$id){
        DB::table("blic")->where("idBlic","=",$id)->update(["nazivBlic"=>$blicName]);
    }
    public function insertBlic($blicName){
        DB::table("blic")->insert(["nazivBlic"=>$blicName]);
    }
    public function deleteBlic($id){
        DB::table("blic")->where("idBlic","=",$id)->delete();
    }

    /************************Autofocus**********************************/
    public function findAutofocus($id){
        return DB::table("autofokus")->where("idAutofokus","=",$id)->first();
    }
    public function updateAutofocus($autofocusName,$id){
        DB::table("autofokus")->where("idAutofokus","=",$id)->update(["nazivAutofokus"=>$autofocusName]);
    }
    public function insertAutofocus($autofocusName){
        DB::table("autofokus")->insert(["nazivAutofokus"=>$autofocusName]);
    }
    public function deleteAutofocus($id){
        DB::table("autofokus")->where("idAutofokus","=",$id)->delete();
    }

    /************************BatteryCapacity**********************************/
    public function findBatteryCapacity($id){
        return DB::table("baterija_kapacitet")->where("idBaterijaKapacitet","=",$id)->first();
    }
    public function updateBatteryCapacity($kapacitet,$id){
        DB::table("baterija_kapacitet")->where("idBaterijaKapacitet","=",$id)->update(["kapacitet"=>$kapacitet]);
    }
    public function insertBatteryCapacity($kapacitet){
        DB::table("baterija_kapacitet")->insert(["kapacitet"=>$kapacitet]);
    }
    public function deleteBatteryCapacity($id){
        DB::table("baterija_kapacitet")->where("idBaterijaKapacitet","=",$id)->delete();
    }

    /************************DisplaySize**********************************/
    public function findDisplaySize($id){
        return DB::table("velicina_ekrana")->where("idVelicinaEkrana","=",$id)->first();
    }
    public function updateDisplaySize($size,$id){
        DB::table("velicina_ekrana")->where("idVelicinaEkrana","=",$id)->update(["vrednostVelicina"=>$size]);
    }
    public function insertDisplaySize($size){
        DB::table("velicina_ekrana")->insert(["vrednostVelicina"=>$size]);
    }
    public function deleteDisplaySize($id){
        DB::table("velicina_ekrana")->where("idVelicinaEkrana","=",$id)->delete();
    }

    /************************DisplayOnTouch**********************************/
    public function findDisplayOnTouch($id){
        return DB::table("na_dodir")->where("idNaDodir","=",$id)->first();
    }
    public function updateDisplayOnTouch($touch,$id){
        DB::table("na_dodir")->where("idNaDodir","=",$id)->update(["nazivNaDodir"=>$touch]);
    }
    public function insertDisplayOnTouch($touch){
        DB::table("na_dodir")->insert(["nazivNaDodir"=>$touch]);
    }
    public function deleteDisplayOnTouch($id){
        DB::table("na_dodir")->where("idNaDodir","=",$id)->delete();
    }

    /************************DisplayResolution**********************************/
    public function findDisplayResolution($id){
        return DB::table("rezolucija")->where("idRezolucija","=",$id)->first();
    }
    public function updateDisplayResolution($resolution,$id){
        DB::table("rezolucija")->where("idRezolucija","=",$id)->update(["nazivRezolucija"=>$resolution]);
    }
    public function insertDisplayResolution($resolution){
        DB::table("rezolucija")->insert(["nazivRezolucija"=>$resolution]);
    }
    public function deleteDisplayResolution($id){
        DB::table("rezolucija")->where("idRezolucija","=",$id)->delete();
    }

    /************************Memory**********************************/
//    public function findMemory($id){
//        return DB::table("memorija")->where("idMemorija","=",$id)->first();
//    }
//    public function updateMemory($memory,$id){
//        DB::table("memorija")->where("idMemorija","=",$id)->update(["memorija"=>$memory]);
//    }
//    public function insertMemory($memory){
//        DB::table("memorija")->insert(["memorija"=>$memory]);
//    }
//    public function deleteMemory($id){
//        DB::table("memorija")->where("idMemorija","=",$id)->delete();
//    }

    /************************Ram_Memory**********************************/
    public function allRam(){
        return DB::table("ram")->get();
    }
    public function findRam($id){
        return DB::table("ram")->where("idRam","=",$id)->first();
    }
//    public function updateRam($memory,$id){
//        DB::table("ram")->where("idRam","=",$id)->update(["idMemorija"=>$memory]);
//    }
    public function insertRam($memory){
        DB::table("ram")->insert(["memorija"=>$memory]);
    }
    public function deleteRam($id){
        DB::table("ram")->where("idRam","=",$id)->delete();
    }

    /************************Internal_Memory**********************************/
    public function insertInternal($memory){
        DB::table("interna")->insert(["memorija"=>$memory]);
    }
    public function deleteInternal($id){
        DB::table("interna")->where("idInterna","=",$id)->delete();
    }

    /************************External_Memory**********************************/
    public function insertExternal($memory){
        DB::table("eksterna")->insert(["memorija"=>$memory]);
    }
    public function deleteExternal($id){
        DB::table("eksterna")->where("idEksterna","=",$id)->delete();
    }

    /****************************WIFI**************************************/
    public function findWifi($id){
        return DB::table("wifi")->where("idWifi","=",$id)->first();
    }
    public function updateWifi($wifi,$id){
        DB::table("wifi")->where("idWifi","=",$id)->update(["nazivWifi"=>$wifi]);
    }
    public function insertWifi($wifi){
        DB::table("wifi")->insert(["nazivWifi"=>$wifi]);
    }
    public function deleteWifi($id){
        DB::table("wifi")->where("idWifi","=",$id)->delete();
    }
    /****************************Bluetooth**************************************/
    public function findBluetooth($id){
        return DB::table("bluetooth")->where("idBluetooth","=",$id)->first();
    }
    public function updateBluetooth($bluetooth,$id){
        DB::table("bluetooth")->where("idBluetooth","=",$id)->update(["nazivBluetooth"=>$bluetooth]);
    }
    public function insertBluetooth($bluetooth){
        DB::table("bluetooth")->insert(["nazivBluetooth"=>$bluetooth]);
    }
    public function deleteBluetooth($id){
        DB::table("bluetooth")->where("idBluetooth","=",$id)->delete();
    }

    /****************************Usb**************************************/
    public function findUsb($id){
        return DB::table("usb")->where("idUsb","=",$id)->first();
    }
    public function updateUsb($usb,$id){
        DB::table("usb")->where("idUsb","=",$id)->update(["nazivUsb"=>$usb]);
    }
    public function insertUsb($usb){
        DB::table("usb")->insert(["nazivUsb"=>$usb]);
    }
    public function deleteUsb($id){
        DB::table("usb")->where("idUsb","=",$id)->delete();
    }

    /****************************Nfc**************************************/
    public function findNfc($id){
        return DB::table("nfc")->where("idNfc","=",$id)->first();
    }
    public function updateNfc($nfc,$id){
        DB::table("nfc")->where("idNfc","=",$id)->update(["nazivNfc"=>$nfc]);
    }
    public function insertNfc($nfc){
        DB::table("nfc")->insert(["nazivNfc"=>$nfc]);
    }
    public function deleteNfc($id){
        DB::table("nfc")->where("idNfc","=",$id)->delete();
    }

    /****************************GPS**************************************/
    public function findGps($id){
        return DB::table("gps")->where("idGps","=",$id)->first();
    }
    public function updateGps($gps,$id){
        DB::table("gps")->where("idGps","=",$id)->update(["nazivGps"=>$gps]);
    }
    public function insertGps($gps){
        DB::table("gps")->insert(["nazivGps"=>$gps]);
    }
    public function deleteGps($id){
        DB::table("gps")->where("idGps","=",$id)->delete();
    }

    /****************************Weight**************************************/
    public function getAllWeight(){
        return DB::table("tezina")->paginate(15);
    }
    public function findWeight($id){
        return DB::table("tezina")->where("idTezina","=",$id)->first();
    }
    public function updateWeight($weight,$id){
        DB::table("tezina")->where("idTezina","=",$id)->update(["vrednost"=>$weight]);
    }
    public function insertWeight($weight){
        DB::table("tezina")->insert(["vrednost"=>$weight]);
    }
    public function deleteWeight($id){
        DB::table("tezina")->where("idTezina","=",$id)->delete();
    }
}
