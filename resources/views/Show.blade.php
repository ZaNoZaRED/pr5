<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $product->name }}</title>
</head>
<body>
    <div class="product-detail" style="text-align: center;">
        <h1>{{ $product->name }}</h1>
        <p>Цена: {{ number_format($product->cost, 2, ',', ' ') }} ₽</p>
        <p>Количество: {{ $product->amount }}</p>
        <p>{{ $product->amount > 0 ? 'В наличии' : 'Нет в наличии' }}</p>

        <a href="/products">Назад к списку товаров</a>
    </div>
    <h1>{{ $product->name }}</h1>
    <p>Стоимость: {{ $product->cost }}</p>
    <p>Количество на складе: {{ $product->amount }}</p>

    <!-- Форма заказа -->
    <form action="{{ route('orders.store') }}" method="POST">
        @csrf
        <input type="hidden" name="product_id" value="{{ $product->id }}">
        
        <label for="quantity">Количество:</label>
        <input type="number" name="quantity" id="quantity" min="1" max="{{ $product->amount }}" required>
        
        <button type="submit">Заказать</button>
    </form>
</body>
</html>