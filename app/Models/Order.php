<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'orders';
    static function getSingle($id){
        return self::find($id);
    }
    static public function getListOrder(){
        return Order::select('orders.*')
            ->orderBy('id', 'desc')
            ->paginate(30);
    }
    public function getItem(){
        return $this->hasMany(Orderitem::class, 'order_id');
    }
    
}