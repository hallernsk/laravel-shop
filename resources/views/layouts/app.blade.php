<!DOCTYPE html>
<html lang="ru">
   <head>
       <meta charset="UTF-8">
       <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <title>Магазин товаров</title>
       <link rel="stylesheet" href="{{ asset('css/app.css') }}">
   </head>
   <body>
        <h1>Панель управления товарами и заказами</h1>
        <nav>
            <a href="{{ route('products.index') }}">Товары</a>
            <a href="{{ route('orders.index') }}">Заказы</a>
        </nav>

        <div>
            @if(session('success'))
               <div class="success">
                   {{ session('success') }}
               </div>
            @endif

            @if(session('error'))
                <div class="error">
                {{ session('error') }}
                </div>
            @endif

           @yield('content')
        </div>
    </body>
</html>