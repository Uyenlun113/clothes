<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
            ->paginate(20);
    }

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

        $query->where('products.is_delete', 0)
            ->where('products.status', 0)
            ->orderBy('products.id', 'desc');

        return $query->paginate(9);
    }
    public function getImageSingle()
{
    return $this->hasMany(ProductImage::class, 'product_id')->first();
}

    static public function checkUrl($url)
    {
        return self::where('url', "=", $url)->count();
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