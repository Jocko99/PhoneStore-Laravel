<?php

namespace App\Http\Controllers\Admin\Specification;

use App\Http\Controllers\admin\SpecificationController;
use App\Http\Controllers\Controller;
use App\Http\Requests\DisplayResolutionRequest;
use Illuminate\Http\Request;

class DisplayResolutionController extends SpecificationController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("pages.admin.specification.display-resolution.display-resolution",$this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("pages.admin.specification.display-resolution.create-display-resolution",$this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DisplayResolutionRequest $request)
    {
        $displayResolution = $request->input("displayResolutionName");
        try{
            $this->specificationModel->insertDisplayResolution($displayResolution);
            return redirect()->route("specification")->with("success","Rezolucija ekrana je uspešno dodata.");
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
        $displayResolutionForEdit = $this->specificationModel->findDisplayResolution($id);
        if(!$displayResolutionForEdit){
            return redirect()->route("display-resolution.index");
        }
        $this->data["editDisplayResolution"] = $displayResolutionForEdit;
        return view("pages.admin.specification.display-resolution.edit-display-resolution",$this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(DisplayResolutionRequest $request, $id)
    {
        $displayResolution = $request->input("displayResolutionName");
        try{
            $this->specificationModel->updateDisplayResolution($displayResolution,$id);
            return redirect()->route("display-resolution.edit",["display_resolution"=>$id])->with("success","Rezolucija ekrana je uspešno izmenjena.");
        }catch (\Exception $ex){
            return redirect()->route("display-resolution.edit",["display_resolution"=>$id])->with("error",$ex->getMessage());
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
            $this->specificationModel->deleteDisplayResolution($id);
            return redirect()->route("display-resolution.index")->with("success","Rezolucija ekrana je uspešno obrisana");
        }catch (\Exception $ex){
            return redirect()->route("display-resolution.index")->with("error","Rezolucija ekrana se ne može obrisati jer postoje uređaji koji ga koriste");
        }
    }
}
