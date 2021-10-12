<?php

namespace App\Http\Controllers\Admin\Specification;

use App\Http\Controllers\admin\SpecificationController;
use App\Http\Controllers\Controller;
use App\Http\Requests\HdrRequest;
use Illuminate\Http\Request;

class HdrController extends SpecificationController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("pages.admin.specification.hdr.hdr",$this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("pages.admin.specification.hdr.create-hdr",$this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(HdrRequest $request)
    {
        $hdrName = $request->input("hdrName");
        try{
            $this->specificationModel->insertHdr($hdrName);
            return redirect()->route("specification")->with("success","Hdr je uspešno dodat.");
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
        $hdrToEdit = $this->specificationModel->findHdr($id);
        if(!$hdrToEdit){
            return redirect()->route("hdr.index");
        }
        $this->data["editHdr"] = $hdrToEdit;
        return view("pages.admin.specification.hdr.edit-hdr",$this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(HdrRequest $request, $id)
    {
        $hdrName = $request->input("hdrName");
        try{
            $this->specificationModel->updateHdr($hdrName,$id);
            return redirect()->route("hdr.edit",["hdr"=>$id])->with("success","Hdr je uspešno izmenjen.");
        }catch (\Exception $ex){
            return redirect()->route("hdr.edit",["hdr"=>$id])->with("error",$ex->getMessage());
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
            $this->specificationModel->deleteHdr($id);
            return redirect()->route("hdr.index")->with("success","Hdr je uspešno obrisan");
        }catch (\Exception $ex){
            return redirect()->route("hdr.index")->with("error","Hdr se ne može obrisati jer postoje uređaji koji ga koriste");
        }
    }
}
