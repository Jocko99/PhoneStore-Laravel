<?php


namespace App\Http\Controllers\Users;


use App\Http\Requests\UserLoginRequest;
use App\Http\Requests\UserRegistrationRequest;
use App\Models\Admin\Report;
use App\Models\User\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class UserController extends FrontendController
{
    protected $modelUser;
    protected $reportModel;
    public function __construct()
    {
        parent::__construct();
        $this->modelUser = new User();
        $this->reportModel = new Report();
    }
    public function showUser(){
        $this->data['orders'] = $this->modelUser->getOrderForUser();
        return view("pages.user.user",$this->data);
    }
    public function changePassword(Request $request){
        $trenutna = $request->input("trenutna");
        $nova = $request->input("nova");
        if(session()->get("user")->lozinka == md5($trenutna)){
            $this->modelUser->updatePassword(session()->get("user")->idKorisnik,$nova);
            return response()->json([]);
        }

    }
    public function changeNumber(Request $request){
        $number = $request->input("telefon");
        if(session()->has("user")){
            $this->modelUser->updateMobile(session()->get("user")->idKorisnik,$number);
            $updateSession = $this->modelUser->findUser(session()->get("user")->email);
            $this->createSession($request,$updateSession);
            return response()->json(["broj"=>$updateSession->brojTelefona]);
        }
    }
    public function changeEmail(Request $request){
        $mail = $request->input("email");
        if(session()->has("user")){
            $this->modelUser->updateEmail(session()->get("user")->idKorisnik,$mail);
            $updateSession = $this->modelUser->findUser(session()->get("user")->email);
            return response()->json([]);
        }
    }
    private function createSession($request,$user){
        $user->isAdmin = $user->nazivUloga == "admin";
        $request->session()->put("user",$user);
        return $user->isAdmin;
    }
    public function registration(UserRegistrationRequest $request){
        //$ime=$request->input("ime");
        //$email = $request->input("email");
        //$aktivacionKod=sha1(md5($ime));
        //mail($email, "Registracija", "Potvrdite registraciju: https://www.phonestore/activate/user?code=".$aktivacionKod);
        //$request->session()->put("code",$aktivacionKod);
        $user = $this->modelUser->registration($request);
        return response()->json($user);
    }
    public function login(UserLoginRequest $request){
        $email = $request->input("email");
        $password = $request->input("lozinka");
        try{
            $user = $this->modelUser->login($email,$password);
            if($user){
//                $user->isAdmin = $user->nazivUloga == "admin";
//                $request->session()->put("user",$user);
                $user = $this->createSession($request,$user);
                $this->reportModel->insertLoginReport($request);
                if($user){
                    return redirect()->route("admin");
                }else{
                    return redirect()->route("mobiles");
                }
            }else{
                $request->session()->put("greska","Email nije u dobrom formatu.");
                return redirect()->route("home");
            }
        }catch (\Exception $ex){
            $request->session()->put("greska","Email ili lozinka nisu dobro uneti.");
            return redirect()->route("home");
        }
    }

    public function logout(Request $request) {
        $this->reportModel->insertLogoutReport($request);
        $request->session()->remove("user");
        return redirect()->route("home");
    }
//    public function confirm(Request $request){
//        $code = $request->session()->get("code");
//        try{
//            $user = $this->modelUser->activation($code);
//            redirect()->route("home");
//        }catch (\Exception $ex){
//            Log::error($ex->getMessage());
//        }
//    }
}
