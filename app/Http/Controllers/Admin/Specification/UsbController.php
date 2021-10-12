<?php

namespace App\Http\Controllers\Admin\Specification;

use App\Http\Controllers\admin\SpecificationController;
use App\Http\Controllers\Controller;
use App\Http\Requests\UsbRequest;
use Illuminate\Http\Request;

class UsbController extends SpecificationController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("pages.admin.specification.usb.usb",$this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("pages.admin.specification.usb.create-usb",$this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UsbRequest $request)
    {
        $usbName = $request->input("usbName");
        try{
            $this->specificationModel->insertUsb($usbName);
            return redirect()->route("specification")->with("success","Usb je uspešno dodat.");
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

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $usbToEdit = $this->specificationModel->findUsb($id);
        if(!$usbToEdit){
            return redirect()->route("usb.index");
        }
        $this->data["editUsb"] = $usbToEdit;
        return view("pages.admin.specification.usb.edit-usb",$this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UsbRequest $request, $id)
    {
        $usbName = $request->input("usbName");
        try{
            $this->specificationModel->updateUsb($usbName,$id);
            return redirect()->route("usb.edit",["usb"=>$id])->with("success","Usb je uspešno izmenjen.");
        }catch (\Exception $ex){
            return redirect()->route("usb.edit",["usb"=>$id])->with("error",$ex->getMessage());
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
            $this->specificationModel->deleteUsb($id);
            return redirect()->route("usb.index")->with("success","Usb je uspešno obrisan");
        }catch (\Exception $ex){
            return redirect()->route("usb.index")->with("error","Usb se ne može obrisati jer postoje uređaji koji je koriste");
        }
    }
}
