<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ProdutoController;


// Rota para a página inicial
Route::get('/', function () {
    return view('welcome');
});

// Grupo de rotas para usuários não autenticados (visitantes)
Route::middleware('guest')->group(function () {
    // Rotas de registro
    Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [RegisterController::class, 'register']);

    // Rotas de login
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);
});

// Grupo de rotas para usuários autenticados (logados)
Route::middleware('auth')->group(function () {
    // Rota de logout
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

    // Rota para o dashboard, a página principal após o login
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::resource('produtos', ProdutoController::class);
    
    
});