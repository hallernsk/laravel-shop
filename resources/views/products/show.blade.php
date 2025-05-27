@extends('layouts.app')

@section('content')
    <div>
        <h2>Информация о товаре</h2>
        <a href="{{ route('products.index') }}">Назад к списку</a>
    </div>

    <div>
        <h2>{{ $product->name }}</h2>
        <p>Категория: {{ $product->category->name }}</p>
        <p>Цена: {{ number_format($product->price, 2) }} ₽</p>
        <p>Описание:</p>
        <p>{{ $product->description ?: 'Описание отсутствует' }}</p>
        
        <div>
            <a href="{{ route('products.edit', $product) }}">Редактировать</a>
            <form action="{{ route('products.destroy', $product) }}" method="POST" style="display:inline">
                @csrf
                @method('DELETE')
                <button type="submit" onclick="return confirm('Вы уверены?')">Удалить</button>
            </form>
        </div>
    </div>
@endsection
