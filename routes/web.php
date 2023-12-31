<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ConfigController;

use App\Http\Controllers\Admin\CategoryCourseController;
use App\Http\Controllers\Admin\CourseController;

use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\CheckoutController;
use App\Http\Controllers\Frontend\UserController;
use App\Http\Controllers\Frontend\WishlistController;
use App\Http\Controllers\Frontend\RatingController;

use App\Models\Order;

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

// Route::get('/', function () {
//     return view('welcome');
// });

//Shop Views
Route::get('/', [FrontendController::class, 'index']);
Route::get('category', [FrontendController::class, 'category']);
Route::get('view-category/{slug}', [FrontendController::class, 'viewcategory']);
Route::get('category/{cate_slug}/{prod_slug}', [FrontendController::class, 'productview']);

Route::get('product-list', [FrontendController::class, 'productlistAjax']);
Route::post('buscarproducto', [FrontendController::class, 'buscarProducto']);
//vistas
Route::get('history', [FrontendController::class, 'history']);
Route::get('contact', [FrontendController::class, 'contact']);
Route::post('send-contact', [FrontendController::class, 'sendcontact']);
Route::get('wholesale', [FrontendController::class, 'wholesale']);
Route::post('send-wholesale', [FrontendController::class, 'sendwholesale']);
Route::get('social-impact', [FrontendController::class, 'socialImpact']);
Route::get('faq', [FrontendController::class, 'faq']);



Auth::routes();

//language
Route::get('/set_language/{lang}', [App\Http\Controllers\Controller::class, 'set_language'])->name('set_language');

Route::get('load-cart-data', [CartController::class, 'cartcount']);
Route::get('load-wish-data', [WishlistController::class, 'wishcount']);
//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//ajax cart options
Route::post('add-to-cart', [CartController::class, 'addProduct']);
Route::post('update-cart', [CartController::class, 'updatecart']);
Route::post('delete-cart-item', [CartController::class, 'deleteproduct']);

Route::post('add-to-wishlist', [WishlistController::class, 'add']);
Route::post('delete-wishlist-item', [WishlistController::class, 'deleteitem']);


Route::middleware(['auth'])->group(function () {
    //User Carts
    Route::get('cart', [CartController::class, 'viewcart']);
    Route::get('checkout', [CheckoutController::class, 'index']);
    Route::post('confirm-order', [CheckoutController::class, 'confirmorder']);
    Route::post('place-order', [CheckoutController::class, 'placeorder']);

    Route::get('my-orders', [UserController::class, 'indexorders']);
    Route::get('view-order/{id}', [UserController::class, 'showorder']);

    Route::post('add-rating', [RatingController::class, 'add']);

    //User Dashboard
    Route::get('my-account', [UserController::class, 'indexuser']);
    Route::get('user-details/{id}', [UserController::class, 'showuser']);
    Route::get('user-edit/{id}', [UserController::class, 'edituser']);
    Route::put('user-update/{id}', [UserController::class, 'updateuser']);

    Route::get('wishlist', [WishlistController::class, 'index']);

    Route::post('proceed-to-pay', [CheckoutController::class, 'razorpaycheck']);
});

//Admin Dashboard
Route::middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('/dashboard','Admin\FrontendController@index');

    //Admin Category
    Route::get('categories',[CategoryController::class, 'index']);
    Route::get('show-category/{id}',[CategoryController::class, 'show']);
    Route::get('add-category', 'Admin\CategoryController@add');
    Route::post('insert-category','Admin\CategoryController@insert');
    Route::get('edit-category/{id}',[CategoryController::class,'edit']);
    Route::put('update-category/{id}', [CategoryController::class, 'update']);
    Route::get('delete-category/{id}', [CategoryController::class, 'destroy']);

    //Admin Products
    Route::get('products',[ProductController::class, 'index']);
    Route::get('show-product/{id}',[ProductController::class, 'show']);
    Route::get('add-product', 'Admin\ProductController@add');
    Route::post('insert-product','Admin\ProductController@insert');
    Route::get('edit-product/{id}',[ProductController::class,'edit']);
    Route::put('update-product/{id}', [ProductController::class, 'update']);
    Route::get('delete-product/{id}', [ProductController::class, 'destroy']);
    Route::get('pdf-product', 'Admin\ProductController@pdf');
    Route::get('pdf-showproduct', 'Admin\ProductController@pdfshow');


    //Admin Users
    Route::get('users', [DashboardController::class, 'users']);
    Route::get('show-user/{id}', [DashboardController::class, 'showuser']);
    Route::get('add-user', 'Admin\DashboardController@adduser');
    Route::post('insert-user','Admin\DashboardController@insertuser');
    Route::get('edit-user/{id}',[DashboardController::class,'edituser']);
    Route::put('update-user/{id}', [DashboardController::class, 'updateuser']);
    Route::get('delete-user/{id}', [DashboardController::class, 'destroyuser']);
    Route::get('pdf-user', 'Admin\DashboardController@pdf');


    //Admin Orders
    Route::get('orders', [OrderController::class, 'index']);
    Route::get('admin/show-order/{id}', [OrderController::class, 'show']);
    Route::put('update-order/{id}', [OrderController::class, 'updateorder']);
    Route::get('order-history', [OrderController::class, 'orderhistory']);
    Route::get('pdf-order', 'Admin\OrderController@pdf');
    Route::get('pdf-showorder', 'Admin\OrderController@pdfshow');

    //Admin Course Category
    Route::get('course-categories',[CategoryCourseController::class, 'index']);
    Route::get('show-course-category/{id}',[CategoryCourseController::class, 'show']);
    Route::get('add-course-category', 'Admin\CategoryCourseController@add');
    Route::post('insert-course-category','Admin\CategoryCourseController@insert');
    Route::get('edit-course-category/{id}',[CategoryCourseController::class,'edit']);
    Route::put('update-course-category/{id}', [CategoryCourseController::class, 'update']);
    Route::get('delete-course-category/{id}', [CategoryCourseController::class, 'destroy']);

    //Admin Course
    Route::get('index-courses',[CourseController::class, 'index']);
    Route::get('show-course/{id}',[CourseController::class, 'show']);
    Route::get('add-course', 'Admin\CourseController@add');
    Route::post('insert-course','Admin\CourseController@insert');
    Route::get('edit-course/{id}',[CourseController::class,'edit']);
    Route::put('update-course/{id}', [CourseController::class, 'update']);
    Route::get('delete-course/{id}', [CourseController::class, 'destroy']);

    //Admin Video
    Route::post('insert-video','Admin\CourseController@insertvideo');
    Route::get('edit-video/{id}',[CourseController::class,'editvideo']);
    Route::put('update-video/{id}', [CourseController::class, 'updatevideo']);
    Route::get('delete-video/{id}', [CourseController::class, 'destroyvideo']);

    //Admin Audio
    Route::post('insert-audio','Admin\CourseController@insertaudio');
    Route::get('edit-audio/{id}',[CourseController::class,'editaudio']);
    Route::put('update-audio/{id}', [CourseController::class, 'updateaudio']);
    Route::get('delete-audio/{id}', [CourseController::class, 'destroyaudio']);

    //config
    Route::get('config', [ConfigController::class, 'index']);
    Route::put('update-config', [ConfigController::class, 'update']);

 });
