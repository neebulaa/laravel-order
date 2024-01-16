<?php

use App\Models\Item;
use App\Models\Buyer;
use App\Models\Order;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\BuyerController;
use App\Http\Controllers\OrderController;

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



Route::middleware('auth')->group(function(){
    Route::get('/', function(){
        return view('home', [
            'title' => "Home page"
        ]);
    });
    Route::post('/logout', [AuthController::class, 'logout']);


    // items
    Route::middleware('admin')->group(function(){
        Route::get('/items', [ItemController::class, 'index']);
        Route::get('/items/create', [ItemController::class, 'create']);
        Route::post('/items', [ItemController::class, 'store']);
        Route::get('/items/{id}/edit', [ItemController::class, 'edit']);
        Route::put('/items/{item}', [ItemController::class, 'update']);
        Route::delete('/items/{id}', [ItemController::class, 'destroy']);
    });

    // buyers
    Route::get('/buyers', [BuyerController::class, 'index']);

    // orders
    Route::get('/orders', [OrderController::class, 'index']);
    Route::get('/orders/create', [OrderController::class, 'create']);
    Route::post('/orders', [OrderController::class, 'store']);
    Route::get('/orders/{order_id}', [OrderController::class, 'show']);
});

Route::middleware('guest')->group(function(){
    Route::get('/login', [AuthController::class, 'show_login'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/register', [AuthController::class, 'show_register']);
    Route::post('/register', [AuthController::class, 'register']);
});