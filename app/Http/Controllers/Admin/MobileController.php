<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use App\Models\Admin\Mobile;
use Illuminate\Http\Request;
use App\Http\Requests\MobileRequest;
use Illuminate\Support\Facades\Log;

class MobileController extends SpecificationController
{
    protected $mobileModel;
    public function __construct()
    {
        parent::__construct();
        $this->mobileModel = new Mobile();
    }

    public function index(Request $request)
    {
        $this->data["items"] = $this->mobileModel->getMobiles($request);
        return view("pages.admin.mobile.index",$this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("pages.admin.mobile.create-mobile",$this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


    public function store(MobileRequest $request)
    {
        $mobilesSpecification = $request->all();
        try{
            $mobilesSpecification["coverSlika"] = $this->storeImage($request,"coverSlika");
            $this->mobileModel->insertMobile($mobilesSpecification);
            $this->mobileModel->insertPrice($mobilesSpecification);
            $this->mobileModel->insertBackCameraSpecification($mobilesSpecification);
            $this->mobileModel->insertFrontCameraSpecification($mobilesSpecification);

            return redirect()->route("mobiles.index")->with("success","Uređaj je uspešno dodat");
        }
        catch (\Exception $e){
            Log::error($e->getMessage());
            return response()->redirectToRoute("home");
            //return response()->redirectToRoute("mobiles.index");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $mobileToEdit = $this->mobileModel->find($id);
//        if(!$mobileToEdit){
//            return redirect()->route("mobiles");
//        }
        $this->data["mobile"] = $mobileToEdit;
        return view("pages.admin.mobile.update-mobile",$this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         $specificationForUpdate = $request->all();

        try {
            if($request->has("coverSlika")){
                $specificationForUpdate["coverSlika"] = $this->storeImage($request,"coverSlika");
            }
            $this->mobileModel->updateMobile($specificationForUpdate,$id);
            $this->mobileModel->updatePrice($specificationForUpdate,$id);
            $this->mobileModel->updateBackCameraSpecification($specificationForUpdate,$id);
            $this->mobileModel->updateFrontCameraSpecification($specificationForUpdate,$id);
            return redirect()->route("mobiles.edit",["mobile"=>$id])->with("success","Uređaj je uspešno sačuvan");
        }catch (\Exception $e){
            return redirect()->route("mobiles.edit",["mobile"=>$id])->with("error",$e->getMessage());
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            $this->mobileModel->deleteMobile($id);
            return redirect()->route("mobiles.index")->with("success","Uređaj je uspešno obrisan");
        }catch (\Exception $ex){
            return redirect()->route("mobiles.index")->with("error",$ex->getMessage());
        }
    }

    //private methods
    private function storeImage(Request $request,$photo){
        $image = $request->file("$photo");
        $fileName = time() . "." . $image->extension();
        $image->storeAs("public/mobiles",$fileName);
        return $fileName;
    }

}
