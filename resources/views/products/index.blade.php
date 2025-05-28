@extends('layouts.app')

@section('content')
    <div>
        <h2>Список товаров</h2>
        <a href="{{ route('products.create') }}">Добавить товар</a>
    </div>
    <br>    
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Название</th>
                <th>Категория</th>
                <th>Цена</th>
                <th>Действия</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->category->name }}</td>
                    <td>{{ number_format($product->price, 2) }} ₽</td>
                    <td>
                        <a href="{{ route('products.show', $product) }}">Просмотр</a>
                        <a href="{{ route('products.edit', $product) }}">Редактировать</a>
                        <form action="{{ route('products.destroy', $product) }}" method="POST" style="display:inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Вы уверены?')">Удалить</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
