<?php

namespace App\Http\Controllers\Admin\Specification;

use App\Http\Controllers\admin\SpecificationController;
use App\Http\Controllers\Controller;
use App\Http\Requests\SmileDetectionRequest;
use Illuminate\Http\Request;

class SmileDetectionController extends SpecificationController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("pages.admin.specification.smile-detection.smile-detection",$this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("pages.admin.specification.smile-detection.create-smile-detection",$this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SmileDetectionRequest $request)
    {
        $smileDetectionName = $request->input("smileDetectionName");
        try{
            $this->specificationModel->insertSmileDetecion($smileDetectionName);
            return redirect()->route("specification")->with("success","Detekcija osmeha je uspešno dodata.");
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
        $smileDetectionToEdit = $this->specificationModel->findSmileDetection($id);
        if(!$smileDetectionToEdit){
            return redirect()->route("smile-detection.index");
        }
        $this->data["editSmileDetection"] = $smileDetectionToEdit;
        return view("pages.admin.specification.smile-detection.edit-smile-detection",$this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SmileDetectionRequest $request, $id)
    {
        $smileName = $request->input("smileDetectionName");
        try{
            $this->specificationModel->updateSmileDetection($smileName,$id);
            return redirect()->route("smile-detection.edit",["smile_detection"=>$id])->with("success","Detekcija osmeha je uspešno izmenjena.");
        }catch (\Exception $ex){
            return redirect()->route("smile-detection.edit",["smile_detection"=>$id])->with("error",$ex->getMessage());
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
            $this->specificationModel->deleteSmileDetection($id);
            return redirect()->route("smile-detection.index")->with("success","Detekcija osmeha je uspešno obrisana");
        }catch (\Exception $ex){
            return redirect()->route("smile-detection.index")->with("error","Detekcija osmeha se ne može obrisati jer postoje uređaji koji je koriste");
        }
    }
}
