@extends('layouts.app')

@section('title', 'Продукты')

@section('content')
    <h1>Товары</h1>
    @if(count($products))
    <div class="products">
            @foreach($products as $product)
                <div class="product">
                    <div class="product__name">{{ $product->name }}</div>
                    <div class="product__price">Цена: {{ $product->price }} ₽</div>
                    <div class="product__bottom">
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        <input type="number" name="quantity" min="1" placeholder="Количество" value="1">
                        <button class="btn btn-product">Купить</button>
                    </div>
                </div>
            @endforeach
    </div>
    <a href="{{ route('cart') }}">В корзину</a>
    @else
        Товаров нет
    @endif
@endsection
