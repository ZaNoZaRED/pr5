<?php

namespace App\Http\Controllers;

use App\Models\Login;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
public function create()
{
    return view('auth.login');
}
public function store(Request $request)
{
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    // Попытка входа пользователя
    if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
        // Успешный вход, перенаправление на основную страницу
        return redirect('/products')->with('success', 'Вы успешно вошли в систему!');
    }

    // Ошибка входа, перенаправление обратно с ошибкой
    return redirect()->back()->withErrors([
        'email' => 'Эти учетные данные не соответствуют нашим записям.',
    ])->withInput();
}
}
