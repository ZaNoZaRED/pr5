<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $product->name }}</title>
</head>
<body>
<nav>
    <ul style="list-style: none; display: flex">
        @if(Auth::check())
            <li>
                <form action="{{ route('logout') }}" method="POST" style="display:flex;">
                    @csrf
                    <button type="submit">Выход</button>
                    <a href="{{ route('orders.index') }}" style="text-decoration: none; margin-left: 20px;">Мои Заказы</a>
                </form>
            </li>
        @else
            <li><a href="{{ route('login') }}" style="margin-left: 20px; text-decoration: none;">Вход</a></li>
            <li><a href="{{ route('register') }}" style="margin-left: 20px; text-decoration: none;">Регистрация</a></li>
        @endauth
    </ul>
</nav>

    <div class="product-detail" style="text-align: center;">
        <h1>{{ $product->name }}</h1>
        <p>Цена: {{ number_format($product->cost, 2, ',', ' ') }} ₽</p>
        <p>Количество: {{ $product->amount }}</p>
        <p>{{ $product->amount > 0 ? 'В наличии' : 'Нет в наличии' }}</p>

        <a href="/products">Назад к списку товаров</a>
        @if(Auth::check())
    </div>
    <h1>{{ $product->name }}</h1>
    <p>Стоимость: {{ $product->cost }}</p>
    @if($product->amount > 0)
    <p>Количество на складе: {{ $product->amount }}</p>

    <!-- Форма заказа -->
    <form action="{{ route('orders.store') }}" method="POST">
        @csrf
        <input type="hidden" name="product_id" value="{{ $product->id }}">
        
        <label for="quantity">Количество:</label>
        <input type="number" name="quantity" id="quantity" min="1" required>
        
        <button type="submit">Заказать</button>
    </form>
    @else
    <p>Товар отсутствует. Заказ невозможен.</p>
    @endif
    @else
    <p>Для того, чтобы заказать, вам нужно <a href="/login">авторизоваться</a>
    @endauth
</body>
</html>