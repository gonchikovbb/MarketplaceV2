<?php

use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderItemController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('home', ['title' => 'Home']);
})->name('home');

Route::get('/manager', function () {
    return view('manager', ['title' => 'manager']);
})->name('manager');

Route::get('/guestProducts', [ProductController::class, 'index'])->name('guestProducts');

Route::group(['middleware' => 'auth'], function () {
    Route::resource('orders', 'OrderController');
    Route::get('/create-order', [OrderController::class, 'index'])->name('orders.add');
    Route::post('/add-order', [OrderController::class, 'store'])->name('orders.store');
    Route::get('/orders/{order}/edit', [OrderController::class, 'edit'])->name('orders.edit');
    Route::put('/orders/{order}', [OrderController::class, 'update'])->name('orders.update');
    Route::delete('/orders/{order}', [OrderController::class, 'delete'])->name('orders.delete');
    Route::get('/orders', [OrderController::class, 'showOrders'])->name('orders.showOrders');
});

Route::get('/manager', [UserController::class, 'index'])->name('manager');
Route::post('/manager', [UserController::class, 'signIn']);
Route::post('/sign-out', [UserController::class, 'signOut'])->name('signOut');

