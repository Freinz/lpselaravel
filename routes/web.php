<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SuperAdminController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\FormController;

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

Auth::routes(['register' => false]);

Route::get('/', [SuperAdminController::class, 'dashboard']);

// Define a group of routes with 'auth' middleware applied
Route::middleware(['auth'])->group(function () {
    // Redirect to '/home' route    
    Route::get('/index', [SuperAdminController::class,'index']);

    Route::get('/role_page', [RoleController::class,'create'])->middleware(['auth', 'role:superadmin']);
    Route::post('/role_add', [RoleController::class,'store'])->middleware(['auth', 'permission:store_role']);
    Route::get('/role_delete/{id}', [RoleController::class,'destroy'])->middleware(['auth', 'permission:update_role']);
    Route::get('/role_read/{id}', [RoleController::class,'edit'])->middleware(['auth', 'permission:delete_role']);
    Route::post('/role_update/{id}', [RoleController::class,'update'])->middleware(['auth', 'permission:edit_role']);

    Route::get('/input_user', [UserController::class,'create'])->middleware(['auth', 'role:superadmin']);
    Route::post('/store_user', [UserController::class,'store'])->middleware(['auth', 'permission:store_user']);
    Route::get('/show_user', [UserController::class,'show'])->middleware(['auth', 'permission:show_user']);
    Route::get('/user_read/{id}', [UserController::class,'edit'])->middleware(['auth', 'permission:edit_user']);
    Route::post('/user_edit/{id}', [UserController::class,'update'])->middleware(['auth', 'permission:update_user']);
    Route::get('/user_delete/{id}', [UserController::class,'destroy'])->middleware(['auth', 'permission:delete_user']);

    // Management Databases Route
    Route::get('/show_data', [SuperAdminController::class,'show']);
    Route::get('/data_read/{id}', [SuperAdminController::class,'edit'])->middleware(['auth', 'role:superadmin|pimpinan']);
    Route::post('/data_edit/{id}', [SuperAdminController::class,'update'])->middleware(['auth', 'role:superadmin|pimpinan']);
    Route::get('/data_delete/{id}', [SuperAdminController::class,'destroy'])->middleware(['auth', 'role:superadmin|pimpinan']);

    // Management Import and Approve Data
    Route::get('/approver_data', [SuperAdminController::class,'approver_data'])->middleware(['auth', 'role:pimpinan']);
   
    // Form Approver
    Route::get('/show_form', [FormController::class,'show'])->middleware(['auth', 'role:pimpinan']);
    Route::get('/setuju_form/{id}', [FormController::class,'setuju_form'])->middleware(['auth', 'role:pimpinan']);
    Route::get('/tidaksetuju_form/{id}', [FormController::class,'tidaksetuju_form'])->middleware(['auth', 'role:pimpinan']);


    // Operator Route
    Route::get('/importexcel_operator/{id}', [HomeController::class,'importexcel_operator']);

    // Form Sebelum Excel
    Route::get('/input_form', [FormController::class,'create']);
    Route::post('/store_form', [FormController::class,'store']);
    
    // Penginputan Data Excel
    Route::post('/importexcel', [SuperAdminController::class,'importexcel'])->name('importexcel');
    Route::put('/update_status/{id}', [SuperAdminController::class,'update_status'])->middleware(['auth', 'role:pimpinan']);

   

    // Define a GET route with dynamic placeholders for route parameters
    Route::get('{routeName}/{name?}', [HomeController::class, 'pageView']);
});

