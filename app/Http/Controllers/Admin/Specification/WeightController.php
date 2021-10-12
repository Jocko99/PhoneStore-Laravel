<?php

namespace App\Http\Controllers\Admin\Specification;

use App\Http\Controllers\admin\SpecificationController;
use App\Http\Controllers\Controller;
use App\Http\Requests\WeightRequest;
use Illuminate\Http\Request;

class WeightController extends SpecificationController
{
    public function __construct()
    {
        parent::__construct();
        $this->data["getAllWeight"] = $this->specificationModel->getAllWeight();
    }

    public function index()
    {
        return view("pages.admin.specification.weight.weight",$this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("pages.admin.specification.weight.create-weight",$this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(WeightRequest $request)
    {
        $weightName = $request->input("weightName");
        try{
            $this->specificationModel->insertWeight($weightName);
            return redirect()->route("specification")->with("success","Težina je uspešno dodata.");
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
        $weightToEdit = $this->specificationModel->findWeight($id);
        if(!$weightToEdit){
            return redirect()->route("weight.index");
        }
        $this->data["editWeight"] = $weightToEdit;
        return view("pages.admin.specification.weight.edit-weight",$this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(WeightRequest $request, $id)
    {
        $weightName = $request->input("weightName");
        try{
            $this->specificationModel->updateWeight($weightName,$id);
            return redirect()->route("weight.edit",["weight"=>$id])->with("success","Težina je uspešno izmenjena.");
        }catch (\Exception $ex){
            return redirect()->route("weight.edit",["weight"=>$id])->with("error",$ex->getMessage());
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
            $this->specificationModel->deleteWeight($id);
            return redirect()->route("weight.index")->with("success","Težina je uspešno obrisana");
        }catch (\Exception $ex){
            return redirect()->route("weight.index")->with("error","Težina se ne može obrisati jer postoje uređaji koji je koriste");
        }
    }
}
