<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExitController extends Controller
{
        /**
     * Выход пользователя из системы.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        // Выход из системы
        Auth::logout();

        // Можно очистить сессию, если нужно
        $request->session()->invalidate();

        // Перенаправление пользователя на страницу входа или главную страницу
        return redirect('products')->with('success', 'Вы успешно вышли из системы.');
}
}