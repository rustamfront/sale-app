<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'price',
        'session_id'
    ];

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

    public static function add($total_price)
    {
        $order = self::create([
            'session_id' => session()->getId(),
            'price' => $total_price
        ]);

        if ($order) {
            OrderItem::add($order->id);
        }
    }
}
