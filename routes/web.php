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
// главная страница
Route::get('/', [\App\Http\Controllers\MainController::class, 'home'])->name('home');

// удаление машины
Route::post('deleteCar', [\App\Http\Controllers\CarsController::class, 'deleteCar']);

// рендер страницы обновления данных о клиенте и его машинах
Route::get('update', [\App\Http\Controllers\ClientsController::class, 'update']);

// обновление данных
Route::post('updateClient', [\App\Http\Controllers\ClientsController::class, 'updateClient']);
Route::post('updateCar', [\App\Http\Controllers\CarsController::class, 'updateCar']);

// рендер страницы создания новых клиентов и машин
Route::get('create', [\App\Http\Controllers\ClientsController::class, 'create']);

// создание новых записей
Route::post('saveClient', [\App\Http\Controllers\ClientsController::class, 'saveClient']);
Route::post('saveCar', [\App\Http\Controllers\CarsController::class, 'saveCar']);

// получение клиентов для выпадающего списка
Route::post('clients', [\App\Http\Controllers\ClientsController::class, 'getClients']);