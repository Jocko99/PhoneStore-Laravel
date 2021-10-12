<?php


namespace App\Models\User;


use Illuminate\Support\Facades\DB;

class Home
{
    public function homeMobiles(){
        $query = DB::table("telefon as t")
            ->join("cenovnik as c","t.idTelefon","=","c.idTelefon")
            ->select("t.idTelefon","t.naziv","t.coverSlika","c.cena")->limit(4)->get();
        return $query;
    }
    public function findMobiles($mobile){
        $query = DB::table("telefon as t")
            ->join("velicina_ekrana as ve","t.idVelicinaEkrana","=","ve.idVelicinaEkrana")
            ->join("ram as r","t.idRam","=","r.idRam")
            ->join("interna as i","t.idInterna","=","i.idInterna")
            ->join("zadnja_specifikacija as zs","t.idTelefon","=","zs.idTelefon")
            ->join("baterija_kapacitet as bk","t.idBaterijaKapacitet","=","bk.idBaterijaKapacitet")
            ->join("cenovnik as c","t.idTelefon","=","c.idTelefon")
            ->join("kamera as kam","zs.idKamera","=","kam.idKamera");

        if($mobile){
            $query = $query->where("t.naziv","like","%".$mobile."%");
        }

        return $query->select("t.idTelefon","t.naziv","t.coverSlika","c.cena","ve.vrednostVelicina","bk.kapacitet","kam.brojPiksela","r.memorija as ram","i.memorija as interna")->get();
    }
}
