<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = [
        'session_id',
        'product_id',
        'quantity',
        'price'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public static function add($product_id, $quantity)
    {
        $product = Product::findOrFail($product_id);

        if ($cart = self::where(['session_id' => session()->getId(), 'product_id' => $product->id])->first()) {
            $cart->quantity = $quantity;
            $cart->save();
        } else {
            $cart = self::create([
                'session_id' => session()->getId(),
                'product_id' => $product->id,
                'quantity'   => $quantity,
                'price'      => $product->price
            ]);
        }

        return $cart;
    }
}
