<?php

namespace App\Http\Controllers\Admin\Specification;

use App\Http\Controllers\admin\SpecificationController;
use App\Http\Controllers\Controller;
use App\Http\Requests\CameraRequest;
use Illuminate\Http\Request;

class CameraController extends SpecificationController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("pages.admin.specification.camera.camera",$this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("pages.admin.specification.camera.create-camera",$this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CameraRequest $request)
    {
        $px = $request->input("cameraName");
        try{
            $this->specificationModel->insertCamera($px);
            return redirect()->route("specification")->with("success","Jačina kamere je uspešno dodata.");
        }catch (\Exception $ex){
            return redirect()->route("specification")->with("error",$ex->getMessage());
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
        $pxForEdit = $this->specificationModel->findCamera($id);
        if(!$pxForEdit){
            return redirect()->route("camera.index");
        }
        $this->data["editCamera"] = $pxForEdit;
        return view("pages.admin.specification.camera.edit-camera",$this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CameraRequest $request, $id)
    {
        $px = $request->input("cameraName");
        try{
            $this->specificationModel->updateCamera($px,$id);
            return redirect()->route("camera.edit",["camera"=>$id])->with("success","Broj piksela je uspešno izmenjen.");
        }catch (\Exception $ex){
            return redirect()->route("camera.edit",["camera"=>$id])->with("error",$ex->getMessage());
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
            $this->specificationModel->deleteCamera($id);
            return redirect()->route("camera.index")->with("success","Broj piksela je uspešno obrisan");
        }catch (\Exception $ex){
            return redirect()->route("camera.index")->with("error","Broj piksela se ne može obrisati jer postoje uređaji koji ga koriste");
        }
    }
}
