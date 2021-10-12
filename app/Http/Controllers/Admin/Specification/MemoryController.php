<?php

namespace App\Http\Controllers\Admin\Specification;

use App\Http\Controllers\admin\SpecificationController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MemoryController extends SpecificationController
{

    public function index()
    {
        return view("pages.admin.specification.memory.memory",$this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("pages.admin.specification.memory.create-memory",$this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $memory = $request->input("memoryName");
        try{
            $this->specificationModel->insertMemory($memory);
            return redirect()->route("specification")->with("success","Memorija je uspešno dodata.");
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
        $memoryForEdit = $this->specificationModel->findMemory($id);
        if(!$memoryForEdit){
            return redirect()->route("memory.index");
        }
        $this->data["editMemory"] = $memoryForEdit;
        return view("pages.admin.specification.memory.edit-memory",$this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $memory = $request->input("memoryName");
        try{
            $this->specificationModel->updateMemory($memory,$id);
            return redirect()->route("memory.edit",["memory"=>$id])->with("success","Memorija je uspešno izmenjena.");
        }catch (\Exception $ex){
            return redirect()->route("memory.edit",["memory"=>$id])->with("error",$ex->getMessage());
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
            $this->specificationModel->deleteMemory($id);
            return redirect()->route("memory.index")->with("success","Memorija je uspešno obrisana");
        }catch (\Exception $ex){
            return redirect()->route("memory.index")->with("error","Memorija se ne može obrisati jer postoje uređaji koji ga koriste");
        }
    }
}
