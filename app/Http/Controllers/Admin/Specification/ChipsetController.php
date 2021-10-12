<?php

namespace App\Http\Controllers\Admin\Specification;

use App\Http\Controllers\admin\SpecificationController;
use App\Http\Controllers\Controller;
use App\Http\Requests\ChipsetRequest;
use Illuminate\Http\Request;

class ChipsetController extends SpecificationController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->data["allChipset"] = $this->specificationModel->getAllChipset();
        return view("pages.admin.specification.chipset.chipset",$this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("pages.admin.specification.chipset.create-chipset",$this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ChipsetRequest $request)
    {
        $chipsetName = $request->input("chipsetName");
        try{
            $this->specificationModel->insertChipset($chipsetName);
            return redirect()->route("specification")->with("success","Chipset je uspešno dodat.");
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
        $chipsetToEdit = $this->specificationModel->findChipset($id);
        if(!$chipsetToEdit){
            return redirect()->route("chipset.index");
        }
        $this->data["editChipset"] = $chipsetToEdit;
        return view("pages.admin.specification.chipset.edit-chipset",$this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ChipsetRequest $request, $id)
    {
        $chipsetName = $request->input("chipsetName");
        try{
            $this->specificationModel->updateChipset($chipsetName,$id);
            return redirect()->route("chipset.edit",["chipset"=>$id])->with("success","Chipset je uspešno izmenjen.");
        }catch (\Exception $ex){
            return redirect()->route("chipset.edit",["chipset"=>$id])->with("error",$ex->getMessage());
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
            $this->specificationModel->deleteChipset($id);
            return redirect()->route("chipset.index")->with("success","Chipset je uspešno obrisan");
        }catch (\Exception $ex){
            return redirect()->route("chipset.index")->with("error","Chipset se ne može obrisati jer postoje uređaji koji ga koriste");
        }
    }
}
