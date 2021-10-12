<?php

namespace App\Http\Controllers\Admin\Specification;

use App\Http\Controllers\admin\SpecificationController;
use App\Http\Controllers\Controller;
use App\Http\Requests\BlicRequest;
use Illuminate\Http\Request;

class BlicController extends SpecificationController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("pages.admin.specification.blic.blic",$this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("pages.admin.specification.blic.create-blic",$this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BlicRequest $request)
    {
        $blicName = $request->input("blicName");
        try{
            $this->specificationModel->insertBlic($blicName);
            return redirect()->route("specification")->with("success","Blic je uspešno dodat.");
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
        $blicToEdit = $this->specificationModel->findBlic($id);
        if(!$blicToEdit){
            return redirect()->route("blic.index");
        }
        $this->data["editBlic"] = $blicToEdit;
        return view("pages.admin.specification.blic.edit-blic",$this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BlicRequest $request, $id)
    {
        $blicName = $request->input("blicName");
        try{
            $this->specificationModel->updateBlic($blicName,$id);
            return redirect()->route("blic.edit",["blic"=>$id])->with("success","Blic je uspešno izmenjen.");
        }catch (\Exception $ex){
            return redirect()->route("blic.edit",["blic"=>$id])->with("error",$ex->getMessage());
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
            $this->specificationModel->deleteBlic($id);
            return redirect()->route("blic.index")->with("success","Blic je uspešno obrisan");
        }catch (\Exception $ex){
            return redirect()->route("blic.index")->with("error","Blic se ne može obrisati jer postoje uređaji koji ga koriste");
        }
    }
}
