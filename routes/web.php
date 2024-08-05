<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ColorController;
use App\Http\Controllers\Admin\DiscountCodeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController as ProductHome;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\Admin\OrderController;
use Faker\Provider\ar_EG\Payment;

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

Route::group(['middleware' => 'user'], function () {
    Route::get('user/order', [UserController::class, 'order']); 
    Route::get('user/edit-profile', [UserController::class, 'editProfile']); 
    Route::post('user/edit-profile', [UserController::class, 'updateProfile']); 
    Route::get('user/change-password', [UserController::class, 'changePassword']); 
    Route::post('user/change-password', [UserController::class, 'updatePassword']);
    Route::get('user/order/detail/{id}', [UserController::class, 'OrderDetail']);
    
});

Route::group(['middleware' => 'admin'], function () {
    Route::get('admin/dashboard', [DashboardController::class, 'dashboard']);
    Route::get('admin/user/list', [UsersController::class, 'listUser']);
    Route::get('admin/user/add', [UsersController::class, 'add']);
    Route::post('admin/user/add', [UsersController::class, 'addUser']);
    Route::get('admin/user/edit/{id}', [UsersController::class, 'edit']);
    Route::post('admin/user/edit/{id}', [UsersController::class, 'editUser']);
    Route::get('admin/user/delete/{id}', [UsersController::class, 'deleteUser']);
    Route::get('admin/customer/list', [UsersController::class, 'listCustomer']);
    Route::get('admin/customer/delete/{id}', [UsersController::class, 'deleteCustomer']);

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

    //Discount_code
    Route::get('admin/discount/list', [DiscountCodeController::class, 'listDiscount']);
    Route::get('admin/discount/add', [DiscountCodeController::class, 'add']);
    Route::post('admin/discount/add', [DiscountCodeController::class, 'addDiscount']);
    Route::get('admin/discount/edit/{id}', [DiscountCodeController::class, 'edit']);
    Route::post('admin/discount/edit/{id}', [DiscountCodeController::class, 'editDiscount']);
    Route::get('admin/discount/delete/{id}', [DiscountCodeController::class, 'deleteDiscount']);

    //product
    Route::get('admin/product/list', [ProductController::class, 'listProduct']);
    Route::get('admin/product/add', [ProductController::class, 'add']);
    Route::post('admin/product/add', [ProductController::class, 'addProduct']);
    Route::get('admin/product/edit/{id}', [ProductController::class, 'edit']);
    Route::post('admin/product/edit/{id}', [ProductController::class, 'editProduct']);
    Route::get('admin/product/image_delete/{id}', [ProductController::class, 'imageDelete']);

    //Order
    Route::get('admin/order', [OrderController::class, 'list']);
    Route::get('admin/order/detail/{id}', [OrderController::class, 'detailOrder']);
    Route::get('admin/order_status', [OrderController::class, 'orderStatus']);


});

Route::get('/', [HomeController::class, 'home']);
Route::post('auth_register', [AuthController::class, 'authRegister']);
Route::post('auth_login', [AuthController::class, 'auth_admin']);
Route::get('forgot-password', [AuthController::class, 'forgotPassword']);



Route::get('cart', [PaymentController::class, 'cart']);
Route::post('update_cart', [PaymentController::class, 'cartUpdate']);
Route::get('cart/delete/{id}', [PaymentController::class, 'cartDelete']);
Route::get('checkout', [PaymentController::class, 'checkout']);
Route::post('checkout/apply_discount_code', [PaymentController::class, 'apply_discount_code']);
Route::post('checkout/place_order', [PaymentController::class, 'checkout_place_order']);
Route::get('checkout/payment', [PaymentController::class, 'checkout_payment']);
Route::get('paypal/success-payment', [PaymentController::class, 'paypal_success_payment']);
Route::post('product/add-to-cart', [PaymentController::class, 'addToCart']);
Route::get('search', [ProductHome::class, 'getProductSeach']);
Route::post('get_product_ajax', [ProductHome::class, 'getProductAjax']);
Route::get('{category?}/{subcategory?}', [ProductHome::class, 'getCategorySub']);



// Route::get('/', function () {
//     return view('welcome');
// });