<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categories;
use App\Models\SubCategory;
use App\Models\Product;
use App\Models\Color;

class ProductController extends Controller
{
    public function getCategorySub($urlCategory, $url = '')
    {
       
        $getProductSingle = Product::getSingleSlug($urlCategory);
        $getCategory = Categories::getCatgoryByUrl($urlCategory);
        $getSubCategory = SubCategory::getCatgoryByUrl($url);
        $data['getColor'] = Color::getColor();

        if(!empty( $getProductSingle)){
            $data['getProductDetail'] = Product::getSingleSlug($urlCategory);
            return view('product.detail', $data);

        }

        else if (!empty($getCategory) && !empty($getSubCategory)) {

            $data['getCategory'] = $getCategory;
            $data['getSubCategory'] = $getSubCategory;
            $data['getSubFilter'] = SubCategory::getSubCategoryId($getCategory->id);
            $data['getProduct'] = Product::getProduct($getCategory->id, $getSubCategory->id);
        } else if (!empty($getCategory)) {
            $data['getSubFilter'] = SubCategory::getSubCategoryId($getCategory->id);
            // dd($data['getSubFilter']);
            $data['getCategory'] = $getCategory;
            $data['getProduct'] = Product::getProduct($getCategory->id);

            if ($data['getProduct']->isEmpty()) {
                return redirect()->route('home')->with('error', 'Không tìm thấy sản phẩm.');
            }
        } else {
            abort(404);
        }

        return view('product.list', $data);
    }
    public function getProductAjax(Request $request)
    {
        $getProduct = Product::getProduct();
        return response()->json([
            "status" => true,
            "success" => view("product._list", ["getProduct" => $getProduct,])->render(),
        ], 200);

    }

    //
}