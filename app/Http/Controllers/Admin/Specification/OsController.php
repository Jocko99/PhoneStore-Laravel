<?php

namespace App\Http\Controllers\Admin\Specification;

use App\Http\Controllers\admin\SpecificationController;
use App\Http\Controllers\Controller;
use App\Http\Requests\OsRequest;
use Illuminate\Http\Request;

class OsController extends SpecificationController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data["getAllOs"] = $this->specificationModel->getAllOs();
        return view("pages.admin.specification.os.os",$this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("pages.admin.specification.os.create-os",$this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OsRequest $request)
    {
        $osName = $request->input("osName");
        try{
            $this->specificationModel->insertOs($osName);
            return redirect()->route("specification")->with("success","OS je uspešno dodat.");
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
        $osToEdit = $this->specificationModel->findOs($id);
        if(!$osToEdit){
            return redirect()->route("os.index");
        }
        $this->data["editOs"] = $osToEdit;
        return view("pages.admin.specification.os.edit-os",$this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(OsRequest $request, $id)
    {
        $osName = $request->input("osName");
        try{
            $this->specificationModel->updateOs($osName,$id);
            return redirect()->route("os.edit",["o"=>$id])->with("success","OS je uspešno izmenjen.");
        }catch (\Exception $ex){
            return redirect()->route("os.edit",["o"=>$id])->with("error",$ex->getMessage());
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
            $this->specificationModel->deleteOs($id);
            return redirect()->route("os.index")->with("success","OS je uspešno obrisan");
        }catch (\Exception $ex){
            return redirect()->route("os.index")->with("error","OS se ne može obrisati jer postoje uređaji koji ga koriste");
        }
    }
}
