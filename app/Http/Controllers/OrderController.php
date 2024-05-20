<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderRequest;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function __construct(Order $order)
    {
        $this->order = $order;
    }

    public function index()
    {
        $orders = $this->order->where(['session_id' => session()->getId()])->with('orderItems.product')->get();
        $total_price = 0;

        foreach ($orders as $order) {
            $total_price += $order->price;
        }

        return view('order', ['orders' => $orders, 'total_price' => $total_price]);
    }

    public function add(OrderRequest $request)
    {
        $this->order->add($request->total_price);
    }
}
