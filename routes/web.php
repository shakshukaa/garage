<?php

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
    return view('home');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/cars', [App\Http\Controllers\CarController::class, 'index'])->name('cars');
Route::get('/cars/create', [App\Http\Controllers\CarController::class, 'create'])->name('createCar');
Route::post('/cars/create', [App\Http\Controllers\CarController::class, 'saveCreate'])->name('saveCarCreate');
Route::get('/cars/{id}', [App\Http\Controllers\CarController::class, 'car'])->name('car');
Route::get('/cars/{id}/edit', [App\Http\Controllers\CarController::class, 'edit'])->name('carEdit');
Route::get('/cars/{id}/delete', [App\Http\Controllers\CarController::class, 'delete'])->name('deleteCar');
Route::post('/cars/{id}/edit', [App\Http\Controllers\CarController::class, 'saveEdit'])->name('saveCarEdit');
Route::get('/cars/{id}/rental', [App\Http\Controllers\CarController::class, 'rental'])->name('carRental');
Route::post('/cars/{id}/rental', [App\Http\Controllers\CarController::class, 'saveRental'])->name('saveCarRental');
Route::get('/cars/{carId}/rental/{rentalId}/complete', [App\Http\Controllers\CarController::class, 'completeRental'])->name('completeRental');
Route::get('/cars/{carId}/rental/{rentalId}/delete', [App\Http\Controllers\CarController::class, 'deleteRental'])->name('deleteRental');

Route::get('/customers', [App\Http\Controllers\CustomerController::class, 'index'])->name('customers');
Route::get('/customers/create', [App\Http\Controllers\CustomerController::class, 'create'])->name('createCustomer');
Route::post('/customers/create', [App\Http\Controllers\CustomerController::class, 'saveCreate'])->name('saveCustomerCreate');
Route::get('/customers/{id}/delete', [App\Http\Controllers\CustomerController::class, 'delete'])->name('deleteCustomer');
Route::get('/customers/{id}/edit', [App\Http\Controllers\CustomerController::class, 'edit'])->name('customerEdit');
Route::post('/customers/{id}/edit', [App\Http\Controllers\CustomerController::class, 'saveEdit'])->name('saveCustomerEdit');
