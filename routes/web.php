<?php


use App\Http\Controllers\WEB\AuthController;
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

Route::get('/register', [AuthController::class, 'create']);
Route::post('/register', [AuthController::class, 'register'])->name('auth.register');
Route::get('/login', [AuthController::class, 'login'])->name('auth.login');
Route::post('/login', [AuthController::class, 'authenticate'])->name('auth.authenticate');
Route::get('/logout', [AuthController::class, 'logout'])->name('auth.logout');

Route::get('blog', [PostController::class, 'index'])->name('post.index');
Route::get('blog/{id}', [PostController::class, 'show'])->name('post.show');

Route::get('category', [CategorieController::class, 'index'])->name('category.index');
Route::get('category/{id}', [CategorieController::class, 'show'])->name('category.show');

Route::get('product', [ProductController::class, 'index'])->name('product.index');
Route::get('product/{id}', [ProductController::class, 'show'])->name('product.show');

Route::get('brand', [BrandController::class, 'index'])->name('brand.index');
Route::get('brand/{id}', [BrandController::class, 'show'])->name('brand.show');

Route::get('/order/{id}', [OrderController::class, 'create'])->name('order.create')->middleware('auth');
Route::post('/order', [OrderController::class, 'buy'])->name('order.buy')->middleware('auth');
Route::get('/basket', [OrderController::class, 'basket'])->name('order.basket')->middleware('auth');
