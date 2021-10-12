<?php

namespace App\Http\Controllers\Admin\Specification;

use App\Http\Controllers\admin\SpecificationController;
use App\Http\Controllers\Controller;
use App\Http\Requests\DisplaySizeRequest;
use Illuminate\Http\Request;

class DisplaySizeController extends SpecificationController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("pages.admin.specification.display-size.display-size",$this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("pages.admin.specification.display-size.create-display-size",$this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DisplaySizeRequest $request)
    {
        $displaySize = $request->input("displaySizeName");
        try{
            $this->specificationModel->insertDisplaySize($displaySize);
            return redirect()->route("specification")->with("success","Veličina ekrana je uspešno dodata.");
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
        $displaySizeForEdit = $this->specificationModel->findDisplaySize($id);
        if(!$displaySizeForEdit){
            return redirect()->route("display-size.index");
        }
        $this->data["editDisplaySize"] = $displaySizeForEdit;
        return view("pages.admin.specification.display-size.edit-display-size",$this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(DisplaySizeRequest $request, $id)
    {
        $displaySize = $request->input("displaySizeName");
        try{
            $this->specificationModel->updateDisplaySize($displaySize,$id);
            return redirect()->route("display-size.edit",["display_size"=>$id])->with("success","Veličina ekrana je uspešno izmenjena.");
        }catch (\Exception $ex){
            return redirect()->route("display-size.edit",["display_size"=>$id])->with("error",$ex->getMessage());
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
            $this->specificationModel->deleteDisplaySize($id);
            return redirect()->route("display-size.index")->with("success","Veličina ekrana je uspešno obrisana");
        }catch (\Exception $ex){
            return redirect()->route("display-size.index")->with("error","Veličina ekrana se ne može obrisati jer postoje uređaji koji ga koriste");
        }
    }
}
