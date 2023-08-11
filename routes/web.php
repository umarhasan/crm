<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\PackagesController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\GeneralSettingController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\ShiftController;
use App\Http\Controllers\GoogleCalendarController;
use App\Http\Controllers\LeavesController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\MailController;
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
return view('auth.login');
});


Route::get('/google-calendar/connect', [GoogleCalendarController::class,'connect']);

Route::get('/signup', [RegisterController::class, 'register_form'])->name('signup');
Route::get('logout', [LoginController::class, 'logout']);
Route::get('account/verify/{token}', [LoginController::class, 'verifyAccount'])->name('user.verify'); 

// Route::get('/', [HomeController::class,'index']);
Route::get('/detail/{id}', [HomeController::class,'product_detail'])->name('product.detail');

Auth::routes(['verify' => true]);


Route::group(['middleware' => ['auth','verified']], function(){
    Route::get('/change_password', [DashboardController::class, 'change_password'])->name('change_password');
    Route::post('/store_change_password', [DashboardController::class, 'store_change_password'])->name('store_change_password');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('home');
    Route::resource('roles', RoleController::class);
    Route::resource('shift', ShiftController::class);
    Route::resource('attendance', AttendanceController::class);
    Route::resource('leads', LeadsController::class);
    Route::resource('leaves', LeavesController::class);
    Route::resource('department', DepartmentController::class);
    Route::resource('permission', PermissionController::class);
    Route::resource('task', TaskController::class);
    Route::resource('client', ClientController::class);
    Route::resource('project', ProjectController::class);
    Route::resource('mail', MailController::class);

  	Route::get('clients/fetch', [ClientController::class, 'assign_client'])->name('clients.fetch');
  	Route::get('projects/fetch', [ProjectController::class, 'assign_project'])->name('projects.fetch');
    
    Route::resource('users', UserController::class);
  	Route::get('user/fetch', [UserController::class, 'assign_user'])->name('user.fetch');
    Route::resource('packages', PackagesController::class);
    Route::resource('category', CategoryController::class);
    Route::resource('subcategory', SubCategoryController::class);
    Route::get('/profile', [DashboardController::class, 'profile'])->name('profile.index');
    Route::post('/profile/update', [DashboardController::class, 'update'])->name('profile.update');
    Route::resource('product', ProductController::class);
    Route::get('subcatories/{category}', [SubCategoryController::class,'subcatories']);
    Route::get('product/{id}/images', [ProductController::class, 'images']);
  	Route::post('product/{id}/images', [ProductController::class, 'postImages']);
  	Route::get('product/image/{id}/delete', [ProductController::class, 'imgDelete']);
    
    Route::resource('pages',PageController::class);
    Route::resource('sections',SectionController::class);
    Route::resource('general_setting',GeneralSettingController::class);
    Route::resource('orders',OrderController::class);
});
  
  
// Add cart
Route::post('addcart', [CheckoutController::class, 'addcart'])->name('addcart');
Route::get('ajaxcart', [CheckoutController::class, 'ajaxcart'])->name('cart.ajax');
Route::get('cart', [CheckoutController::class, 'cart'])->name('cart');
Route::post('updatecart', [CheckoutController::class, 'updatecart'])->name('updatecart');
Route::get('deletecart', [CheckoutController::class, 'deletecart'])->name('deletecart');
Route::get('checkout', [CheckoutController::class, 'checkout'])->name('checkout');
Route::post('post_checkout', [CheckoutController::class, 'post_checkout'])->name('post_checkout');

// Add Wishlist
Route::post('addwishlist', [CheckoutController::class, 'addwishlist'])->name('addwishlist');