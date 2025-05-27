@extends('layouts.app')

@section('content')
    <h1>Редактирование товара</h1>

    <form action="{{ route('products.update', $product) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div>
            <label for="name">Название</label>
            <input type="text" id="name" name="name" value="{{ old('name', $product->name) }}" required>
            @error('name')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="category_id">Категория</label>
            <select id="category_id" name="category_id" required>
                <option value="">Выберите категорию</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
            @error('category_id')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="description">Описание</label>
            <textarea id="description" name="description" rows="3">{{ old('description', $product->description) }}</textarea>
            @error('description')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="price">Цена (₽)</label>
            <input type="number" step="0.01" id="price" name="price" value="{{ old('price', $product->price) }}" required>
            @error('price')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <button type="submit">Обновить</button>
            <a href="{{ route('products.index') }}">Отмена</a>
        </div>
    </form>
@endsection
