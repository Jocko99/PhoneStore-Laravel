<?php

namespace App\Http\Controllers\Admin\Specification;

use App\Http\Controllers\admin\SpecificationController;
use App\Http\Controllers\Controller;
use App\Http\Requests\RamRequest;
use Illuminate\Http\Request;

class RamController extends SpecificationController
{
    public function __construct()
    {
        parent::__construct();
        $this->data['allRam'] = $this->specificationModel->allRam();
    }

    public function index()
    {
        return view("pages.admin.specification.ram.ram",$this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("pages.admin.specification.ram.create-ram",$this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RamRequest $request)
    {
        $memory = $request->input("ramName");
        try{
            $this->specificationModel->insertRam($memory);
            return redirect()->route("specification")->with("success","Ram memorija je uspešno dodata.");
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
//        $ramForEdit = $this->specificationModel->findRam($id);
//        if(!$ramForEdit){
//            return redirect()->route("ram.index");
//        }
//        $this->data["editRam"] = $ramForEdit;
//        return view("pages.admin.specification.ram.edit-ram",$this->data);
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
//        $memory = $request->input("ramName");
//        try{
//            $this->specificationModel->updateRam($memory,$id);
//            return redirect()->route("ram.edit",["ram"=>$id])->with("success","Ram memorija je uspešno izmenjena.");
//        }catch (\Exception $ex){
//            return redirect()->route("ram.edit",["ram"=>$id])->with("error",$ex->getMessage());
//        }
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
            $this->specificationModel->deleteRam($id);
            return redirect()->route("ram.index")->with("success","Ram memorija je uspešno obrisana");
        }catch (\Exception $ex){
            return redirect()->route("ram.index")->with("error","Ram memorija se ne može obrisati jer postoje uređaji koji ga koriste");
        }
    }
}
