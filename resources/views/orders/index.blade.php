@extends('layouts.app')

@section('content')
    <div>
        <h2>Список заказов</h2>
        <a href="{{ route('orders.create') }}">Создать заказ</a>
    </div>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Дата создания</th>
                <th>ФИО покупателя</th>
                <th>Статус</th>
                <th>Итоговая цена</th>
                <th>Действия</th>
            </tr>
        </thead>
        <tbody>
            @foreach($orders as $order)
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->created_at->format('d.m.Y H:i') }}</td>
                    <td>{{ $order->customer_name }}</td>
                    <td>
                        @if($order->status == 'new')
                            Новый
                        @else
                            Выполнен
                        @endif
                    </td>
                    <td>{{ number_format($order->product->price * $order->quantity, 2) }} ₽</td>
                    <td>
                        <a href="{{ route('orders.show', $order) }}">Просмотр</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
