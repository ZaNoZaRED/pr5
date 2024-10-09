<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller {
public function store(Request $request)
{
    $request->validate([
        'product_id' => 'required|exists:products,id',
        'quantity' => 'required|integer|min:1'
    ]);

    // Логика для создания заказа
    Order::create([
        'user_id' => Auth::id(),
        'product_id' => $request->product_id,
        'quantity' => $request->quantity,
        // Дополнительно можно добавить пользователя и другие поля
    ]);

    return redirect()->route('products')->with('success', 'Заказ успешно создан!');
}
public function index()
{
    // Получаем заказы текущего пользователя
    $orders = Order::where('user_id', Auth::id())->get();
    
    return view('orders', compact('orders'));
}
}