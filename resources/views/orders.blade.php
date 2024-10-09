    <a href="/products" style="text-decoration: none;">Назад</a>
    <h1>Мои Заказы</h1>

    @if($orders->isEmpty())
        <p>У вас пока нет заказов.</p>
    @else
        <ul>
            @foreach($orders as $order)
                <li>Заказ на продукт № {{ $order->product_id }} (Количество: {{ $order->quantity }})</li>
            @endforeach
        </ul>
    @endif