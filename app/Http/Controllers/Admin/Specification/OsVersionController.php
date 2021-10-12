<?php

namespace App\Http\Controllers\Admin\Specification;

use App\Http\Controllers\admin\SpecificationController;
use App\Http\Controllers\Controller;
use App\Http\Requests\OsVersionRequest;
use Illuminate\Http\Request;

class OsVersionController extends SpecificationController
{
    public function __construct()
    {
        parent::__construct();
        $this->data["getAllOs"] = $this->specificationModel->getAllOs();
    }

    public function index()
    {
        return view("pages.admin.specification.os-version.os-version",$this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("pages.admin.specification.os-version.create-os-version",$this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OsVersionRequest $request)
    {
        $osVersionName = $request->input("osVersionName");
        $idOs = $request->input("os");
        try{
            $this->specificationModel->insertOsVersion($osVersionName,$idOs);
            return redirect()->route("specification")->with("success","OS verzija je uspešno dodata.");
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
        $osVersionToEdit = $this->specificationModel->findOsVersion($id);
        if(!$osVersionToEdit){
            return redirect()->route("os-version.index");
        }
        $this->data["editOsVersion"] = $osVersionToEdit;
        return view("pages.admin.specification.os-version.edit-os-version",$this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(OsVersionRequest $request, $id)
    {
        $osVersionName = $request->input("osVersionName");
        $idOs = $request->input("osName");
        try{
            $this->specificationModel->updateOsVersion($osVersionName,$idOs,$id);
            return redirect()->route("os-version.edit",["os_version"=>$id])->with("success","OS verzija je uspešno izmenjena.");
        }catch (\Exception $ex){
            return redirect()->route("os.edit",["os_version"=>$id])->with("error",$ex->getMessage());
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
            $this->specificationModel->deleteOsVersion($id);
            return redirect()->route("os-version.index")->with("success","OS verizja je uspešno obrisan");
        }catch (\Exception $ex){
            return redirect()->route("os-version.index")->with("error","OS verzija se ne može obrisati jer postoje uređaji koji ga koriste");
        }
    }
}
