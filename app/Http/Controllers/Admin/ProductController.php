<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Categories;
use App\Models\SubCategory;
use App\Models\Color;
use App\Models\ProductColor;
use App\Models\ProductSize;
use App\Models\ProductImage;
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
    public function edit($product_id)
    {
        $product = Product::getProductById($product_id);
        if (!empty($product)) {
            $data['categories'] = Categories::getListCategory();
            $data['color'] = Color::getColor();
            $data['product'] = $product;
            $data['get_sub_category'] = SubCategory::getSubCategoryId($product->category_id);
            $data['header_title'] = 'Edit product';
            return view('admin.product.edit', $data);
        }

    }
  public function editProduct($product_id, Request $request)
{
    $product = Product::getProductById($product_id);
    if (!empty($product)) {

        $product->name = trim($request->name);
        $product->category_id = trim($request->category_id);
        $product->sub_category_id = trim($request->sub_category_id);
        $product->code = trim($request->code);
        $product->url = trim($request->url);
        $product->price = trim($request->price);
        $product->old_price = trim($request->old_price);
        $product->description = trim($request->description);
        $product->short_description = trim($request->short_description);
        $product->status = trim($request->status);
        $product->save();

        ProductColor::DeleteRecord($product->id);
        if (!empty($request->color_id)) {
            foreach ($request->color_id as $color_id) {
                $color = new ProductColor;
                $color->color_id = $color_id;
                $color->product_id = $product->id;
                $color->save();
            }
        }

        ProductSize::DeleteRecord($product->id);
        if (!empty($request->size)) {
            foreach ($request->size as $size) {
                if (!empty($size['name'])) {
                    $saveSize = new ProductSize;
                    $saveSize->name = $size['name'];
                    $saveSize->price = !empty($size['price']) ? $size['price'] : 0;
                    $saveSize->product_id = $product->id;
                    $saveSize->save();
                }
            }
        }

         if(!empty($request->file('image'))){
            foreach($request->file('image') as $value){
                if($value->isValid()){
                        $ext = $value->getClientOriginalExtension();
                        $randomStr = $product->id . Str::random(20);
                        $filename = strtolower($randomStr) . '.' . $ext;
                        $value->move('upload/product/', $filename);

                        $imageupload = new ProductImage;
                        $imageupload->name_image = $filename;
                        $imageupload->image_extension = $ext;
                        $imageupload->product_id = $product->id;
                        $imageupload->save();
                }
            }
        }

        return redirect('admin/product/list')->with('success', "Cập nhật thành công");
    } else {
        abort(404);
    }
}
public function imageDelete($id){
        $image = ProductImage::getImageId($id);
        if(!empty($image->getLogo())){
            unlink('upload/product/' . $image->name_image);
        }
        $image->delete();
        return redirect()->back()->with('success',"Xóa ảnh thành công");
    
}



    //
}