<?php

namespace App\Http\Controllers\Admin\Specification;

use App\Http\Controllers\admin\SpecificationController;
use App\Http\Controllers\Controller;
use App\Http\Requests\WifiRequest;
use Illuminate\Http\Request;

class WifiController extends SpecificationController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("pages.admin.specification.wifi.wifi",$this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("pages.admin.specification.wifi.create-wifi",$this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(WifiRequest $request)
    {
        $wifiName = $request->input("wifiName");
        try{
            $this->specificationModel->insertWifi($wifiName);
            return redirect()->route("specification")->with("success","Wifi je uspešno dodat.");
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
        $wifiToEdit = $this->specificationModel->findWifi($id);
        if(!$wifiToEdit){
            return redirect()->route("wifi.index");
        }
        $this->data["editWifi"] = $wifiToEdit;
        return view("pages.admin.specification.wifi.edit-wifi",$this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(WifiRequest $request, $id)
    {
        $wifiName = $request->input("wifiName");
        try{
            $this->specificationModel->updateWifi($wifiName,$id);
            return redirect()->route("wifi.edit",["wifi"=>$id])->with("success","Wifi je uspešno izmenjen.");
        }catch (\Exception $ex){
            return redirect()->route("wifi.edit",["wifi"=>$id])->with("error",$ex->getMessage());
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
            $this->specificationModel->deleteWifi($id);
            return redirect()->route("wifi.index")->with("success","Wifi je uspešno obrisan");
        }catch (\Exception $ex){
            return redirect()->route("wifi.index")->with("error","Wifi se ne može obrisati jer postoje uređaji koji je koriste");
        }
    }
}
