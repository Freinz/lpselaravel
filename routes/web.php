<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\SurveyController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\InputController;
use App\Http\Controllers\SuperAdminController;

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
Route::get('/hubungi_kami', [SuperAdminController::class, 'hubungi_kami']);

// Define a group of routes with 'auth' middleware applied
Route::middleware(['auth'])->group(function () {
    // Redirect to '/home' route
    Route::get('/index', [SuperAdminController::class, 'index']);


    Route::get('/role_page', [RoleController::class, 'create'])->middleware(['auth', 'role:superadmin']);
    Route::post('/role_add', [RoleController::class, 'store'])->middleware(['auth', 'permission:store_role']);
    Route::get('/role_delete/{id}', [RoleController::class, 'destroy'])->middleware(['auth', 'permission:update_role']);
    Route::get('/role_read/{id}', [RoleController::class, 'edit'])->middleware(['auth', 'permission:delete_role']);
    Route::post('/role_update/{id}', [RoleController::class, 'update'])->middleware(['auth', 'permission:edit_role']);

    Route::get('/input_user', [UserController::class, 'create'])->middleware(['auth', 'role:superadmin']);
    Route::get('/input_user_operator', [UserController::class, 'input_user_operator'])->middleware(['auth', 'role:pimpinan']);
    Route::post('/store_user', [UserController::class, 'store'])->middleware(['auth', 'role:superadmin|pimpinan']);
    Route::post('/store_user_superadmin', [UserController::class, 'store_user_superadmin'])->middleware(['auth', 'role:superadmin']);
    Route::get('/show_user', [UserController::class, 'show'])->middleware(['auth', 'permission:show_user']);
    Route::get('/user_read/{id}', [UserController::class, 'edit'])->middleware(['auth', 'permission:edit_user']);
    Route::post('/user_edit/{id}', [UserController::class, 'update'])->middleware(['auth', 'permission:update_user']);
    Route::get('/user_delete/{id}', [UserController::class, 'destroy'])->middleware(['auth', 'permission:delete_user']);

    // Management User
    Route::get('/lihat_profil', [UserController::class, 'lihat_profil']);
    Route::get('/lihat_profil_pimpinan', [UserController::class, 'lihat_profil_pimpinan']);
    Route::get('/edit_profil', [UserController::class, 'edit_profil']);
    Route::put('/kirim_edit_profil/{id}', [UserController::class, 'kirim_edit_profil']);

    // Route::post('/kirim_edit_profil', [UserController::class,'kirim_edit_profil']);


    // Management Databases Route
    Route::get('/show_data', [SuperAdminController::class, 'show']);
    Route::get('/data_read/{id}', [SuperAdminController::class, 'edit'])->middleware(['auth', 'role:superadmin|pimpinan']);
    Route::put('/data_edit/{id}', [SuperAdminController::class, 'update'])->middleware(['auth', 'role:superadmin|pimpinan']);
    Route::get('/get_subkategori/{kategori_id}', [SuperAdminController::class, 'getSubKategori']);
    Route::get('/data_delete/{id}', [SuperAdminController::class, 'destroy'])->middleware(['auth', 'role:superadmin|pimpinan']);


    // Revisi Update & Delete Data
    Route::get('/revisi_read/{id}', [SuperAdminController::class, 'revisi_read'])->middleware(['auth', 'role:superadmin|operator']);
    Route::post('/revisi_edit/{id}', [SuperAdminController::class, 'revisi_edit'])->middleware(['auth', 'role:superadmin|operator']);
    Route::get('/revisi_delete/{id}', [SuperAdminController::class, 'revisi_delete'])->middleware(['auth', 'role:superadmin|operator']);
    Route::get('/revisi_data', [SuperAdminController::class, 'revisi_data']);
    Route::get('/detail_revisi/{id}', [SuperAdminController::class, 'detail_revisi'])->middleware(['auth', 'role:operator']);
    Route::put('/revisi_update_status/{form_id}', [SuperAdminController::class, 'revisi_update_status'])->middleware(['auth', 'role:operator']);


    
    // Management Import and Approve Data
    Route::get('/approver_data', [SuperAdminController::class, 'approver_data'])->middleware(['auth', 'role:pimpinan']);
    Route::get('/detail_data/{id}', [SuperAdminController::class, 'detail_data'])->middleware(['auth', 'role:pimpinan|operator']);
    // Operator Route
    Route::get('/importexcel_operator/{id}', [HomeController::class, 'importexcel_operator']);
    
    
    // Penginputan Data Excel
    Route::get('/import_data', [FormController::class, 'import_data']);
    Route::post('/importexcel', [FormController::class, 'importexcel'])->name('importexcel');
    Route::put('/update_status/{form_id}', [FormController::class, 'update_status'])->middleware(['auth', 'role:pimpinan']);


    // Rute baru untuk menginput kategori, subkategori, dan namakota
    Route::get('/input_kategori', [InputController::class, 'inputKategori'])->middleware(['auth']);
    Route::get('/input_subkategori', [InputController::class, 'inputSubkategori'])->middleware(['auth']);
    Route::get('/input_namakota', [InputController::class, 'inputNamakota'])->middleware(['auth']);

    Route::get('/sub-kategoris/{kategori_id}', [InputController::class, 'getSubKategoris']);


    Route::post('/store_kategori', [InputController::class, 'storeKategori'])->middleware(['auth']);
    Route::post('/store_subkategori', [InputController::class, 'storeSubkategori'])->middleware(['auth']);
    Route::post('/store_kota', [InputController::class, 'storeKota'])->middleware(['auth']);


    // Define a GET route with dynamic placeholders for route parameters
    Route::get('{routeName}/{name?}', [HomeController::class, 'pageView']);
});
