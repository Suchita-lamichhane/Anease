<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SuchiController;
use App\Http\Controllers\AuthController;

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
Route::get('/product/view', [BlogController::class, 'view']);
Route::post('/product/view/{id}', [BlogController::class, 'pages']);
Route::get('/recommendation', [SuchiController::class, 'recommendation']);
Route::get('/login', [AuthController::class, 'loginPage'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'registerPage']);
Route::post('/register', [AuthController::class, 'register']);

    

Route::get('/home', function () {
    return view('check');
})->middleware('auth');
