<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Categories;
use App\Models\SubCategory;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function listProduct()
    {
        $data['product'] = Product::getListProduct();
        $data['header_title'] = "Product";
        return view('admin.product.list', $data);
    }
    public function add()
    {
        $data['header_title'] = "Thêm sản phẩm";
        return view('admin.product.add', $data);
    }
    public function addProduct(Request $request)
    {
        $name = trim($request->name);
        $product = new Product;
        $product->name = $name;
        $url = Str::slug($name, "-");
        $checkUrl = Product::checkUrl($url);
        if (empty($checkUrl)) {
            $product->url = $url;
        } else {
            $product->url = $url . '_' . (Product::max('id') + 1);
        }
        $product->save();
        return redirect('admin/product/edit/' . $product->id);
    }
    public function edit($product_id){
         $product = Product::getProductById($product_id);
         if(!empty($product)){
            $data['product'] = $product;
            $data['header_title'] = 'Edit product';
            return view('admin.product.edit');
         }
        
    }

    //
}