<?php


namespace App\Models\Admin;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Order
{
    public function getAllOrders(){
        $query = DB::table("korpa")
            ->join("porudzbina","korpa.idKorpa","=","porudzbina.idKorpa")
            ->join("korisnik","korpa.idKorisnik","=","korisnik.idKorisnik")
            ->join("cenovnik","porudzbina.idCenovnik","=","cenovnik.idCenovnik")
            ->join("telefon","cenovnik.idTelefon","=","telefon.idTelefon")
        ->select("korisnik.ime","korisnik.prezime","korisnik.brojTelefona","korisnik.email","telefon.naziv","telefon.coverSlika","cenovnik.cena","korpa.datum");
        return $query->paginate(5);
    }

}
