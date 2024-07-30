<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ColorController;

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

    //Sub_category
    Route::get('admin/sub_category/list', [SubCategoryController::class, 'listSubCategory']);
    Route::get('admin/sub_category/add', [SubCategoryController::class, 'add']);
    Route::post('admin/sub_category/add', [SubCategoryController::class, 'addSubCategory']);
    Route::get('admin/sub_category/edit/{id}', [SubCategoryController::class, 'edit']);
    Route::post('admin/sub_category/edit/{id}', [SubCategoryController::class, 'editSubCategory']);
    Route::get('admin/sub_category/delete/{id}', [SubCategoryController::class, 'deleteSubCategory']);

    Route::post('admin/get_sub_category', [SubCategoryController::class, 'get_sub_category']);

    

    //Color
    Route::get('admin/color/list', [ColorController::class, 'listColor']);
    Route::get('admin/color/add', [ColorController::class, 'add']);
    Route::post('admin/color/add', [ColorController::class, 'addColor']);
    Route::get('admin/color/edit/{id}', [ColorController::class, 'edit']);
    Route::post('admin/color/edit/{id}', [ColorController::class, 'editColor']);
    Route::get('admin/color/delete/{id}', [ColorController::class, 'deleteColor']);

    //product
    Route::get('admin/product/list', [ProductController::class, 'listProduct']);
    Route::get('admin/product/add', [ProductController::class, 'add']);
    Route::post('admin/product/add', [ProductController::class, 'addProduct']);
    Route::get('admin/product/edit/{id}', [ProductController::class, 'edit']);
    Route::post('admin/product/edit/{id}', [ProductController::class, 'editProduct']);
});



Route::get('/', function () {
    return view('welcome');
});