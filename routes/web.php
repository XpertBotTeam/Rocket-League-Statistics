<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\CustomAuthController;

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
    if (Session::has('loginId'))
        return view('dashboard');
    return view('auth.login');
});

Route::get('/login', [CustomAuthController::class, 'login'])->middleware('AlreadyLoggedIn');


Route::get('/register', [CustomAuthController::class, 'register'])->middleware('AlreadyLoggedIn');

Route::post('/register-user', [CustomAuthController::class, 'registerUser'])->name('register-user');

Route::post('/login-user', [CustomAuthController::class, 'loginUser'])->name('login-user');

Route::get('/dashboard', [CustomAuthController::class, 'dashboard'])->middleware('isLoggedIn');

Route::get('/logout', [CustomAuthController::class, 'logout']);


Route::get('/showdata', [CustomAuthController::class, 'showData'])->name('showdata');


Route::get('/showWins', [CustomAuthController::class, 'showWins'])->name('showWins');
Route::get('/showMVPS', [CustomAuthController::class, 'showMVPS'])->name('showMVPS');
Route::get('/showGoals', [CustomAuthController::class, 'showGoals'])->name('showGoals');
Route::get('/showAssists', [CustomAuthController::class, 'showAssists'])->name('showAssists');
Route::get('/showSaves', [CustomAuthController::class, 'showSaves'])->name('showSaves');
Route::get('/showShots', [CustomAuthController::class, 'showShots'])->name('showShots');
