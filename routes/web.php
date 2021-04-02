<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AuthConroller;

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
    return view('welcome');
});
// Route::get('/admin','AdminController@dashboard');
Route::get('/admin/login', [AuthConroller::class, 'login'])->name('login');

Route::get('/admin', [AdminController::class, 'dashboard'])->name('dashboard');

Route::get('/admin/client', [ClientController::class, 'client'])->name('client-index');
Route::get('/admin/client/create', [ClientController::class, 'create'])->name('client-create');
Route::post('/admin/client/store', [ClientController::class, 'store'])->name('client-store');
Route::get('/admin/client/edit/{id}', [ClientController::class, 'edit'])->name('client-edit');
Route::post('/admin/client/update/{id}', [ClientController::class, 'update'])->name('client-update');
Route::get('/admin/client/destroy/{id}', [ClientController::class, 'destroy'])->name('client-destroy');

Route::get('/admin/main_category', [CategoryController::class, 'main_category'])->name('main_category-index');
Route::get('/admin/main_category/create', [CategoryController::class, 'main_category_create'])->name('main_category-create');
Route::post('/admin/main_category/store', [CategoryController::class, 'main_category_store'])->name('main_category-store');
Route::get('/admin/main_category/edit/{id}', [CategoryController::class, 'main_category_edit'])->name('main_category-edit');
Route::post('/admin/main_category/update/{id}', [CategoryController::class, 'main_category_update'])->name('main_category-update');
Route::get('/admin/main_category/destroy/{id}', [CategoryController::class, 'main_category_destroy'])->name('main_category-destroy');

Route::get('/admin/sub_category', [CategoryController::class, 'sub_category'])->name('sub_category-index');
Route::get('/admin/sub_category/create', [CategoryController::class, 'sub_category_create'])->name('sub_category-create');
Route::post('/admin/sub_category/store', [CategoryController::class, 'sub_category_store'])->name('sub_category-store');
Route::get('/admin/sub_category/edit/{id}', [CategoryController::class, 'sub_category_edit'])->name('sub_category-edit');
Route::post('/admin/sub_category/update/{id}', [CategoryController::class, 'sub_category_update'])->name('sub_category-update');
Route::get('/admin/sub_category/destroy/{id}', [CategoryController::class, 'sub_category_destroy'])->name('sub_category-destroy');
