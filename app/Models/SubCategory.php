<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;
    protected $table = 'subcategories';
       static public function getListSubCategory(){
        return self::select('subcategories.*', 'categories.name as name_categorie')
            ->join('categories', 'categories.id', '=', 'subcategories.category_id')
            ->where('subcategories.status', 0)
            ->where('subcategories.is_delete', 0)
            ->orderBy('subcategories.id', 'desc')
            ->paginate(15);
    }
    static public function getSubCatgoryById($id){
        return self::find($id);
    }
    static public function getSubCategoryId($category_id){
        return self::select('subcategories.*')
            ->where('status', 0)
            ->where('is_delete', 0)
            ->where('category_id', '=',$category_id)
            ->orderBy('name', 'asc')
            ->get();
    }
}