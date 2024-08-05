<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'orders';
    static function getSingle($id)
    {
        return self::find($id);
    }
    static public function getTotalOrder()
    {
        return self::select('id')
            ->where('is_delete', 0)
            ->where('is_payment', 1)
            ->count();

    }
    static public function getTotalTodayOrder()
    {
        return self::select('id')
            ->where('is_delete', 0)
            ->where('is_payment', 1)
            ->whereDate('created_at', '=', date('Y-m-d'))
            ->count();
    }
    static public function getTotalAmount()
    {
        return self::select('id')
            ->where('is_delete', 0)
            ->where('is_payment', 1)
            ->sum('total_amount');

    }
    static public function getTotalTodayAmount()
    {
        return self::select('id')
            ->where('is_delete', 0)
            ->where('is_payment', 1)
            ->whereDate('created_at', '=', date('Y-m-d'))
            ->sum('total_amount');

    }
    static public function getLatestOrder()
    {
        return Order::select('orders.*')
            ->where('is_delete', 0)
            ->where('is_payment', 1)
            ->orderBy('id', 'desc')
            ->limit(5)
            ->get();
    }
    static public function getListOrder()
    {
        return Order::select('orders.*')
            ->where('is_delete', 0)
            ->where('is_payment', 1)
            ->orderBy('id', 'desc')
            ->paginate(30);
    }
    static public function getOrderUser($user_id)
    {
        return Order::select('orders.*')
            ->where('user_id', '=', $user_id)
            ->where('is_delete', 0)
            ->where('is_payment', 1)
            ->orderBy('id', 'desc')
            ->get();
    }
    static public function getSingleOrderUser($user_id,$id){
         return Order::select('orders.*')
            ->where('user_id', '=', $user_id)
            ->where('id', '=', $id)
            ->where('is_delete', 0)
            ->where('is_payment', 1)
            ->first();

    }

    public function getItem()
    {
        return $this->hasMany(Orderitem::class, 'order_id');
    }

}