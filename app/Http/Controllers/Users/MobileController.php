<?php

namespace App\Http\Controllers\Users;
use App\Http\Controllers\BaseController;
use App\Models\User\Mobile;
use Illuminate\Http\Request;

class MobileController extends FrontendController
{

    public function index(Request $request){
        $this->data["mark"] = $this->mobileModel->getMark();
        $this->data["mobile"] = $this->mobileModel->getMobiles($request);
        return view("pages.user.mobiles",$this->data);
    }
    public function getMobiles(Request $request){
        $mobile = $this->mobileModel->getMobiles($request);
        return response()->json($mobile);
    }
    public function showMobile($mobile){
        $this->data["mobileInfo"] = $this->mobileModel->getMobileSpecification($mobile);
        $this->data["frontInfo"] = $this->mobileModel->getFrontCameraSpecification($mobile);
        $this->data["backInfo"] = $this->mobileModel->getBackCameraSpecification($mobile);
        return view("pages.user.mobile",$this->data);
    }
}
