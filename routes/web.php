<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SuchiController;


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
Route::get('/', [SuchiController::class, 'index']);
Route::get('/about', [SuchiController::class, 'about']);
Route::get('/product', [SuchiController::class, 'product']);
Route::post('/product/save', [SuchiController::class, 'save']);
Route::get('/product/view/{id}', [BlogController::class, 'view']);

Route::get('/recommendation', [SuchiController::class, 'recommendation']);

    

Route::get('/', function () {
    return view('home');
});
