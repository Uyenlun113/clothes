<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DiscountCode extends Model
{
    use HasFactory;
     protected $table = 'discount_code';
    static public function getSingle($id){
        return self::find($id);
    }
    static public function getListDiscountCode(){
        return self::select('discount_code.*')
            ->where('is_delete', '=', 0)
            ->orderBy('id', 'desc')
            ->paginate(20);
    }
    static function checkDiscount($discount_code){
        return self::select('discount_code.*')
            ->where('is_delete', '=', 0)
            ->where('status', '=', 0)
           ->where('name', '=', $discount_code)
           ->where('expridate', '>=', date('Y-m-d'))
            ->first();


    }
}