<?php


namespace App\Models\User;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserModel
{
    public function getAllUsers(Request $request){
        $query = DB::table("korisnik")
            ->join("mesto","korisnik.idMesta","=","mesto.idMesta")
            ->join("uloga","korisnik.idUloga","=","uloga.idUloga");

        if($request->has("user")){
            $user = $request->input("user");
            $query = $query->where("korisnik.ime","like","%".$user."%")
                ->orWhere("korisnik.prezime","like","%".$user."%");

        }

        return $query->get();

    }
    public function findUser($id){
        return DB::table("korisnik")
            ->join("mesto","korisnik.idMesta","=","mesto.idMesta")
            ->join("uloga","korisnik.idUloga","=","uloga.idUloga")
            ->where("korisnik.idKorisnik","=",$id)->get();
    }

    public function updateUser(Request $request){
        $ime = $request->input("json.ime");
        $prezime = $request->input("json.prezime");
        $email = $request->input("json.email");
        $lozinka = $request->input("json.lozinka");
        $pass = md5($lozinka);
        $brTelefon = $request->input("json.brTelefon");
        $mesto = $request->input("json.mesto");
        $uloga = $request->input("uloga");
        $id = $request->input("id");
        DB::table("korisnik")
            ->where("idKorisnik","=",$id)
            ->update(["ime"=>$ime,"prezime"=>$prezime,"email"=>$email,"lozinka"=>$pass,"brojTelefona"=>$brTelefon,"idMesta"=>$mesto,"idUloga"=>$uloga]);
    }

    public function deleteUser($id){
        DB::table("korisnik")->where("idKorisnik","=",$id)->delete();
    }
}
