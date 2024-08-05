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
            ->count();

    }
    static public function getTotalTodayOrder()
    {
        return self::select('id')
            ->where('is_delete', 0)
            ->whereDate('created_at', '=', date('Y-m-d'))
            ->count();
    }
    static public function getTotalAmount()
    {
        return self::select('id')
            ->where('is_delete', 0)
            ->sum('total_amount');

    }
    static public function getTotalTodayAmount()
    {
        return self::select('id')
            ->where('is_delete', 0)
            ->whereDate('created_at', '=', date('Y-m-d'))
            ->sum('total_amount');

    }
    static public function getLatestOrder()
    {
        return Order::select('orders.*')
            ->where('is_delete', 0)
            ->orderBy('id', 'desc')
            ->limit(5)
            ->get();
    }
    static public function getListOrder()
    {
        return Order::select('orders.*')
            ->where('is_delete', 0)
            ->orderBy('id', 'desc')
            ->paginate(30);
    }
    public function getItem()
    {
        return $this->hasMany(Orderitem::class, 'order_id');
    }

}