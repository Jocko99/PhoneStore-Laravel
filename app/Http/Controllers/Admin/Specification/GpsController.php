<?php

namespace App\Http\Controllers\Admin\Specification;

use App\Http\Controllers\admin\SpecificationController;
use App\Http\Controllers\Controller;
use App\Http\Requests\GpsRequest;
use Illuminate\Http\Request;

class GpsController extends SpecificationController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("pages.admin.specification.gps.gps",$this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("pages.admin.specification.gps.create-gps",$this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GpsRequest $request)
    {
        $gpsName = $request->input("gpsName");
        try{
            $this->specificationModel->insertGps($gpsName);
            return redirect()->route("specification")->with("success","Gps je uspešno dodat.");
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
        $gpsToEdit = $this->specificationModel->findGps($id);
        if(!$gpsToEdit){
            return redirect()->route("gps.index");
        }
        $this->data["editGps"] = $gpsToEdit;
        return view("pages.admin.specification.gps.edit-gps",$this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(GpsRequest $request, $id)
    {
        $gpsName = $request->input("gpsName");
        try{
            $this->specificationModel->updateGps($gpsName,$id);
            return redirect()->route("gps.edit",["gp"=>$id])->with("success","Gps je uspešno izmenjen.");
        }catch (\Exception $ex){
            return redirect()->route("gps.edit",["gp"=>$id])->with("error",$ex->getMessage());
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
            $this->specificationModel->deleteGps($id);
            return redirect()->route("gps.index")->with("success","Gps je uspešno obrisan");
        }catch (\Exception $ex){
            return redirect()->route("gps.index")->with("error","Gps se ne može obrisati jer postoje uređaji koji je koriste");
        }
    }
}
