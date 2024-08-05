<?php

namespace App\Http\Controllers;

use App\Models\Product;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home(){
        $data['product'] = Product::getProductHome();
       
        return view('home',$data);
    }
    
}