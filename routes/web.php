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
Route::group(['middleware'=>'Maintenance'],function (){

    Route::get('/', 'Customer\Shop@index');
    Route::get('/product/details/{id}', 'Customer\Shop@productDetails');
    Route::group(['prefix'=>'customer','namespace'=>'Customer'],function(){


        Route::get('/login', 'CustomerLogin@login')->name('login');
        Route::get('/register', 'CustomerLogin@register')->name('register');
        Route::post('/login', 'CustomerLogin@dologin');
        Route::post('/register', 'CustomerLogin@store');

        Config::set('auth.defines','customer');
        Route::group(['middleware'=>'auth:customer'],function (){

            Route::get('/home', 'Shop@index');
            Route::get('/product/details/{id}', 'Shop@productDetails');
            Route::get('/logout', 'CustomerLogin@logout');

            Route::post('/add/to/cart','Cart@create');
            Route::post('/search','Shop@search');
            Route::get('delete/from/cart/{id}','Cart@deleteCart');
            Route::get('/products','Shop@allProducts');
            Route::get('/products/{dep}/{id}','Shop@filter');



        });


    });
});
Route::get('maintenance',function (){
    if (setting()->status == 'open') {
        return redirect('/');
    }
    return view('style.maintenance');
});



