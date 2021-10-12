<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;

class BaseController extends Controller
{
    protected $data;
    private $menuModel;

    public function __construct()
    {
        $this->menuModel = new Menu();
        $this->data["menu"] = $this->menuModel->getMenu();
    }
}
