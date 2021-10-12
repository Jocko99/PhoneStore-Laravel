<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AutorController extends BaseController
{
    public function index(){
        return view("pages.user.autor",$this->data);
    }
}
