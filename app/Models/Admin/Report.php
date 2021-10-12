<?php


namespace App\Models\Admin;




use App\Http\Requests\UserLoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Report
{
    public function getAllReports(Request $request){
        $query = DB::table("izvestaji")
            ->join("korisnik","izvestaji.idKorisnik","=","korisnik.idKorisnik");

        if($request->input("datumOd") != ""){
            $query = $query->where("datumAktivnosti",">=",$request->input("datumOd"));
        }
        if($request->input("datumDo") != ""){
            $datumDo = $request->input("datumDo");
            $do = date('Y-m-d',strtotime($datumDo. ' +1 day'));
            //dd($do);
            $query = $query->where("datumAktivnosti","<=",$do);
        }

        return $query->paginate(5);
    }
    public function insertLoginReport(UserLoginRequest $request){
        $ip = $request->ip();
        $id = session()->get("user")->idKorisnik;
        $ime = session()->get("user")->ime;
        $prezime = session()->get("user")->prezime;
        $email = session()->get("user")->email;
        $aktivnost = "Korisnik ".$ime." ".$prezime.",".$email." , se prijavio sa ".$ip;
        DB::table("izvestaji")->insert(["idKorisnik"=>$id,"aktivnost"=>$aktivnost]);
    }
    public function insertLogoutReport(Request $request){
        $ip = $request->ip();
        $id = session()->get("user")->idKorisnik;
        $ime = session()->get("user")->ime;
        $prezime = session()->get("user")->prezime;
        $email = session()->get("user")->email;
        $aktivnost = "Korisnik ".$ime." ".$prezime.",".$email." , se odjavio sa ".$ip;
        DB::table("izvestaji")->insert(["idKorisnik"=>$id,"aktivnost"=>$aktivnost]);
    }
}
