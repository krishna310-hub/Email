<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Middleware\adminLogin;

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
// Route::group(['middleware' => ['web', 'auth', 'check_email_exists']], function () {
//     Route::get('/loginSuccess', [AuthController::class, 'loginSuccess']);
// });

Route::middleware(['check_email_exists'])->group(function () {
    Route::get('/auth/loginSuccess', [AuthController::class, 'loginSuccess'])->name('loginSuccess');
    // Route::post('/auth/loginSuccess', [AuthController::class, 'loginData']);
});

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'loginData'])->name('loginData');

Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'store'])->name('register');

Route::get('/forgot', [AuthController::class, 'forgot'])->name('forgot');
Route::post('/auth/otp', [AuthController::class, 'generateAndSendOtp']);

Route::get('/otp', [AuthController::class, 'otp'])->name('otp');
Route::post('/auth/newpass', [AuthController::class, 'verifyOtp']);

Route::get('/newpass', [AuthController::class, 'newpass'])->name('newpass');
Route::post('/auth/login', [AuthController::class, 'updatePassword']);

// Route::get('/auth/loginSuccess', [AuthController::class, 'loginSuccess'])->middleware('check_email_exists');



