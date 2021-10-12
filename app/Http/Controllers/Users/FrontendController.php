<?php


namespace App\Http\Controllers\Users;


use App\Http\Controllers\BaseController;
use App\Models\User\Mobile;
use Illuminate\Http\Request;

class FrontendController extends BaseController
{
    protected $mobileModel;
    public function __construct()
    {
        parent::__construct();
        $this->mobileModel= new Mobile();
    }

}
