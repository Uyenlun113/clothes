<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orderitem extends Model
{
    use HasFactory;
    protected $table = 'order_item';
    static function DeleteRecord($product_id){
        self::where('product_id', '=', $product_id)->delete();
    }
    public function getColor()
    {
        return $this->belongsTo(Color::class, "color_id");
    }
    public function getProduct(){
        return $this->belongsTo(Product::class, 'product_id');
    }
}