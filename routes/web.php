<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SuchiController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PaymentController;

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
Route::get('/store', [SuchiController::class, 'index']);
Route::get('/about', [SuchiController::class, 'about']);
Route::get('/product', [SuchiController::class, 'product']);
Route::post('/product/save', [SuchiController::class, 'save']);
Route::get('/product/view', [BlogController::class, 'view']);
Route::post('/product/view/{id}', [BlogController::class, 'pages']);
Route::get('/search', [SuchiController::class, 'search']);
Route::get('/recommendation', [SuchiController::class, 'recommendation']);
Route::get('/skin-concern', [SuchiController::class, 'skinConcern']);
Route::get('/checkout', [SuchiController::class, 'checkout']);
Route::get('/wishlist', [SuchiController::class, 'wishlist']);
Route::post('/wishlist/add', [SuchiController::class, 'addToWishlist']);
Route::post('/wishlist/remove', [SuchiController::class, 'removeFromWishlist']);
Route::post('/cart/add', [SuchiController::class, 'addToCart']);
Route::post('/cart/remove', [SuchiController::class, 'removeFromCart']);
Route::get('/login', [AuthController::class, 'loginPage'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/logout', [AuthController::class, 'logout']);
Route::get('/register', [AuthController::class, 'registerPage']);
Route::post('/register', [AuthController::class, 'register']);
Route::get('/test', [SuchiController::class, 'test']);


    

Route::get('/home', function () {
    return view('home');
});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/dashboard', [SuchiController::class, 'adminDashboard']);
    Route::get('/admin/customers', [SuchiController::class, 'adminCustomers']);
    Route::get('/admin/products', [SuchiController::class, 'adminProducts']);
    Route::post('/admin/products/add', [SuchiController::class, 'adminAddProduct']);
    Route::post('/admin/products/edit/{id}', [SuchiController::class, 'adminEditProduct']);
    Route::post('/admin/products/delete/{id}', [SuchiController::class, 'adminDeleteProduct']);
});

//->middleware('auth');//

// Payment Routes
Route::middleware('auth')->group(function () {
    Route::post('/payment/initiate', [PaymentController::class, 'initiatePayment'])->name('payment.initiate');
    Route::get('/payment/success', [PaymentController::class, 'paymentSuccess'])->name('payment.success');
    Route::get('/payment/failure', [PaymentController::class, 'paymentFailure'])->name('payment.failure');
});
