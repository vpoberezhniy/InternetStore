<?php

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


Route::get('/', 'HomeController@index')->name('home');
Auth::routes();

Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => ['auth', 'role']], function(){
	Route::get('/', 'AdminController@dashboard');
    Route::resource('/users', 'UserController');
    Route::resource('/products', 'ProductController');
    Route::resource('/category', 'CategoryController');
    Route::resource('/settings', 'HeaderController');
    Route::resource('/orders', 'OrderController');
//    Route::resource('/orders', 'OrderItemController');
   // Route::get('/', 'UploadImagesController@create');
    Route::post('/images-save', 'UploadImagesController@store');
    Route::post('/images-delete', 'UploadImagesController@destroy');
    Route::get('/images-show', 'UploadImagesController@index');
    Route::delete('/delete-order-item/{id}', 'OrderController@destroyOrderItem');
});

Route::get('profile/{userid}', 'UserController@profile');
Route::PUT('profile/{userid}', 'UserController@update')->name('profile.update'); //name('profile.update') это мы придумали путь маршрута для роута (см. табоицу Route:list)

Route::resource('/', 'ItemCardController');
Route::get('/product/{slug}', 'ItemCardController@product');
Route::post('/cart/add', 'CartController@addproduct');
Route::get('/category/{id}', 'ItemCardController@category');
Route::get('/basket', 'CartController@show');
Route::delete('/basket/{id}', 'CartController@destroy');
Route::get('/basket/delete', 'CartController@delete');
Route::get('/checkout', 'CheckoutController@index');
Route::post('/checkout', 'CheckoutController@send')->name('checkout');
Route::get('/cash', 'CheckoutController@cash')->name('cash');
Route::post('/cash', 'CheckoutController@cashsend')->name('cashsend');
Route::delete('/checkout/{id}', 'CheckoutController@del');
