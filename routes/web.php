<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\basic_details_controller;
use App\Http\Controllers\location_controller;


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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::get('getBasicDetails',[App\Http\Controllers\basic_details_controller::Class,'getBasicDetails']);
Route::get('getLocations/{type}', [App\Http\Controllers\location_controller::Class,'get_locations']);
Route::put('save_basic_details', [App\Http\Controllers\basic_details_controller::Class, 'save_basic_details'])->name('save_basic_details.put');

require __DIR__.'/auth.php';