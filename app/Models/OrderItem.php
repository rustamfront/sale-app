<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'product_id'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public static function add($order_id)
    {
        $carts = Cart::where(['session_id' => session()->getId()])->with('product')->get();

        if ($carts) {

            foreach ($carts as $cart) {
                self::create([
                    'order_id' => $order_id,
                    'product_id' => $cart->product->id
                ]);
                $cart->delete();
            }
        }
    }
}
