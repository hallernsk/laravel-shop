@extends('layouts.app')

@section('content')
    <div>
        <h1>Информация о заказе #{{ $order->id }}</h1>
        <a href="{{ route('orders.index') }}">Назад к списку</a>
    </div>

    <div>
        <h2>Данные заказа</h2>
        <p><strong>ФИО покупателя:</strong> {{ $order->customer_name }}</p>
        <p><strong>Дата создания:</strong> {{ $order->created_at->format('d.m.Y H:i') }}</p>
        <p>
            <strong>Статус:</strong>
            @if($order->status == 'new')
                Новый
            @else
                Выполнен
            @endif
        </p>
        <p><strong>Комментарий:</strong> {{ $order->comment ?: 'Отсутствует' }}</p>
    </div>

    <div>
        <h2>Товар в заказе</h2>
        <table>
            <thead>
                <tr>
                    <th>Название</th>
                    <th>Категория</th>
                    <th>Цена за единицу</th>
                    <th>Количество</th>
                    <th>Итого</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $order->product->name }}</td>
                    <td>{{ $order->product->category->name }}</td>
                    <td>{{ number_format($order->product->price, 2) }} ₽</td>
                    <td>{{ $order->quantity }}</td>
                    <td>{{ number_format($order->product->price * $order->quantity, 2) }} ₽</td>
                </tr>
            </tbody>
        </table>
    </div>

    @if($order->status == 'new')
        <form action="{{ route('orders.update', $order) }}" method="POST" style="margin-top: 20px;">
            @csrf
            @method('PUT')
            <button type="submit">Отметить как выполненный</button>
        </form>
    @endif
@endsection
