<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AdminController extends Controller
{
    public function index()
    {
        return view('admin');
    }
    public function show()
    {
        $orders = Order::cursorPaginate(10);
        if (!Auth::check() || (Auth::user()->role !== 'admin')) {
            return redirect('/products')->with('error', 'You do not have admin access.');
        }
        return view('admin', compact('orders'));
    }
    public function update(Request $request)
    {
        $order = Order::find($request->id);
    
        // Проверяем, что заказ найден
        if ($order) {
            // Меняем статус на "Одобрен", если он "Новый"
            if ($order->status === 'новый' && $order->product->quantity < $order->quantity) {
                $order->status = 'одобрен';
                $order->save();
                return redirect()->route('admin.orders')->with('success', 'Статус заказа обновлён на "Одобрен".');
            } 
            // Меняем статус на "Доставлен", если он "Одобрен"
            elseif ($order->status === 'одобрен') {
                $order->status = 'доставлен';
                $order->save();
                return redirect()->route('admin.orders')->with('success', 'Статус заказа обновлён на "Доставлен".');
            }
            
            elseif ($order->status === 'новый' && $order->product->quantity >= $order->quantity) {
                return redirect()->route('admin.orders')->with('success', 'Недостаточно единиц товара в складе.');
            }
            else {
                return redirect()->route('admin.orders')->with('error', 'Заказ уже одобрен.');
            }
        } else {
            return redirect()->route('admin.orders')->with('error', 'Заказ не найден.');
        }
    }
}