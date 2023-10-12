<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\UsertypeController;
use App\Http\Controllers\CustomersController;
use App\Http\Controllers\UploadFileController;
use App\Http\Controllers\FullCalendarController;
use App\Http\Controllers\ProductController;


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

/*Route::get('/', function () {
    return view('welcome');
});
*/
/* Route::get('dashboard',[DashboardController::class,'dashboard'])->name('admin.dashboard')->middleware('is_Admin');*/

Route::get('/',[AdminController::class,'index'])->name('admin.index');
Route::post('/dologin',[AdminController::class,'adminLogin'])->name('admin.dologin');
Route::get('/logout',[AdminController::class,'logout'])->name('admin.logout');
Route::post('/forgotpassword',[AdminController::class,'forgotPassword'])->name('admin.forgotPassword');

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware'=> ["is_Admin"]], function() {
    Route::get('/dashboard',[AdminController::class,'dashboard'])->name('dashboard');
    //Route::post('/forgotpassword',[AdminController::class,'forgotPassword'])->name('forgotPassword');
    Route::get('/resetpassword/{token?}',[AdminController::class,'resetPassword'])->name('resetpassword');
    Route::post('/getresetpassword',[AdminController::class,'getResetPassword'])->name('getresetpassword');
    Route::get('/profile',[AdminController::class,'profile'])->name('profile');
    Route::any('/updateprofile',[AdminController::class,'updateProfile'])->name('updateProfile');
    Route::post('/password',[AdminController::class,'changePassword'])->name('password');
});

Route::group(['prefix' => 'user', 'as' => 'user.', 'middleware'=> ["is_Admin"]], function() {
    Route::get('user_list',[UserController::class,'index'])->name('index');
    Route::get('create',[UserController::class,'create'])->name('create');
    Route::post('store',[UserController::class,'store'])->name('store');
    Route::get('edit/{id?}', [UserController::class,'edit'])->name('edit');
    Route::any('/validate-email', [UserController::class, 'email'])->name('email');
    Route::post('update/{id?}', [UserController::class,'update'])->name('update');
    Route::get('user/delete', [UserController::class,'destroy'])->name('destroy');
    Route::get('send-mail', [UserController::class, 'mail'])->name('mail');
    Route::get('getfile/{id?}',[UserController::class,'getFile'])->name('getfile');
});
Route::post('getCity',[UserController::class,'getCity'])->name('city');

Route::group(['prefix' => '', 'as' => 'city.', 'middleware'=> ["is_Admin"]], function() {
    Route::get('city_list',[CityController::class,'index'])->name('index');
    Route::get('create',[CityController::class,'create'])->name('create');
    Route::post('store',[CityController::class,'store'])->name('store');
    Route::get('edit/{id?}', [CityController::class,'edit'])->name('edit');
    Route::post('update/{id?}', [CityController::class,'update'])->name('update');
    Route::get('user/delete', [CityController::class,'destroy'])->name('destroy');
});
Route::any('/validate-city', [CityController::class, 'city'])->name('user.city');


/*Route::get('city_list',[CityController::class,'index'])->name('city.index');
Route::get('create',[CityController::class,'create'])->name('city.create');
Route::post('store',[CityController::class,'store'])->name('city.store');
Route::get('edit/{id?}', [CityController::class,'edit'])->name('city.edit');
Route::post('update/{id?}', [CityController::class,'update'])->name('city.update');
Route::get('user/delete', [CityController::class,'destroy'])->name('city.destroy');
Route::any('/validate-city', [CityController::class, 'city'])->name('user.city');*/

Route::group(['prefix' => 'user_type', 'as' => 'usertype.', 'middleware'=> ["is_Admin"]], function() {
    Route::get('user_type_list',[UsertypeController::class,'index'])->name('index');
    Route::get('create',[UsertypeController::class,'create'])->name('create');
    Route::post('store',[UsertypeController::class,'store'])->name('store');
    Route::get('edit/{id?}', [UsertypeController::class,'edit'])->name('edit');
    Route::post('update/{id?}', [UsertypeController::class,'update'])->name('update');
    Route::get('user/delete', [UsertypeController::class,'destroy'])->name('destroy');
});
Route::any('/validate-role', [UsertypeController::class, 'role'])->name('usertype.role');

Route::post('/save-address',[UserController::class,'saveAddress'])->name('saveAddress');

//Route::get('customers',[CustomersController::class,'index'])->name('customers.index');

Route::group(['prefix' => 'customers', 'as' => 'customers.', 'middleware'=> ["is_Admin"]], function() {
    Route::get('customers_list',[CustomersController::class,'index'])->name('index');
    Route::get('create',[CustomersController::class,'create'])->name('create');
    Route::post('store',[CustomersController::class,'store'])->name('store');
    Route::get('edit/{id?}', [CustomersController::class,'edit'])->name('edit');
    Route::post('update/{id?}', [CustomersController::class,'update'])->name('update');
    Route::get('user/delete', [CustomersController::class,'destroy'])->name('destroy');
});

Route::group(['prefix' => 'file', 'as' => 'file.', 'middleware'=> ["is_Admin"]], function() {
    Route::get('ajax-file-upload-progress-bar', [UploadFileController::class, 'index'])->name('index');
    Route::post('store', [UploadFileController::class, 'store'])->name('store');
});


//Route::get('fullcalendar','FullCalendarController@index');
Route::get('fullcalendar',[FullCalendarController::class, 'index'])->name('cal.index');
//Route::post('fullcalendar/create',[FullCalendarController::class,'create'])->name('cal.create');
Route::post('fullcalendar/create','FullCalendarController@create');
Route::post('fullcalendar/update','FullCalendarController@update');
Route::get('fullcalendar/delete','FullCalendarController@destroy');



Route::group(['prefix' => 'products', 'as' => 'products.', 'middleware'=> ["is_Admin"]], function() {
    Route::get('product_list',[ProductController::class,'index'])->name('index');
    Route::get('create',[ProductController::class,'create'])->name('create');
    Route::post('store',[ProductController::class,'store'])->name('store');
    Route::get('edit/{id?}', [ProductController::class,'edit'])->name('edit');
    Route::post('update/{id?}', [ProductController::class,'update'])->name('update');
    Route::get('user/delete', [ProductController::class,'destroy'])->name('destroy');
});
