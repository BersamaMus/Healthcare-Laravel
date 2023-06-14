<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
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

Route::get('/',[HomeController::class, 'index']);

Route::get('/home',[HomeController::class, 'redirect']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

//Admin Manage Doctor

Route::get('/add_doctor_view',[AdminController::class, 'addview']);
Route::post('/upload_doctor',[AdminController::class, 'upload']);
Route::get('/showdoctor',[AdminController::class, 'showdoctor']);
Route::get('/deletedoctor/{id}',[AdminController::class, 'deletedoctor']);
Route::get('/updatedoctor/{id}',[AdminController::class, 'updatedoctor']);
Route::post('/editdoctor/{id}',[AdminController::class, 'editdoctor']);

//Home Appointment
Route::post('/appointment',[HomeController::class, 'appointment']);
Route::get('/myappointment',[HomeController::class, 'myappointment']);
Route::get('/cancel_appoint/{id}',[HomeController::class, 'cancel_appoint']);

//Admin Manage Appointment
Route::get('/showappointment',[AdminController::class, 'showappointment']);
Route::get('/approved/{id}',[AdminController::class, 'approved']);
Route::get('/rejected/{id}',[AdminController::class, 'rejected']);


//Admin Manage Posts
Route::get('/add_post_view',[AdminController::class, 'addpost']);
Route::post('/upload_post',[AdminController::class, 'uploadpost']);
Route::get('/showpost',[AdminController::class, 'showpost']);
Route::get('/deletepost/{id}',[AdminController::class, 'deletepost']);
Route::get('/updatepost/{id}',[AdminController::class, 'updatepost']);
Route::post('/editpost/{id}',[AdminController::class, 'editpost']);
