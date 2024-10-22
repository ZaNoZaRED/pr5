<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id(); // автоинкрементный ID
            $table->string('name'); // имя пользователя
            $table->string('email')->unique(); // уникальный email
            $table->timestamp('email_verified_at')->nullable(); // время проверки email
            $table->string('password'); // пароль
            $table->rememberToken(); // токен для запоминания пользователя
            $table->timestamps(); // времена создания и обновления записи
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
