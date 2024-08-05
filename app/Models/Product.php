<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Product extends Model
{
    protected $table = 'products';
    use HasFactory;
    static public function getProductById($id)
    {
        return self::find($id);
    }
    static public function getListProduct()
    {
        return self::select('products.*')
            ->where('is_delete', '=', 0)
            ->orderBy('id', 'desc')
            ->paginate(9);
    }
    static public function getProductHome()
    {
        return self::select('products.*')
            ->where('is_delete', '=', 0)
            ->orderBy('id', 'asc')
            ->limit(10)
            ->get();
    }
// lấy danh sách sản phẩm theo catagory ,  Sub_category
    static public function getProduct($category_id = '', $subcategory_id = '')
    {
        $query = Product::select(
            'products.*',
            'categories.name as category_name',
            'categories.urlCategory as category_url',
            'subcategories.name as sub_name',
            'subcategories.url as sub_url'
        )
            ->join('categories', 'categories.id', '=', 'products.category_id')
            ->join('subcategories', 'subcategories.id', '=', 'products.sub_category_id');

        if (!empty($category_id)) {
            $query->where('products.category_id', $category_id);
        }

        if (!empty($subcategory_id)) {
            $query->where('products.sub_category_id', $subcategory_id);
        }
        if (!empty(request()->get('sub_category_id'))) {
            $sub_category_id = rtrim(request()->get('sub_category_id'), ',');
            $sub_category_id_array = explode(",", $sub_category_id);
            $query->whereIn('products.sub_category_id', $sub_category_id_array);

        } else {
            if (!empty(request()->get('old_category_id'))) {
                $query->where('products.category_id', request()->get('old_category_id'));
            }

            if (!empty($old_sub_category_id)) {
                $query->where('products.sub_category_id',  request()->get('old_sub_category_id'));
            }

        }
        if (!empty(request()->get('color_id'))) {
            $color_id = rtrim(request()->get('color_id'), ',');
            $color_id_array = explode(",", $color_id);
            $query->join('product_color', 'product_color.product_id', '=', 'products.id');
            $query->whereIn('product_color.color_id', $color_id_array);

        }
        if(!empty(request()->get('q'))){
             $query->where('products.name','like','%'.request()->get('q').'%');
        }

        $query->where('products.is_delete', 0)
            ->where('products.status', 0)
            ->groupBy('products.id')
            ->orderBy('products.id', 'desc');

        return $query->paginate(9);
    }
    static public function getRelatedProduct($product_id,$sub_category_id){
        $query = Product::select(
            'products.*',
            'categories.name as category_name',
            'categories.urlCategory as category_url',
            'subcategories.name as sub_name',
            'subcategories.url as sub_url'
        )
        ->join('categories', 'categories.id', '=', 'products.category_id')
        ->join('subcategories', 'subcategories.id', '=', 'products.sub_category_id');

        $query->where('products.is_delete', 0)
            ->where('products.status', 0)
            ->where('products.id', '!=',$product_id)
            ->where('products.sub_category_id', '=',$sub_category_id)
            ->groupBy('products.id')
            ->orderBy('products.id', 'desc')
            ->limit(10);

        return $query->get();

    }
    public function getImageSingle()
    {
        return $this->hasMany(ProductImage::class, 'product_id')->first();
    }
    static public function getSingleSlug($url){
         return self::where('url', $url)
         ->where('products.is_delete', 0)
            ->where('products.status', 0)
            ->first();
    }
    //check url
    static public function checkUrl($url)
    {
       return self::where('url', $url)->first();
    }
    public function getColor()
    {
        return $this->hasMany(ProductColor::class, "product_id");
    }
    public function getSize()
    {
        return $this->hasMany(ProductSize::class, "product_id");
    }
    public function getImage()
    {
        return $this->hasMany(ProductImage::class, "product_id");
    }
}