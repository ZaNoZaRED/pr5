<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User; // Не забудьте подключить модель User
use Illuminate\Support\Facades\Hash; // Для хеширования пароля
use Illuminate\Support\Facades\Validator; // Для валидации

class RegistController extends Controller
{
    public function create()
    {
        return view('auth.regist');
    }

    public function store (Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:4|confirmed',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Создание нового пользователя
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password), // Хеширование пароля
        ]);

        // Перенаправление после успешной регистрации
        return redirect('products')->with('success', 'Регистрация прошла успешно!');
    }
}
