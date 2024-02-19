<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\SaleController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [StoreController::class, 'index']);

Route::post('/items', [StoreController::class, 'addItem'])->name('store.item');

Route::post('/sell/{itemId}', [StoreController::class, 'sellItem'])->name('sell.item');

Route::get('/sale', [SaleController::class, 'index'])->name('sale.page');
