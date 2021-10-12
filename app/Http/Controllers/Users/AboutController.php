<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;

class AboutController extends BaseController
{
    public function index(){
        return view("pages.user.aboutus",$this->data);
    }
}
