<?php

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

// Route::get('/', function () {
//     return view('app');
// });

Route::get('/', [\App\Http\Controllers\MainController::class, 'home'])->name('home');

Route::post('deleteCar', [\App\Http\Controllers\CarsController::class, 'deleteCar']);

Route::get('update', [\App\Http\Controllers\ClientsController::class, 'update']);

Route::post('updateClient', [\App\Http\Controllers\ClientsController::class, 'updateClient']);