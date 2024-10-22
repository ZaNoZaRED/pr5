<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
<div class="product-cards">
    @foreach ($product as $input)
        <div class="{{ $input['amount'] > 0 ? 'card' : 'bruh' }}">
        <h2><a href="{{ url('/products/' . $input->id) }}">{{ $input->name }}</a></h2>
            <p>Цена: {{($input['cost'])}} ₽</p>
            <p>{{ $input['amount'] > 0 ? 'В наличии' : 'Отсутствует' }}</p>
        </div>
    @endforeach
</div>
<div class="Paginate">
{{ $product->links() }}
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
    .Paginate {
        text-align: center;
    }
</style>
</body>
</html>
