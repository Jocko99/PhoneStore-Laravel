<?php

namespace App\Http\Controllers\Admin\Specification;

use App\Http\Controllers\admin\SpecificationController;
use App\Http\Controllers\Controller;
use App\Http\Requests\BatteryCapacityRequest;
use Illuminate\Http\Request;

class BatteryCapacityController extends SpecificationController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("pages.admin.specification.battery-capacity.battery-capacity",$this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("pages.admin.specification.battery-capacity.create-battery-capacity",$this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BatteryCapacityRequest $request)
    {
        $battery = $request->input("batteryCapacityName");
        try{
            $this->specificationModel->insertBatteryCapacity($battery);
            return redirect()->route("specification")->with("success","Kapacitet baterije je uspešno dodat.");
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
        $batteryCapacityToEdit = $this->specificationModel->findBatteryCapacity($id);
        if(!$batteryCapacityToEdit){
            return redirect()->route("battery-capacity.index");
        }
        $this->data["editBatteryCapacity"] = $batteryCapacityToEdit;
        return view("pages.admin.specification.battery-capacity.edit-battery-capacity",$this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BatteryCapacityRequest $request, $id)
    {
        $battery = $request->input("batteryCapacityName");
        try{
            $this->specificationModel->updateBatteryCapacity($battery,$id);
            return redirect()->route("battery-capacity.edit",["battery_capacity"=>$id])->with("success","Kapacitet baterije je uspešno izmenjen.");
        }catch (\Exception $ex){
            return redirect()->route("battery-capacity.edit",["battery_capacity"=>$id])->with("error",$ex->getMessage());
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
            $this->specificationModel->deleteBatteryCapacity($id);
            return redirect()->route("battery-capacity.index")->with("success","Kapacitete baterije je uspešno obrisan");
        }catch (\Exception $ex){
            return redirect()->route("battery-capacity.index")->with("error","Kapacitete baterije se ne može obrisati jer postoje uređaji koji ga koriste");
        }
    }
}
