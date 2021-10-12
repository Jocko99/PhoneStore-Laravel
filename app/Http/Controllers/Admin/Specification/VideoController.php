<?php

namespace App\Http\Controllers\Admin\Specification;

use App\Http\Controllers\admin\SpecificationController;
use App\Http\Controllers\Controller;
use App\Http\Requests\VideoRequest;
use Illuminate\Http\Request;

class VideoController extends SpecificationController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("pages.admin.specification.video.video",$this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("pages.admin.specification.video.create-video",$this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(VideoRequest $request)
    {
        $videoName = $request->input("videoName");
        try{
            $this->specificationModel->insertVideo($videoName);
            return redirect()->route("specification")->with("success","Video je uspešno dodat.");
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
        $videoToEdit = $this->specificationModel->findVideo($id);
        if(!$videoToEdit){
            return redirect()->route("video.index");
        }
        $this->data["editVideo"] = $videoToEdit;
        return view("pages.admin.specification.video.edit-video",$this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(VideoRequest $request, $id)
    {
        $videoName = $request->input("videoName");
        try{
            $this->specificationModel->updateVideo($videoName,$id);
            return redirect()->route("video.edit",["video"=>$id])->with("success","Video je uspešno izmenjen.");
        }catch (\Exception $ex){
            return redirect()->route("video.edit",["video"=>$id])->with("error",$ex->getMessage());
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
            $this->specificationModel->deleteVideo($id);
            return redirect()->route("video.index")->with("success","Video je uspešno obrisan");
        }catch (\Exception $ex){
            return redirect()->route("video.index")->with("error","video se ne može obrisati jer postoje uređaji koji ga koriste");
        }
    }
}
