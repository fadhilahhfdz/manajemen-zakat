<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ZakatFitrahController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Auth
Route::get('/register', [AuthController::class, 'index']);
Route::post('/register', [AuthController::class, 'store']);
Route::post('/login', [AuthController::class, 'login']);
Route::get('/logout', [AuthController::class, 'logout']);
Route::get('/login', function() {
    return Auth::check() ? redirect('/admin/dashboard') : view('admin.auth.login');
})->middleware('guest')->name('login');

// Admin
Route::group(['middleware' => ['auth']], function() {
    Route::get('/admin/dashboard', function() {
        return view('admin.auth.dashboard');
    });

    // Zakat Fitrah
    Route::get('/admin/zakat-fitrah', [ZakatFitrahController::class, 'index']);
    Route::post('/admin/zakat-fitrah/create', [ZakatFitrahController::class, 'store']);
    Route::get('/admin/zakat-fitrah/edit/{id}', [ZakatFitrahController::class, 'edit']);
    Route::put('/admin/zakat-fitrah/edit/{id}', [ZakatFitrahController::class, 'update']);
    Route::get('/admin/zakat-fitrah/delete/{id}', [ZakatFitrahController::class, 'destroy']);
});