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
    Route::get('/role_page', [UserController::class,'role_page']);
    
    Route::post('/role_add', [UserController::class,'role_add']);

Route::get('/role_delete/{id}', [UserController::class,'role_delete']);

Route::get('/role_read/{id}', [UserController::class,'role_read']);

Route::post('/role_update/{id}', [UserController::class,'role_update']);

Route::get('/input_user', [UserController::class,'input_user']);

Route::post('/store_user', [UserController::class,'store_user']);

Route::get('/show_user', [UserController::class,'show_user']);

Route::get('/user_delete/{id}', [UserController::class,'user_delete']);

Route::get('/user_read/{id}', [UserController::class,'user_read']);

Route::post('/user_edit/{id}', [UserController::class,'user_edit']);

// Management Databases Route
Route::get('/show_data', [ManagementDataController::class,'show_data']);

Route::post('/store_data', [ManagementDataController::class,'store_data']);

    // Define a GET route for the root URL ('/')
    Route::get('/', function () {
        // Return a view named 'index' when accessing the root URL
        return view('index');
    });

    // Define a GET route with dynamic placeholders for route parameters
    Route::get('{routeName}/{name?}', [HomeController::class, 'pageView']);
});


