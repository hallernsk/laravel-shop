@extends('layouts.app')

@section('content')
    <h1>Создание заказа</h1>

    <form action="{{ route('orders.store') }}" method="POST">
        @csrf
        <div>
            <label for="customer_name">ФИО покупателя</label>
            <input type="text" id="customer_name" name="customer_name" value="{{ old('customer_name') }}" required>
            @error('customer_name')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="product_id">Товар</label>
            <select id="product_id" name="product_id" required>
                <option value="">Выберите товар</option>
                @foreach($products as $product)
                    <option value="{{ $product->id }}" {{ old('product_id') == $product->id ? 'selected' : '' }}>
                        {{ $product->name }} ({{ number_format($product->price, 2) }} ₽)
                    </option>
                @endforeach
            </select>
            @error('product_id')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="quantity">Количество</label>
            <input type="number" min="1" id="quantity" name="quantity" value="{{ old('quantity', 1) }}" required>
            @error('quantity')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="comment">Комментарий</label>
            <textarea id="comment" name="comment" rows="3">{{ old('comment') }}</textarea>
            @error('comment')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <button type="submit">Создать заказ</button>
            <a href="{{ route('orders.index') }}">Отмена</a>
        </div>
    </form>
@endsection
