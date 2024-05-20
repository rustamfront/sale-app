@extends('layouts.app')

@section('title', 'Корзина')

@section('content')
    <h1>Корзина</h1>
    <form class="cart" action="{{ route('order.post') }}">
        @if(count($carts))
            <div class="cart__left">
                @foreach($carts as $cart)
                    <div class="cart__item">
                        <div class="cart__name">{{ $cart->product->name }}</div>
                        <div class="cart__quantity">Кол-во: {{ $cart->quantity }}</div>
                        <div class="cart__price">Цена: {{ $cart->price }} ₽</div>
                    </div>
                @endforeach
            </div>
            <div class="cart__right">
                <input type="hidden" value="{{ $total_price }}" name="total_price">
                <div class="cart__total">Общая сумма: {{ $total_price }} ₽</div>
                <button class="btn btn-cart" type="submit">Оформить заказ</button>
            </div>
        @else
            Корзина пуста
        @endif
    </form>
    <div class="order-success">
        Заказ успешно создан. Перейти на <a href="{{ route('order') }}">страницу заказов</a>
    </div>
@endsection
