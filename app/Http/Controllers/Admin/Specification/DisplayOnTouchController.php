<?php

namespace App\Http\Controllers\Admin\Specification;

use App\Http\Controllers\admin\SpecificationController;
use App\Http\Controllers\Controller;
use App\Http\Requests\DisplayOnTouchRequest;
use Illuminate\Http\Request;

class DisplayOnTouchController extends SpecificationController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("pages.admin.specification.display-on-touch.display-on-touch",$this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("pages.admin.specification.display-on-touch.create-display-on-touch",$this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DisplayOnTouchRequest $request)
    {
        $displayOnTouch = $request->input("displayOnTouchName");
        try{
            $this->specificationModel->insertDisplayOnTouch($displayOnTouch);
            return redirect()->route("specification")->with("success","Ekran na dodir je uspešno dodat.");
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
        $displayOnTouchForEdit = $this->specificationModel->findDisplayOnTouch($id);
        if(!$displayOnTouchForEdit){
            return redirect()->route("display-on-touch.index");
        }
        $this->data["editDisplayOnTouch"] = $displayOnTouchForEdit;
        return view("pages.admin.specification.display-on-touch.edit-display-on-touch",$this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(DisplayOnTouchRequest $request, $id)
    {
        $displayOnTouch = $request->input("displayOnTouchName");
        try{
            $this->specificationModel->updateDisplayOnTouch($displayOnTouch,$id);
            return redirect()->route("display-on-touch.edit",["display_on_touch"=>$id])->with("success","Ekran na dodir je uspešno izmenjen.");
        }catch (\Exception $ex){
            return redirect()->route("display-on-touch.edit",["display_on_touch"=>$id])->with("error",$ex->getMessage());
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
            $this->specificationModel->deleteDisplayOnTouch($id);
            return redirect()->route("display-on-touch.index")->with("success","Ekran na dodir je uspešno obrisan");
        }catch (\Exception $ex){
            return redirect()->route("display-on-touch.index")->with("error","Ekran na dodir se ne može obrisati jer postoje uređaji koji ga koriste");
        }
    }
}
