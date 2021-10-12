<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ErrorController extends BaseController
{
    public function not_found(){
        return view("pages.404",$this->data);
    }
}
