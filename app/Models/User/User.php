<?php


namespace App\Models\User;


use App\Http\Requests\UserLoginRequest;
use App\Http\Requests\UserRegistrationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class User
{
    public function registration(UserRegistrationRequest $request){
        $ime=$request->input("ime");
        $prezime=$request->input("prezime");
        $email=$request->input("email");
        $lozinka=$request->input("lozinka");
        $brojTelefona=$request->input("brTelefon");
        $idMesto=$request->input("mesto");
        $idUloga=2;
        $status=1; //Po defaultu treba biti 0,pa se korisniku salje mail sa aktivacionim kodom. Nakon toga korisnik kada klikne na aktivacioni kod,status se menja na 1
        $aktivacionKod=sha1(md5($ime));
        DB::table("korisnik")
            ->insert(["ime"=>$ime,"prezime"=>$prezime,"email"=>$email,"lozinka"=>md5($lozinka),"brojTelefona"=>$brojTelefona,"idMesta"=>$idMesto,"idUloga"=>$idUloga,"status"=>$status,"aktivacioniKod"=>$aktivacionKod]);
    }
    public function findUser($email){
        return DB::table("korisnik")
            ->join("uloga","korisnik.idUloga","=","uloga.idUloga")
            ->join("mesto","korisnik.idMesta","=","mesto.idMesta")
            ->where("email","=",$email)
            ->first();
    }

    public function login($email,$password){
        return DB::table("korisnik")
            ->join("uloga","korisnik.idUloga","=","uloga.idUloga")
            ->join("mesto","korisnik.idMesta","=","mesto.idMesta")
            ->where("email","=",$email)
            ->where("lozinka","=",md5($password))
            ->first();
    }

    public function getOrderForUser(){
        return DB::table("korpa")
            ->join("porudzbina","korpa.idKorpa","=","porudzbina.idKorpa")
            ->join("cenovnik","porudzbina.idCenovnik","=","cenovnik.idCenovnik")
            ->join("telefon","cenovnik.idTelefon","=","telefon.idTelefon")
            ->where("korpa.idKorisnik","=",session()->get("user")->idKorisnik)
            ->select("telefon.naziv","telefon.coverSlika","cenovnik.cena","korpa.datum")->get();
    }

    public function updatePassword($id,$password){
        DB::table("korisnik")->where("idKorisnik","=",$id)
            ->update(["lozinka"=>md5($password)]);
    }
    public function updateMobile($id,$mobile){
        DB::table("korisnik")->where("idKorisnik","=",$id)
            ->update(["brojTelefona"=>$mobile]);
    }
    public function updateEmail($id,$email){
        DB::table("korisnik")->where("idKorisnik","=",$id)
            ->update(["email"=>$email]);
    }
//    public function activation($code){
//        DB::table("korisnik")->where("aktivacioniKod","=",$code)->update(["status"=>1]);
//    }
}
