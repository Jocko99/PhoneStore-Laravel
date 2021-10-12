<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use App\Models\Admin\Specification;
use Illuminate\Http\Request;

class SpecificationController extends BaseController
{
    protected $specificationModel;
    public function __construct()
    {
        parent::__construct();
        $this->specificationModel = new Specification();
        $this->data["mark"] = $this->specificationModel->getMarkName();
        $this->data["os"] = $this->specificationModel->getOs();
        $this->data["chipset"] = $this->specificationModel->getChipSet();
        $this->data["camera"] = $this->specificationModel->getCameraPx();
        $this->data["hdr"] = $this->specificationModel->getHdr();
        $this->data["smileDetect"] = $this->specificationModel->getSmileDetection();
        $this->data["video"] = $this->specificationModel->getVideo();
        $this->data["blic"] = $this->specificationModel->getBlic();
        $this->data["autofocus"] = $this->specificationModel->getAutoFocus();
        $this->data["displaysize"] = $this->specificationModel->getDisplaySize();
        $this->data["ontouch"] = $this->specificationModel->getOnTouch();
        $this->data["displaytype"] = $this->specificationModel->getDisplayType();
        $this->data["resolution"] = $this->specificationModel->getResolution();
        $this->data["battery"] = $this->specificationModel->getBattery();
        $this->data["batterycapacity"] = $this->specificationModel->getBatteryCapacity();
        $this->data["ram"] = $this->specificationModel->getRam();
        $this->data["inter"] = $this->specificationModel->getInter();
        $this->data["external"] = $this->specificationModel->getExternal();
        $this->data["wifi"] = $this->specificationModel->getWifi();
        $this->data["bluetooth"] = $this->specificationModel->getBluetooth();
        $this->data["usb"] = $this->specificationModel->getUsb();
        $this->data["nfc"] = $this->specificationModel->getNfc();
        $this->data["gps"] = $this->specificationModel->getGps();
        $this->data["weight"] = $this->specificationModel->getWeight();
    }

    public function allSpecification(){
        //$array = ["Marka","Chipset","Procesor","OS","Version-Os","Camera","Hdr","Smile-Detection","Video","Blic","Autofokus","Battery-Capacity","Battery-Type","Display-Size","Display-Touch","Display-Type","Display-Resolution","Memory","Ram-Memory","Internal-Memory","External-Memory","Wifi","Bluetooth","Usb","Nfc","Gps","Weight"];
        //$this->data["specification"] = $array;
        return view("pages.admin.specification.index",$this->data);
    }
}
