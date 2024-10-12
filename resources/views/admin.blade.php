<div class="container">
    <h1>Административная панель</h1>
    <table class="table">
        <tbody>
        <h1>Заказы</h1>
    <table>
        <thead>
            <tr>
                <th>Название товара</th>
                <th>Количество</th>
                <th>Дата создания</th>
                <th>E-mail пользователя</th>
                <th>Статус</th>
            </tr>
        </thead>
        <tbody>
            @foreach($orders as $order)
                <tr>
                    <td>{{ $order->product->name ?? 'Неизвестно' }}</td>
                    <td>{{ $order->quantity }}</td>
                    <td>{{ $order->created_at->format('Y-m-d H:i:s') }}</td>
                    <td>{{ $order->user->email ?? 'Неизвестно' }}</td>
                    <td>
                    {{$order->status}}
                        @if ($order->status === 'новый' && $order->product->amount < $order->quantity) 
                        <span>Нехватка товара</span>
                        @elseif ($order->status === 'новый' && $order->product->amount >= $order->quantity)
                            <form action="{{ route('admin.orders', ['id' => $order->id]) }}" method="POST" style="display:inline;">
                                @csrf
                                <button type="submit" class="btn btn-success">Одобрить</button>
                            </form>
                        @elseif ($order->status === 'одобрен')
                        <form action="{{ route('admin.orders', ['id' => $order->id]) }}" method="POST" style="display:inline;">
                                @csrf
                                <button type="submit" class="btn btn-success">Доставлен</button>
                            </form>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
        </tbody>
    </table>
</div>
<style>
    table, td, th {
  border-collapse: collapse;
  border: 2px solid #245488;
}
</style>