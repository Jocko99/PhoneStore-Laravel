<?php

namespace App\Http\Controllers\Admin\Specification;

use App\Http\Controllers\admin\SpecificationController;
use App\Http\Controllers\Controller;
use App\Http\Requests\BatteryTypeRequest;
use Illuminate\Http\Request;

class BatteryTypeController extends SpecificationController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("pages.admin.specification.battery-type.battery-type",$this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("pages.admin.specification.battery-type.create-battery-type",$this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BatteryTypeRequest $request)
    {
        $batteryTypeName = $request->input("batteryTypeName");
        try{
            $this->specificationModel->insertBatteryType($batteryTypeName);
            return redirect()->route("specification")->with("success","Tip baterije je uspešno dodat.");
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
        $batteryTypeToEdit = $this->specificationModel->findBatteryType($id);
        if(!$batteryTypeToEdit){
            return redirect()->route("battery-type.index");
        }
        $this->data["editBatteryType"] = $batteryTypeToEdit;
        return view("pages.admin.specification.battery-type.edit-battery-type",$this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BatteryTypeRequest $request, $id)
    {
        $battery = $request->input("batteryTypeName");
        try{
            $this->specificationModel->updateBatteryType($battery,$id);
            return redirect()->route("battery-type.edit",["battery_type"=>$id])->with("success","Tip baterije je uspešno izmenjen.");
        }catch (\Exception $ex){
            return redirect()->route("battery-capacity.edit",["battery_type"=>$id])->with("error",$ex->getMessage());
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
            $this->specificationModel->deleteBatteryType($id);
            return redirect()->route("battery-type.index")->with("success","Tip baterije je uspešno obrisan");
        }catch (\Exception $ex){
            return redirect()->route("battery-type.index")->with("error","Tip baterije se ne može obrisati jer postoje uređaji koji ga koriste");
        }
    }
}
