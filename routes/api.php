<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Auth\RegisteredUserController;
use Laravel\Sanctum\Http\Controllers\CsrfCookieController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

Route::get('/sanctum/csrf-cookie', [CsrfCookieController::class, 'show']);
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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::post('/register', [RegisteredUserController::class, 'store']);

// Login route
Route::post('/login', [AuthenticatedSessionController::class, 'store'])->name('login');

// Logout route
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

Route::middleware('auth:sanctum')->group(function () {
    // Categories CRUD
    Route::apiResource('categories', CategoryController::class);

    // Products CRUD
    Route::apiResource('products', ProductController::class);

    // Order Products
    Route::post('orders', [OrderController::class, 'store']);
});