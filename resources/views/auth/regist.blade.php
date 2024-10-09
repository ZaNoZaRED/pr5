<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Регистрация</title>
</head>
<body>
    <header>
        <nav>
            <a href="{{ route('login') }}">Вход</a>
        </nav>
    </header>

    <h1>Регистрация</h1>
    <form action="{{ route('register') }}" method="POST">
        @csrf
        <label for="name">Имя:</label>
        <input type="text" name="name" required><br>
        
        <label for="email">Email:</label>
        <input type="email" name="email" required><br>

        <label for="password">Пароль:</label>
        <input type="password" name="password" required><br>
        
        <label for="password_confirmation">Подтвердите пароль:</label>
        <input type="password" name="password_confirmation" required><br>

        <button type="submit">Зарегистрироваться</button>
    </form>
</body>
</html>