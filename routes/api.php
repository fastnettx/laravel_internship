<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\BrandController;
use App\Http\Controllers\API\CategorieController;
use App\Http\Controllers\API\Payment_methodsController;
use App\Http\Controllers\API\PostController;
use App\Http\Controllers\API\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::namespace('API')->group(function() {
    Route::post('register', [AuthController::class, 'register']);
    Route::post('token', [AuthController::class, 'token']);
});

Route::resource('category', CategorieController::class)->middleware('auth:sanctum');
Route::resource('post', PostController::class)->middleware('auth:sanctum');
Route::resource('product', ProductController::class)->middleware('auth:sanctum');
Route::resource('payment', Payment_methodsController::class)->middleware('auth:sanctum');
Route::resource('brand', BrandController::class)->middleware('auth:sanctum');
