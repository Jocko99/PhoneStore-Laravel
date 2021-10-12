<?php

namespace App\Http\Controllers\Admin\Specification;

use App\Http\Controllers\admin\SpecificationController;
use App\Http\Controllers\Controller;
use App\Http\Requests\MarkRequest;
use Illuminate\Http\Request;

class MarkController extends SpecificationController
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        return view("pages.admin.specification.mark.mark",$this->data);
    }


    public function create()
    {
        return view("pages.admin.specification.mark.create-mark",$this->data);
    }


    public function store(MarkRequest $request)
    {
        $markName = $request->input("markName");
        try{
            $this->specificationModel->insertMark($markName);
            return redirect()->route("specification")->with("success","Marka je uspešno dodata.");
        }catch (\Exception $ex){
            return redirect()->route("specification")->with("error",$ex->getMessage());
        }
    }


    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $markToEdit = $this->specificationModel->findMark($id);
        if(!$markToEdit){
            return redirect()->route("mark.index");
        }
        $this->data["editMark"] = $markToEdit;
        return view("pages.admin.specification.mark.edit-mark",$this->data);
    }


    public function update(MarkRequest $request, $id)
    {
            $markName = $request->input("markName");
            try{
                $this->specificationModel->updateMark($markName,$id);
                return redirect()->route("mark.edit",["mark"=>$id])->with("success","Marka je uspešno izmenjena.");
            }catch (\Exception $ex){
                return redirect()->route("mark.edit",["mark"=>$id])->with("error",$ex->getMessage());
            }
    }

    public function destroy($id)
    {
        try{
            $this->specificationModel->deleteMark($id);
            return redirect()->route("mark.index")->with("success","Marka je uspešno obrisana");
        }catch (\Exception $ex){
            return redirect()->route("mark.index")->with("error","Marka se ne može obrisati jer postoje uređaji koji je koriste");
        }
    }
}
