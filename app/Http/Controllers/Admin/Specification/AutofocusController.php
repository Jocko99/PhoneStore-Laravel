<?php

namespace App\Http\Controllers\Admin\Specification;

use App\Http\Controllers\admin\SpecificationController;
use App\Http\Controllers\Controller;
use App\Http\Requests\AutofocusRequest;
use Illuminate\Http\Request;

class AutofocusController extends SpecificationController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("pages.admin.specification.autofocus.autofocus",$this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("pages.admin.specification.autofocus.create-autofocus",$this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AutofocusRequest $request)
    {
        $autofocusName = $request->input("autofocusName");
        try{
            $this->specificationModel->insertAutofocus($autofocusName);
            return redirect()->route("specification")->with("success","Autofokus je uspešno dodat.");
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
        $autofocusToEdit = $this->specificationModel->findAutofocus($id);
        if(!$autofocusToEdit){
            return redirect()->route("autofocus.index");
        }
        $this->data["editAutofocus"] = $autofocusToEdit;
        return view("pages.admin.specification.autofocus.edit-autofocus",$this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AutofocusRequest $request, $id)
    {
        $autofocusName = $request->input("autofocusName");
        try{
            $this->specificationModel->updateAutofocus($autofocusName,$id);
            return redirect()->route("autofocus.edit",["autofocu"=>$id])->with("success","Autofokus je uspešno izmenjen.");
        }catch (\Exception $ex){
            return redirect()->route("autofocus.edit",["autofocu"=>$id])->with("error",$ex->getMessage());
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
            $this->specificationModel->deleteAutofocus($id);
            return redirect()->route("blic.index")->with("success","Autofokus je uspešno obrisan");
        }catch (\Exception $ex){
            return redirect()->route("blic.index")->with("error","Autofokus se ne može obrisati jer postoje uređaji koji ga koriste");
        }
    }
}
