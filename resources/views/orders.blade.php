    <a href="/products" style="text-decoration: none;">Назад</a>
    <h1>Мои Заказы</h1>

    @if($orders->isEmpty())
        <p>У вас пока нет заказов.</p>
    @else
    {{ $orders->links() }}
    <table>
    <thead>
        <tr>
            <th>Номер заказа</th>
            <th>Продукт</th>
            <th>Количество</th>
            <th>Статус</th>
        </tr>
    </thead>
    <tbody>
        @foreach($orders as $order)
            <tr>
                <td>{{ $order->id }}</td>
                <td>{{ $order->product->name ?? 'Не указано' }}</td>
                <td>{{ $order->quantity }}</td>
                <td>{{ $order->status }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
    @endif
    <style>
    table, td, th {
  border-collapse: collapse;
  border: 2px solid #245488;
}
</style>