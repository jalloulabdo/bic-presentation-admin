<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\VendeurController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

 
Route::resource('users',UserController::class);
Route::resource('products',ProductController::class);
Route::resource('categories',CategoryController::class);
Route::resource('vendeurs',VendeurController::class);
Route::get('getVendeur/{serial}',[VendeurController::class,'getVendeur'])->name('getVendeur');
 
