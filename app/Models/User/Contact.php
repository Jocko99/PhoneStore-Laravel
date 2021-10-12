<?php


namespace App\Models\User;


use App\Http\Requests\ContactRequest;
use Illuminate\Support\Facades\DB;

class Contact
{
    public function sendMessage(ContactRequest $request){
        DB::table("kontakt")->insert(["ime"=>$request->input("ime"),"prezime"=>$request->input("prezime"),"email"=>$request->input("email"),"poruka"=>$request->input("poruka")]);
    }
    public function getMessages(){
        return DB::table("kontakt")->orderBy("datumKontakt","DESC")->get();
    }
    public function findMessage($id){
        return DB::table("kontakt")->where("idKontakt","=",$id)->first();
    }
    public function deleteMessage($id){
        DB::table("kontakt")->where("idKontakt","=",$id)->delete();
    }
}
