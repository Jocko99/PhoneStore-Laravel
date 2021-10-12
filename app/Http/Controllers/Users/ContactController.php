<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\BaseController;
use App\Http\Requests\ContactRequest;
use App\Models\User\Contact;
use Illuminate\Http\Request;

class ContactController extends BaseController
{
    private $contactModel;
    public function __construct()
    {
        parent::__construct();
        $this->contactModel = new Contact();
    }

    public function index(){
        return view("pages.user.contact",$this->data);
    }
    public function message(ContactRequest $request){
         try{
             $this->contactModel->sendMessage($request);
             //mail("nikola.jockovic.23.18@ict.edu.rs, "PhoneStore-Poruke", "Dobili ste novu poruku,pogledajte admin panel.");
             return response()->json([]);
         }catch (\Exception $ex){
          return response()->json(["message"=>"Pokusajte ponovo"]);
         }
    }
    public function showMessages(){
        return view("pages.admin.messages.message",$this->data);
    }
    public function getMessages(){
        $poruke = $this->contactModel->getMessages();
        return response()->json($poruke);
    }
    public function findMessage(Request $request){
        $id = $request->input("id");
        $poruka = $this->contactModel->findMessage($id);
        return response()->json($poruka);
    }
    public function deleteMessage(Request $request){
        $id = $request->input("id");
        try{
            $this->contactModel->deleteMessage($id);
            return response()->json([]);
        }catch (\Exception $ex){

        }
    }
}
