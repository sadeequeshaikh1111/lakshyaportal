<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\basic_details_controller;
use App\Http\Controllers\location_controller;
use App\Http\Controllers\educational_details_controllers;
use App\Http\Controllers\documents_controller;
use App\Http\Controllers\Exam_details_controller;




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
//Educational details routes
Route::post('save_edu_details', [App\Http\Controllers\educational_details_controllers::Class, 'save_edu_details'])->name('save_edu_details.post');
Route::get('get_eduDetails/{email}/{flag}',[App\Http\Controllers\educational_details_controllers::Class,'get_eduDetails']);
Route::get('get_eduDetails_ajax',[App\Http\Controllers\educational_details_controllers::Class,'get_eduDetails_ajax'])->name('get_eduDetails_ajax.get');
Route::delete('delete_edu_detail',[App\Http\Controllers\educational_details_controllers::Class,'delete_edu_detail'])->name('delete_edu_detail.delete');


//Upload Documents route
Route::get('load_docs',[App\Http\Controllers\documents_controller::Class,'load_docs'])->name('load_docs.get');
Route::post('save_document_details', [App\Http\Controllers\documents_controller::Class, 'save_document_details'])->name('save_document_details.post');
Route::get('fetch_doc_details',[App\Http\Controllers\documents_controller::Class,'fetch_doc_details'])->name('fetch_doc_details.get');
Route::delete('delete_doc_detail',[App\Http\Controllers\documents_controller::Class,'delete_doc_detail'])->name('delete_doc_detail.delete');
//Apply Exams
Route::get('load_exams',[App\Http\Controllers\Exam_details_controller::Class,'load_exams'])->name('load_exams.get');
Route::post('apply_exam', [App\Http\Controllers\Exam_details_controller::Class, 'apply_exam'])->name('apply_exam.post');
Route::get('fetch_applied_exams',[App\Http\Controllers\Exam_details_controller::Class,'fetch_applied_exams'])->name('fetch_applied_exams.get');
Route::delete('Delete_applied_exam',[App\Http\Controllers\Exam_details_controller::Class,'Delete_applied_exam'])->name('Delete_applied_exam.delete');



require __DIR__.'/auth.php';