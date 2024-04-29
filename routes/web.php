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

    Route::get('/', function () {
        // Redirect to '/home' route
        return redirect('/home');
    });

    Route::get('/home', [UserController::class,'index']);

    Route::get('/role_page', [UserController::class,'role_page']);

    Route::post('/role_add', [UserController::class,'role_add']);

Route::get('/role_delete/{id}', [UserController::class,'role_delete']);

Route::get('/role_read/{id}', [UserController::class,'role_read']);

Route::post('/role_update/{id}', [UserController::class,'role_update']);

    Route::post('/cat_add', [UserController::class,'cat_add']);

Route::get('/cat_delete/{id}', [UserController::class,'cat_delete']);

Route::get('/cat_read/{id}', [UserController::class,'cat_read']);

Route::post('/cat_update/{id}', [UserController::class,'cat_update']);


Route::get('/input_user', [UserController::class,'input_user']);

Route::post('/store_user', [UserController::class,'store_user']);

Route::get('/show_user', [UserController::class,'show_user']);

Route::get('/user_delete/{id}', [UserController::class,'user_delete']);

Route::get('/user_read/{id}', [UserController::class,'user_read']);

Route::post('/user_edit/{id}', [UserController::class,'user_edit']);

// Management Databases Route

Route::get('/city_page', [ManagementDataController::class,'city_page']);

Route::post('/city_add', [ManagementDataController::class,'city_add']);

Route::get('/city_delete/{id}', [ManagementDataController::class,'city_delete']);

Route::get('/city_read/{id}', [ManagementDataController::class,'city_read']);

Route::post('/city_update/{id}', [ManagementDataController::class,'city_update']);

Route::get('/update_data', [ManagementDataController::class,'update_data']);

Route::get('/input_data', [ManagementDataController::class,'input_data']);

Route::post('/store_data', [ManagementDataController::class,'store_data']);

Route::get('/show_data', [ManagementDataController::class,'show_data']);

// Penginputan Data Excel
Route::post('/importexcel', [ManagementDataController::class,'importexcel'])->name('importexcel');

// Delete and Update Data
Route::get('/data_delete/{id}', [ManagementDataController::class,'data_delete']);

Route::get('/data_read/{id}', [ManagementDataController::class,'data_read']);

Route::post('/data_edit/{id}', [ManagementDataController::class,'data_edit']);

    // Define a GET route for the root URL ('/')
    Route::get('/', function () {
        // Return a view named 'index' when accessing the root URL
        return view('index');
    });



    



    // Define a GET route with dynamic placeholders for route parameters
    Route::get('{routeName}/{name?}', [HomeController::class, 'pageView']);
});





