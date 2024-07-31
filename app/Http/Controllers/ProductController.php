<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categories;
use App\Models\SubCategory;
use App\Models\Product;

class ProductController extends Controller
{
    public function getCategorySub($urlCategory, $url = '')
{
    $getCategory = Categories::getCatgoryByUrl($urlCategory);
    $getSubCategory = SubCategory::getCatgoryByUrl($url);

    if (!empty($getCategory) && !empty($getSubCategory)) {
        $data['getCategory'] = $getCategory;
        $data['getSubCategory'] = $getSubCategory;
        $data['getProduct'] = Product::getProduct($getCategory->id, $getSubCategory->id);

        return view('product.list', $data);
    } else if (!empty($getCategory)) {
        $data['getCategory'] = $getCategory;
        $data['getProduct'] = Product::getProduct($getCategory->id);

        if ($data['getProduct']->isEmpty()) {
            return redirect()->route('home')->with('error', 'Không tìm thấy sản phẩm.');
        }

        return view('product.list', $data);
    } else {
        abort(404);
    }
}
    //
}