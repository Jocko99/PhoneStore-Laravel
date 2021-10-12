<?php

namespace App\Http\Controllers\Users;

use Illuminate\Http\Request;

class CompareController extends FrontendController
{

    public function index(){
        return view("pages.user.compare",$this->data);
    }
    public function getMobile(Request $request){
        $findMobile = $this->mobileModel->findMobile($request);
        return response()->json($findMobile);
    }
    public function getMobileSpecification(Request $request){
        $id = $request->input("id");
        $mobile = $this->mobileModel->getMobileSpecification($id);
        $frontCamera = $this->mobileModel->getFrontCameraSpecification($id);
        $backCamera = $this->mobileModel->getBackCameraSpecification($id);
        return response()->json(["mobile"=>$mobile,"frontCamera"=>$frontCamera,"backCamera"=>$backCamera]);
    }
}
