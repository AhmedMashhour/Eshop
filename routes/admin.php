<?php


Route::group(['prefix'=>'admin','namespace'=>'Admin'],function(){


	Route::get('login','AdminAuth@login');
	Route::get('forgot','AdminAuth@forgot_password');
	Route::post('forgot','AdminAuth@forgot_password_reset');
	Route::get('reset/password/{token}','AdminAuth@reset_password');
	Route::post('reset/password/final/{token}','AdminAuth@reset_password_final');
	Route::post('login','AdminAuth@dologin');

	Config::set('auth.defaults','admin');
	Route::group(['middleware'=>'admin:admin'],function(){
	    Route::resource('admin','AdminController');

        Route::resource('countries','CountriesController');
        Route::delete('countries/destroy/all','CountriesController@multiDelete');

        Route::resource('cities','CitiesController');
        Route::delete('cities/destroy/all','CitiesController@multiDelete');

        Route::resource('trademarks','TradeMarkController');
        Route::delete('trademarks/destroy/all','TradeMarkController@multiDelete');

        Route::resource('manufacts','ManufactController');
        Route::delete('manufacts/destroy/all','ManufactController@multiDelete');

        Route::resource('malls','MallController');
        Route::delete('malls/destroy/all','MallController@multiDelete');

        Route::resource('products','ProductController');
        Route::post('products/{id}','ProductController@update');
        Route::delete('products/destroy/all','ProductController@multiDelete');

        Route::post('upload/image/{pid}','ProductController@upload_files');
        Route::post('delete/image','ProductController@deleteFile');
        Route::post('update/image/{id}','ProductController@update_product_image');
        Route::post('delete/product/image/{id}','ProductController@delete_product_image');

        Route::resource('sizes','SizeController');
        Route::delete('sizes/destroy/all','SizeController@multiDelete');

        Route::resource('colors','ColorController');
        Route::delete('colors/destroy/all','ColorController@multiDelete');

        Route::resource('weights','WeightController');
        Route::delete('weights/destroy/all','WeightController@multiDelete');

        Route::resource('shippings','SippingController');
        Route::delete('shippings/destroy/all','SippingController@multiDelete');

        Route::resource('departments','DepartmentController');
        Route::resource('states','StatesController');
        Route::delete('states/destroy/all','StatesController@multiDelete');

        Route::delete('admin/destroy/all','AdminController@multiDelete');
        Route::resource('users','UsersController');
        Route::delete('users/destroy/all','UsersController@multiDelete');
    Route::get('settings','Settings@setting');
        Route::post('settings','Settings@setting_save');
        Route::post('load/size/wight','ProductController@prepare_wight_size');

	Route::any('logout','AdminAuth@logout');

	Route::get('/',function(){
		return view('admin.home');
	});
});
});

