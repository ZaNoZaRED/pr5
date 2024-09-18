<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<div class="product-cards">
    @foreach ($product as $input)
        <div class="{{ $input['amount'] > 0 ? 'card' : 'bruh' }}">
        <h2><a href="{{ url('/products/' . $input->id) }}">{{ $input->name }}</a></h2>
            <p>Цена: {{($input['cost'])}} ₽</p>
            <p>{{ $input['amount'] > 0 ? 'В наличии' : 'Нет в наличии' }}</p>
        </div>
    @endforeach
</div>

<style>
    .product-cards {
        display: flex;
        justify-content: space-around;
    }
    .card {
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        border: 1px solid #ccc; padding: 10px; margin: 10px; width: 200px;
    }
    .bruh {
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        border: 1px solid #ccc; padding: 10px; margin: 10px; width: 200px;
        background-color: grey;
    }
</style>
</body>
</html>
