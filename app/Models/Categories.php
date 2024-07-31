<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    use HasFactory;
     static public function getListCategory(){
        return Categories::select('categories.*')
            ->where('status', 0)
            ->where('is_delete', 0)
            ->orderBy('id', 'desc')
            ->get();
    }
     
    static public function getCatgoryById($id){
        return Categories::find($id);
    }
    static public function getCatgoryByUrl($urlCategory){
        return self::where('urlCategory','=',$urlCategory)
        ->where('categories.is_delete','=',0)
        ->where('categories.status','=',0)
        ->first();
    }
    static public function getListMenu(){
        return Categories::select('categories.*')
            ->where('status', 0)
            ->where('is_delete', 0)
            ->get();
    }
    public function getSubCategory(){
        return $this->hasMany(SubCategory::class, "category_id")
        ->where('subcategories.status','=',0)
        ->where('subcategories.is_delete','=',0);
    }
}