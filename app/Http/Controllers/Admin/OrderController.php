<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function list()
    {
        $data['categories'] = Order::getListOrder();
        $data['header_title'] = "Order";
        return view('admin.order.list', $data);
    }
}