<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;



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
    return view('welcome');
});


//pivotproduct
Route::get('/product',[ProductController::class,'index']);
Route::post('/addproduct', [ProductController::class, 'addproduct']);
Route::post('/viewproduct', [ProductController::class, 'viewproduct']);
Route::post('/editproduct', [ProductController::class, 'editproduct']);
Route::post('/updateproduct', [ProductController::class, 'updateproduct']);
Route::post('/deleteproduct', [ProductController::class, 'deleteproduct']);