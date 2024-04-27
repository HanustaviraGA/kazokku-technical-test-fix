<?php

use Illuminate\Support\Facades\Route;
use Modules\Exchange\App\Http\Controllers\ExchangeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::prefix('backoffice/exchange')->group(function() {
    Route::get('/', [ExchangeController::class, 'index'])->name('exchange.index');
    Route::post('create', [ExchangeController::class, 'create'])->name('exchange.create');
    Route::post('read', [ExchangeController::class, 'read'])->name('exchange.read');
    Route::put('update', [ExchangeController::class, 'update'])->name('exchange.update');
    Route::delete('delete', [ExchangeController::class, 'delete'])->name('exchange.delete');
    // Custom
    Route::post('init_table', [ExchangeController::class, 'init_table'])->name('exchange.init_table');
    Route::post('init_table_detail', [ExchangeController::class, 'init_table_detail'])->name('exchange.init_table_detail');
    Route::post('sync', [ExchangeController::class, 'sync'])->name('exchange.sync');
});
