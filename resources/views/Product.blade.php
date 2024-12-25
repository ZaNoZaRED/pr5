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
    /* Общий стиль для контейнера карточек */
    .product-cards {
        display: flex;
        justify-content: space-around;
        flex-wrap: wrap; /* Чтобы карточки не выходили за пределы экрана */
        gap: 20px; /* Добавим пространство между карточками */
        padding: 20px;
    }

    /* Стиль для отдельной карточки */
    .card {
        width: 250px; /* Чуть больше для лучшего вида */
        background-color: #fff; /* Белый фон для карточек */
        border-radius: 8px; /* Округленные углы */
        box-shadow: 0 4px 8px rgba(4, 0, 255, 0.1); /* Мягкая тень */
        padding: 20px;
        margin: 10px;
        text-align: center;
        transition: transform 0.3s ease, box-shadow 0.3s ease; /* Плавные переходы */
    }

    /* Эффект при наведении на карточку */
    .card:hover {
        transform: translateY(-10px); /* Поднимаем карточку вверх при наведении */
        box-shadow: 0 6px 15px rgba(0, 0, 0, 0.2); /* Увеличиваем тень */
    }

    /* Стиль для карточки с серым фоном */
    .bruh {
        width: 250px;
        background-color: #ccc; /* Серый фон */
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        padding: 20px;
        margin: 10px;
        text-align: center;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    /* Эффект при наведении на серую карточку */
    .bruh:hover {
        transform: translateY(-10px);
        box-shadow: 0 6px 15px rgba(0, 0, 0, 0.2);
    }

    /* Стиль для пагинации */
    .Paginate {
        text-align: center;
        margin-top: 20px;
    }

    .Paginate .pagination {
        display: inline-flex;
        list-style: none;
        padding: 0;
    }

    .Paginate .pagination li {
        margin: 0 5px;
    }

    .Paginate .pagination a, .Paginate .pagination span {
        text-decoration: none;
        display: inline-block;
        padding: 8px 16px;
        background-color: #007BFF; /* Цвет фона для кнопок */
        color: #fff;
        border-radius: 5px;
        transition: background-color 0.3s ease;
    }

    /* Эффект при наведении на кнопки пагинации */
    .Paginate .pagination a:hover, .Paginate .pagination span:hover {
        background-color: #0056b3;
    }

    /* Стиль для активной страницы пагинации */
    .Paginate .pagination .active a {
        background-color: #28a745; /* Цвет для активной страницы */
        color: #fff;
    }

    /* Стиль для кнопки пагинации "disabled" */
    .Paginate .pagination .disabled a {
        background-color: #e0e0e0;
        color: #9e9e9e;
        cursor: not-allowed;
    }

</style>
</body>
</html>
