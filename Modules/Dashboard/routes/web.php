<?php

use Illuminate\Support\Facades\Route;
use Modules\Dashboard\App\Http\Controllers\DashboardController;

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

Route::prefix('backoffice/dashboard')->group(function() {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');
    Route::post('create', [DashboardController::class, 'create'])->name('dashboard.create');
    Route::post('read', [DashboardController::class, 'read'])->name('dashboard.read');
    Route::put('update', [DashboardController::class, 'update'])->name('dashboard.update');
    Route::delete('delete', [DashboardController::class, 'delete'])->name('dashboard.delete');
});
