<?php

namespace App\Http\Controllers\Admin\Specification;

use App\Http\Controllers\admin\SpecificationController;
use App\Http\Controllers\Controller;
use App\Http\Requests\BluetoothRequest;
use Illuminate\Http\Request;

class BluetoothController extends SpecificationController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("pages.admin.specification.bluetooth.bluetooth",$this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("pages.admin.specification.bluetooth.create-bluetooth",$this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BluetoothRequest $request)
    {
        $bluetoothName = $request->input("bluetoothName");
        try{
            $this->specificationModel->insertBluetooth($bluetoothName);
            return redirect()->route("specification")->with("success","Bluetooth je uspešno dodat.");
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
        $bluetoothToEdit = $this->specificationModel->findBluetooth($id);
        if(!$bluetoothToEdit){
            return redirect()->route("bluetooth.index");
        }
        $this->data["editBluetooth"] = $bluetoothToEdit;
        return view("pages.admin.specification.bluetooth.edit-bluetooth",$this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BluetoothRequest $request, $id)
    {
        $bluetoothName = $request->input("bluetoothName");
        try{
            $this->specificationModel->updateBluetooth($bluetoothName,$id);
            return redirect()->route("bluetooth.edit",["bluetooth"=>$id])->with("success","Bluetooth je uspešno izmenjen.");
        }catch (\Exception $ex){
            return redirect()->route("bluetooth.edit",["bluetooth"=>$id])->with("error",$ex->getMessage());
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
            $this->specificationModel->deleteBluetooth($id);
            return redirect()->route("bluetooth.index")->with("success","Bluetooth je uspešno obrisan");
        }catch (\Exception $ex){
            return redirect()->route("bluetooth.index")->with("error","Bluetooth se ne može obrisati jer postoje uređaji koji je koriste");
        }
    }
}
