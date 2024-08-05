<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function list()
    {
        $data['order'] = Order::getListOrder();
        $data['header_title'] = "Order";
        return view('admin.order.list', $data);
    }
    public function detailOrder($id){
        $data['detail'] = Order::getSingle($id);
        $data['header_title'] = "Detail Order";
        return view('admin.order.detail', $data);
    }
    public function orderStatus(Request $request){
        $getOrder = Order::getSingle($request->order_id);
        $getOrder->status = $request->status;
        $getOrder->save();
        $json['message'] = "update status";
         return response()->json($json);
    }
}