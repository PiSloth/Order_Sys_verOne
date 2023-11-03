<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Order\OrderController;
use App\Http\Controllers\Order\PhotoController;
use App\Http\Controllers\Order\FilterController;
use App\Http\Controllers\Order\CommentController;


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

Route::get('/', [OrderController::class, 'index']);

Route::post('/ack', [OrderController::class, 'ack']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('wel', function(){
    return view('welcome');
});

Route::get('/orders/add', [OrderController::class, 'add']);

Route::post('/orders/add', [OrderController::class, 'create']);

Route::get('/orders/view/{id}', [OrderController::class, 'view']);

Route::post('/orders/view/{id}', [OrderController::class, 'update']);

Route::post('/comments/add', [CommentController::class, 'add']);

Route::post('/photo/upload', [PhotoController::class, 'upload']);

Route::get('/orders/new', [FilterController::class,'new']) ;

Route::get('/orders/ack', [FilterController::class,'ack']) ;

Route::get('/orders/pending', [FilterController::class,'pending']) ;

Route::get('/orders/approved', [FilterController::class,'approved']) ;

Route::get('/orders/ordered', [FilterController::class,'ordered']) ;

Route::get('/orders/ar', [FilterController::class,'ar']) ;

Route::get('/orders/success', [FilterController::class,'closedorder']) ;

Route::get('/orders/unavailable', [FilterController::class,'unavailable']) ;

Route::get('/orders/gold', [FilterController::class, 'gold']);

Route::get('/orders/18K', [FilterController::class, 'K18']);

Route::get('/orders/diamond', [FilterController::class, 'diamond']);

Route::get('/orders/gems', [FilterController::class, 'gems']);

Route::get('orders/filters', [
    FilterController::class, 'dynamicfilter'
]);



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
