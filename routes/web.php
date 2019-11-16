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

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/put', 'HomeController@index');
// Route::get('/get', 'HomeController@getcache');

Route::group([
	'prefix'=>'admin',
	'namespace'=>'backend',
	'middleware'=>'auth'
], function(){
	Route::get('/dashboard', 'DashboardController@index')->name('backend.dashboard');
	Route::group(['prefix' => 'users'], function(){
       Route::get('/', 'UserController@index')->name('backend.user.index');
       Route::get('/create', 'UserController@create')->name('backend.user.create');
       Route::post('/store', 'UserController@store')->name('backend.user.store');
       Route::get('/edit/{id}', 'UserController@edit')->name('backend.user.edit');
       Route::post('/update/{id}', 'UserController@update')->name('backend.user.update');
       Route::get('/destroy/{id}', 'UserController@destroy')->name('backend.user.destroy');
       Route::get('/detail/{user_name}', 'UserController@detail')->name('backend.user.detail');


    });

    Route::group(['prefix' => 'categories'], function(){
       Route::get('/', 'CategoriesController@index')->name('backend.category.index');
       Route::get('/create', 'CategoriesController@create')->name('backend.category.create');
       Route::post('/store', 'CategoriesController@store')->name('backend.category.store');
       Route::get('/edit/{id}', 'CategoriesController@edit')->name('backend.category.edit');
       Route::post('/update/{id}', 'CategoriesController@update')->name('backend.category.update');
       Route::get('/destroy/{id}', 'CategoriesController@destroy')->name('backend.category.destroy');
       

    });

	Route::group(['prefix' => 'products'], function(){
       Route::get('', 'ProductController@index')->name('backend.product.index');
       Route::get('/create', 'ProductController@create')->name('backend.product.create');
       Route::post('/store', 'ProductController@store')->name('backend.product.store');
       Route::get('/edit/{id}', 'ProductController@edit')->name('backend.product.edit');
       Route::post('/update/{id}', 'ProductController@update')->name('backend.product.update');
       Route::get('/destroy/{id}', 'ProductController@destroy')->name('backend.product.destroy');
       Route::get('/show/{id}', 'ProductController@show')->name('backend.product.show');



    });
    Route::group(['prefix'=>'order'], function(){
    	Route::get('/', 'OrderController@index')->name('backend.order.index');
    	Route::get('/deteil/{id}', 'OrderController@detail')->name('backend.order.detail');

    });
    Route::group(['prefix'=>'images'], function(){
       Route::get('/', 'ImagesController@index')->name('backend.image.index');
       // Route::get('/create', 'ImagesController@create')->name('backend.image.create');
       // Route::post('/store', 'ImagesController@store')->name('backend.image.store');
       Route::get('/created/{id}', 'ImagesController@created')->name('backend.image.created');
       Route::post('/stores/{id}', 'ImagesController@stores')->name('backend.image.stores');
       Route::get('/edit/{id}', 'ImagesController@edit')->name('backend.image.edit');
       Route::post('/update/{id}', 'ImagesController@update')->name('backend.image.update');
       Route::get('/destroy/{id}', 'ImagesController@destroy')->name('backend.image.destroy');



    });
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::group([
	'prefix'=>'/',
	'namespace'=>'fontend'
], function(){
	Route::get('/', 'OneTechController@index')->name('fontend.index');
	Route::get('/shop/{slug}', 'OneTechController@shop')->name('fontend.pages.shop');
	Route::get('/shop/{id}/{slug}}', 'OneTechController@shop1')->name('fontend.pages.shop1');


	Route::get('/cart', 'CartController@index')->name('fontend.pages.cart');
	Route::get('/mail', 'CartController@seedmail')->name('fontend.pages.mail');
	Route::get('/order', 'OrderController@order')->name('fontend.pages.order');
	Route::get('/order-store', 'OrderController@order_store')->name('fontend.pages.order_store');


	Route::get('/contact', 'OneTechController@contact')->name('fontend.pages.contact');
	Route::get('product/{id}', 'OneTechController@product')->name('fontend.pages.product');
	Route::get('/add/{id}', 'CartController@add')->name('fontend.cart.add');


	Route::get('/seach', 'OneTechController@seach')->name('fontend.pages.seach');




});