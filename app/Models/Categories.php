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
}