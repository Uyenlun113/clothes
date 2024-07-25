<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    use HasFactory;
    static public function getProductById($id){
        return self::find($id);
    }
    static public function checkUrl($url){
        return self::where('url', "=", $url)->count();
    }
}