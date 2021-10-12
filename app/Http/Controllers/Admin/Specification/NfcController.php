<?php

namespace App\Http\Controllers\Admin\Specification;

use App\Http\Controllers\admin\SpecificationController;
use App\Http\Controllers\Controller;
use App\Http\Requests\NfcRequest;
use Illuminate\Http\Request;

class NfcController extends SpecificationController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("pages.admin.specification.nfc.nfc",$this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("pages.admin.specification.nfc.create-nfc",$this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NfcRequest $request)
    {
        $nfcName = $request->input("nfcName");
        try{
            $this->specificationModel->insertNfc($nfcName);
            return redirect()->route("specification")->with("success","Nfc je uspešno dodat.");
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
        $nfcToEdit = $this->specificationModel->findNfc($id);
        if(!$nfcToEdit){
            return redirect()->route("nfc.index");
        }
        $this->data["editNfc"] = $nfcToEdit;
        return view("pages.admin.specification.nfc.edit-nfc",$this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(NfcRequest $request, $id)
    {
        $nfcName = $request->input("nfcName");
        try{
            $this->specificationModel->updateNfc($nfcName,$id);
            return redirect()->route("nfc.edit",["nfc"=>$id])->with("success","Nfc je uspešno izmenjen.");
        }catch (\Exception $ex){
            return redirect()->route("nfc.edit",["nfc"=>$id])->with("error",$ex->getMessage());
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
            $this->specificationModel->deleteNfc($id);
            return redirect()->route("nfc.index")->with("success","Nfc je uspešno obrisan");
        }catch (\Exception $ex){
            return redirect()->route("nfc.index")->with("error","Nfc se ne može obrisati jer postoje uređaji koji je koriste");
        }
    }
}
