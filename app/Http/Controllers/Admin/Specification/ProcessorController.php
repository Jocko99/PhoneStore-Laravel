<?php

namespace App\Http\Controllers\Admin\Specification;

use App\Http\Controllers\admin\SpecificationController;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProcessorRequest;
use Illuminate\Http\Request;

class ProcessorController extends SpecificationController
{
    public function __construct()
    {
        parent::__construct();
        $this->data["allChipset"] = $this->specificationModel->getAllChipset();
    }

    public function index()
    {
        return view("pages.admin.specification.procesor.processor",$this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("pages.admin.specification.procesor.create-processor",$this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProcessorRequest $request)
    {
        $processorName = $request->input("processorName");
        $chipset = $request->input("chipset");
        try{
            $this->specificationModel->insertProcessor($processorName,$chipset);
            return redirect()->route("specification")->with("success","Procesor je uspešno dodat.");
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
        $processorToEdit = $this->specificationModel->findProcessor($id);
        if(!$processorToEdit){
            return redirect()->route("processor.index");
        }
        $this->data["editProcessor"] = $processorToEdit;
        return view("pages.admin.specification.procesor.edit-processor",$this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProcessorRequest $request, $id)
    {
        $processorName = $request->input("processorName");
        $chipset = $request->input("chipset");
        try{
            $this->specificationModel->updateProcessor($chipset,$processorName,$id);
            return redirect()->route("processor.edit",["processor"=>$id])->with("success","Procesor je uspešno izmenjen.");
        }catch (\Exception $ex){
            return redirect()->route("processor.edit",["processor"=>$id])->with("error",$ex->getMessage());
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
            $this->specificationModel->deleteProcessor($id);
            return redirect()->route("processor.index")->with("success","Procesor je uspešno obrisan");
        }catch (\Exception $ex){
            return redirect()->route("chipset.index")->with("error","Procesor se ne može obrisati jer postoje uređaji koji ga koriste");
        }
    }
}
