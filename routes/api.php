<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\TabProdutosController;
use App\Http\Controllers\TabVendedoresController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/
Route::get('/unauthenticated', function () {
    return ['error' => 'Usuário não está logado'];
})->name('login');

Route::post('auth/login', [AuthController::class, 'login']);
Route::get('auth/logout', [AuthController::class, 'logout']);

Route::middleware('auth:api')->post('/vendedores', [TabVendedoresController::class, 'createSeller']);
Route::get('/vendedores', [TabVendedoresController::class, 'listAllSellers']);
Route::middleware('auth:api')->post('/produtos', [TabProdutosController::class, 'createProduct']);
Route::get('/produtos', [TabProdutosController::class, 'allProduct']);
