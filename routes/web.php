<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ManagementDataController;

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


Auth::routes();


// Define a group of routes with 'auth' middleware applied
Route::middleware(['auth'])->group(function () {

        // Redirect to '/home' route    
    Route::get('redirects',  [UserController::class,'index']);

    Route::get('/home', [UserController::class,'index']);

    Route::get('/role_page', [UserController::class,'role_page'])->middleware(['auth', 'superadmin']);

    Route::post('/role_add', [UserController::class,'role_add'])->middleware(['auth', 'superadmin']);

Route::get('/role_delete/{id}', [UserController::class,'role_delete'])->middleware(['auth', 'superadmin']);

Route::get('/role_read/{id}', [UserController::class,'role_read'])->middleware(['auth', 'superadmin']);

Route::post('/role_update/{id}', [UserController::class,'role_update'])->middleware(['auth', 'superadmin']);

Route::get('/input_user', [UserController::class,'input_user'])->middleware(['auth', 'superadmin']);

Route::post('/store_user', [UserController::class,'store_user'])->middleware(['auth', 'superadmin']);

Route::get('/show_user', [UserController::class,'show_user'])->middleware(['auth', 'superadmin']);

Route::get('/user_delete/{id}', [UserController::class,'user_delete'])->middleware(['auth', 'superadmin']);

Route::get('/user_read/{id}', [UserController::class,'user_read'])->middleware(['auth', 'superadmin']);

Route::post('/user_edit/{id}', [UserController::class,'user_edit'])->middleware(['auth', 'superadmin']);

// Management Databases Route

Route::get('/update_data', [ManagementDataController::class,'update_data'])->middleware(['auth', 'pimpinan']);

Route::get('/input_data', [ManagementDataController::class,'input_data'])->middleware(['auth', 'pimpinan']);

Route::post('/store_data', [ManagementDataController::class,'store_data'])->middleware(['auth', 'pimpinan']);

Route::get('/show_data', [ManagementDataController::class,'show_data']);

Route::get('/approver_data', [ManagementDataController::class,'approver_data']);

// Operator Route
Route::get('/importexcel_operator/{id}', [HomeController::class,'importexcel_operator']);

// Penginputan Data Excel
Route::post('/importexcel', [ManagementDataController::class,'importexcel'])->name('importexcel');

Route::put('/update_status/{id}', [ManagementDataController::class,'update_status']);




// Delete and Update Data
Route::get('/data_delete/{id}', [ManagementDataController::class,'data_delete'])->middleware(['auth', 'pimpinan']);

Route::get('/data_read/{id}', [ManagementDataController::class,'data_read'])->middleware(['auth', 'pimpinan']);

Route::post('/data_edit/{id}', [ManagementDataController::class,'data_edit'])->middleware(['auth', 'pimpinan']);

    // Define a GET route for the root URL ('/')
    Route::get('/', [HomeController::class, 'index']);



    // Define a GET route with dynamic placeholders for route parameters
    Route::get('{routeName}/{name?}', [HomeController::class, 'pageView']);
});




