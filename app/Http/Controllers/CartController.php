<?php

namespace App\Http\Controllers;

use App\Http\Requests\CartRequest;
use App\Models\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function __construct(Cart $cart)
    {
        $this->cart = $cart;
    }

    public function index()
    {
        $carts = $this->cart->where(['session_id' => session()->getId()])->with('product')->get();
        $total_price = 0;

        foreach ($carts as $cart) {
            $total_price += $cart->price * $cart->quantity;
        }

        return view('cart', ['carts' => $carts, 'total_price' => $total_price]);
    }

    public function add(CartRequest $request)
    {
        $this->cart->add($request->product_id, $request->quantity);
    }
}
