<?php


namespace App\Models\User;


use Illuminate\Support\Facades\DB;

class ShoppingCart
{

    public function findMobileForCart($id){
        return DB::table("telefon as t")
            ->join("velicina_ekrana as ve","t.idVelicinaEkrana","=","ve.idVelicinaEkrana")
            ->join("ram as r","t.idRam","=","r.idRam")
            ->join("interna as i","t.idInterna","=","i.idInterna")
            ->join("zadnja_specifikacija as zs","t.idTelefon","=","zs.idTelefon")
            ->join("baterija_kapacitet as bk","t.idBaterijaKapacitet","=","bk.idBaterijaKapacitet")
            ->join("cenovnik as c","t.idTelefon","=","c.idTelefon")
            ->join("kamera as kam","zs.idKamera","=","kam.idKamera")
            ->select("t.idTelefon","t.naziv","t.coverSlika","c.cena","ve.vrednostVelicina","bk.kapacitet","kam.brojPiksela","r.memorija as ram","i.memorija as interna","c.idCenovnik")
            ->where("t.idTelefon","=",$id)->first();
    }

    public function insertKorpa(){
        $user = session()->get("user");
        DB::table("korpa")->insert(["idKorisnik"=>$user->idKorisnik]);
    }
    public function insertPorudzbina(){
        $mobile = session()->get("cartItems");
        $lastId = DB::table("korpa")->max("idKorpa");
        foreach ($mobile as $m){
            DB::table("porudzbina")->insert(["idKorpa"=>$lastId,"idCenovnik"=>$m->mobile->idCenovnik,"kolicina"=>$m->quantity]);
        }

    }
}
