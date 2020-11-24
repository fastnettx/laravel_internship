<?php


use App\Http\Controllers\WEB\AuthController;
use App\Http\Controllers\WEB\BasketController;
use App\Http\Controllers\WEB\BrandController;
use App\Http\Controllers\WEB\CategorieController;
use App\Http\Controllers\WEB\OrderController;
use App\Http\Controllers\WEB\PostController;
use App\Http\Controllers\WEB\ProductController;
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
    return view('main');
});

Route::get('/register', [AuthController::class, 'create'])->name('register');;
Route::post('/register', [AuthController::class, 'register'])->name('auth.register');
Route::get('/login', [AuthController::class, 'login'])->name('auth.login');
Route::post('/login', [AuthController::class, 'authenticate'])->name('auth.authenticate');
Route::get('/logout', [AuthController::class, 'logout'])->name('auth.logout');

Route::group(['prefix' => 'blog'], function () {
    Route::get('/', [PostController::class, 'index'])->name('post.index');
    Route::get('//{id}', [PostController::class, 'show'])->name('post.show');
});

Route::group(['prefix' => 'category'], function () {
    Route::get('/', [CategorieController::class, 'index'])->name('category.index');
    Route::post('/', [CategorieController::class, 'filter'])->name('category.filter');
    Route::get('/{id}', [CategorieController::class, 'show'])->name('category.show');
});

Route::group(['prefix' => 'product'], function () {
    Route::get('/', [ProductController::class, 'index'])->name('product.index');
    Route::get('/{id}', [ProductController::class, 'show'])->name('product.show');
});

Route::group(['prefix' => 'brand'], function () {
    Route::get('/', [BrandController::class, 'index'])->name('brand.index');
    Route::get('/{id}', [BrandController::class, 'show'])->name('brand.show');
});
Route::group(['prefix' => 'order'], function () {
    Route::get('/{id}', [OrderController::class, 'create'])->name('order.create')->middleware('auth');
    Route::post('/', [OrderController::class, 'add'])->name('order.add')->middleware('auth');
});

Route::group([
    'middleware' => ['check.basket', 'auth'],
    'prefix' => 'basket'
], function () {
    Route::get('/', [BasketController::class, 'create'])->name('basket.create');
    Route::post('/', [BasketController::class, 'send'])->name('basket.send');
    Route::get('/empty', [BasketController::class, 'empty'])->name('basket.empty');
});
