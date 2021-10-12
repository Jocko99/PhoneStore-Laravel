<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\BaseController;
use App\Models\User\Home;
use Illuminate\Http\Request;

class HomeController extends BaseController
{
    protected $homeModel;
    public function __construct()
    {
        parent::__construct();
        $this->homeModel = new Home();
    }

    public function index(){
        $this->data["slider"] = $this->homeModel->homeMobiles();
        //dd($this->data["slider"]);
        return view("pages.user.home",$this->data);
    }
    public function findMobile(Request $request){
        $name = $request->input("naziv");
        $mobile = $this->homeModel->findMobiles($name);
        return response()->json($mobile);
    }
}
