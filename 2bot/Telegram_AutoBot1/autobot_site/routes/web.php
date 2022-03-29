<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\TelegramUserController;
use App\Models\TelegramUser;
use App\Http\Controllers\CheckCarsController;
use App\Models\CheckCars;
use Illuminate\Support\Facades\Route;

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
    return view('auth');
})->name('auth');

Route::apiResource('telegram_user', TelegramUserController::class)->middleware('role');

Route::post('telegram_user/update', [TelegramUserController::class, 'update'])->middleware('role');

Route::post('login', [AuthController::class, 'login'])->name("login");

Route::get('welcome', function(){
    return view('welcome');
})->name("index")->middleware('role');

Route::post('logout', [AuthController::class, 'logout'])->name('logout');



Route::apiResource('check_cars', CheckCarsController::class)->middleware('role');

Route::post('check_cars/update', [CheckCarsController::class, 'update'])->middleware('role');



Route::apiResource('Reg_cars', CheckCarsController::class)->middleware('role');

Route::post('Reg_cars/update', [CheckCarsController::class, 'update'])->middleware('role');


Route::get('/CheckCars', function () {
    return view('CheckCars');
})->name('CheckCars')->middleware('role');


Route::get('/Reg_cars', function () {
    return view('Reg_cars');
})->name('Reg_cars')->middleware('role');