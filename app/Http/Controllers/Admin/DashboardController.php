<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard(){
        $data['totalOrder'] = Order::getTotalOrder();
        $data['totalTodayOrder'] = Order::getTotalTodayOrder();
        $data['totalAmount'] = Order::getTotalAmount();
        $data['totalTodayAmount'] = Order::getTotalTodayAmount();
        $data['customer'] = User::getTotalCustomer();
        $data['latestOrder'] = Order::getLatestOrder();
        $data['header_title'] = "Dashboard";
        return view('admin.dashboard',$data);
    }
    //
}