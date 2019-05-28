<?php

Route::get('/','HomeController@index')->name('home');

Route::get('/news','NewsController@index')->name('news');
Route::get('/news/{id}','NewsController@news_item');

Route::get('/products','ProductController@products')->name('products');
Route::get('/products/{section}','ProductController@all_section_products');
Route::get('/products/category/{category_id}','ProductController@category_products');
Route::get('/product/{id}','ProductController@product_item');
Route::post('/product_in_cart/store', 'CartController@store');
Route::get('/how_to_find_us', 'FindUsController@index');


Route::get('/try',function(){return view('products');});

Route::get('/about_us','AboutUsController@index')->name('about_us');

Route::get('setlocale/{locale}', function ($locale) {

    if (in_array($locale, \Config::get('app.locales'))) {   # Проверяем, что у пользователя выбран доступный язык
        Session::put('locale', $locale);                    # И устанавливаем его в сессии под именем locale
    }
    return redirect()->back();                              # Редиректим его <s>взад</s> на ту же страницу

});

Route::group(['prefix' => 'admin'], function () {
  Route::get('/login', 'AdminAuth\LoginController@showLoginForm')->name('login');
  Route::post('/login', 'AdminAuth\LoginController@login');
  Route::post('/logout', 'AdminAuth\LoginController@logout')->name('logout');

Route::post('/password/email', 'AdminAuth\ForgotPasswordController@sendResetLinkEmail')->name('password.request');
Route::post('/password/reset', 'AdminAuth\ResetPasswordController@reset')->name('password.email');
Route::get('/password/reset', 'AdminAuth\ForgotPasswordController@showLinkRequestForm')->name('password.reset');
Route::get('/password/reset/{token}', 'AdminAuth\ResetPasswordController@showResetForm');
});

Route::group(['prefix' => 'admin', 'middleware' => 'auth:admin'], function(){//auth:admin чтобы авторизация отображалась на других страницах

    //MANAGERS
    Route::get('/managers', 'Admin\AdminController@managers');
    Route::get('/destroy_manager/{id}','Admin\AdminController@destroy');
    Route::post('/updateManager', 'Admin\AdminController@updateManager');

    //MANUFACTURERS
    Route::get('/manufacturers', 'Admin\ManufacturerController@manufacturers');
    Route::post('/manufacturers/store', 'Admin\ManufacturerController@store');
    Route::get('/destroy_manuf/{id}','Admin\ManufacturerController@destroy');
    Route::post('/updateManuf','Admin\ManufacturerController@update');

    //NEWS
    Route::get('/news', 'Admin\NewsController@news');
    Route::post('/news/store', 'Admin\NewsController@store');
    Route::get('/destroy_news/{id}','Admin\NewsController@destroy');
    Route::post('/updateNews','Admin\NewsController@update');

    //Order
    Route::get('/orders', 'Admin\OrderController@orders');
    Route::get('/destroy_order/{id}','Admin\OrderController@destroy');
    Route::post('/updateOrder','Admin\OrderController@update');

    //Product
    Route::get('/products', 'Admin\ProductController@products');
    Route::post('/products/store', 'Admin\ProductController@store');
    Route::get('/destroy_products/{id}','Admin\ProductController@destroy');
    Route::post('/updateProducts','Admin\ProductController@update');


    Route::get('/register', 'AdminAuth\RegisterController@showRegistrationForm')->name('register');
    Route::post('/register', 'AdminAuth\RegisterController@register');
    Route::post('/updateManager', 'Admin\AdminController@updateManager');
});

Route::group(['prefix' => 'user'], function () {
    //Product_in_cart
    Route::get('/login', 'UserAuth\LoginController@showLoginForm')->name('login');
    Route::post('/login', 'UserAuth\LoginController@login');
    Route::post('/logout', 'UserAuth\LoginController@logout')->name('logout');

    Route::get('/register', 'UserAuth\RegisterController@showRegistrationForm')->name('register');
    Route::post('/register', 'UserAuth\RegisterController@register');

    Route::post('/password/email', 'UserAuth\ForgotPasswordController@sendResetLinkEmail')->name('password.request');
    Route::post('/password/reset', 'UserAuth\ResetPasswordController@reset')->name('password.email');
    Route::get('/password/reset', 'UserAuth\ForgotPasswordController@showLinkRequestForm')->name('password.reset');
    Route::get('/password/reset/{token}', 'UserAuth\ResetPasswordController@showResetForm');
});
