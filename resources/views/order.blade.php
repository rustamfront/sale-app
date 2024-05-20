@extends('layouts.app')

@section('title', 'Заказы')

@section('content')
    <h1>Заказы</h1>
    <div class="cart">
        @if(count($orders))
            <div class="cart__left">
                @foreach($orders as $order)
                    <div class="cart__item">
                        <div>#{{ $order->id }}</div>
                        <div>{{ $order->created_at }}</div>
                        <div>
                        @foreach($order->orderItems as $item)
                             {{ $item->product->name }},
                        @endforeach
                        </div>
                        <div>{{ $order->price }} ₽</div>
                    </div>
                @endforeach
            </div>
            <div class="cart__right">
                <div class="cart__total">Общая сумма: {{ $total_price }} ₽</div>
            </div>
        @else
            Заказов нет
        @endif
    </div>
@endsection
