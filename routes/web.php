<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return redirect()->route('login');
});

Auth::routes(['register' => false, 'reset' => false, 'verify' => false]);

Route::prefix('admin')->middleware('is_admin')->group(function () {
    Route::get('home', [HomeController::class, 'adminHome'])->name('admin.home');

    // Users
    Route::resource('user', UserController::class);
});

Route::prefix('manager')->middleware('is_manager')->group(function () {
    Route::get('home', [HomeController::class, 'managerHome'])->name('manager.home');

    Route::resource('laporan', LaporanController::class);
    Route::resource('menu', MenuController::class);

    Route::get('print', [PDFController::class, 'print'])->name('manager.print');
});

Route::prefix('cashier')->middleware('is_cashier')->group(function () {
    Route::get('home', [HomeController::class, 'cashierHome'])->name('cashier.home');

    Route::resource('transaksi', TransaksiController::class);

});
