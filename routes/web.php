<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Admin\CategoryController;

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
Route::get('admin', [AuthController::class, 'login']);
Route::post('admin', [AuthController::class, 'loginAdmin']);
Route::get('admin/logout', [AuthController::class, 'logoutAdmin']);

Route::group(['middleware' => 'admin'], function () {
    Route::get('admin/dashboard', [DashboardController::class, 'dashboard']);
    Route::get('admin/user/list', [UsersController::class, 'listUser']);
    Route::get('admin/user/add', [UsersController::class, 'add']);
    Route::post('admin/user/add', [UsersController::class, 'addUser']);
    Route::get('admin/user/edit/{id}', [UsersController::class, 'edit']);
    Route::post('admin/user/edit/{id}', [UsersController::class, 'editUser']);
    Route::get('admin/user/delete/{id}', [UsersController::class, 'deleteUser']);

    //Category
     Route::get('admin/category/list', [CategoryController::class, 'listCategory']);
    Route::get('admin/category/add', [CategoryController::class, 'add']);
    Route::post('admin/category/add', [CategoryController::class, 'addCategory']);
    Route::get('admin/category/edit/{id}', [CategoryController::class, 'edit']);
    Route::post('admin/category/edit/{id}', [CategoryController::class, 'editCategory']);
    Route::get('admin/category/delete/{id}', [CategoryController::class, 'deleteCategory']);
    
});



Route::get('/', function () {
    return view('welcome');
});