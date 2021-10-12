<?php


namespace App\Http\Controllers\Admin;


use App\Http\Controllers\BaseController;
use App\Models\Admin\Order;
use Illuminate\Http\Request;

class OrderController extends BaseController
{
    protected $orderModel;
    public function __construct()
    {
        parent::__construct();
        $this->orderModel = new Order();
    }

    public function index(){
        $this->data['orders']=$this->orderModel->getAllOrders();
        return view("pages.admin.orders.order",$this->data);
    }
}
