<?php

Route::get('/','HomeController@index')->name('home');

Route::get('/news','NewsController@index')->name('news');
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
    //Route::get('/', ['uses' => 'Admin\HomeController@index'])->name('home');
    Route::get('/managers', 'Admin\AdminController@managers');//->name('manage');
    Route::get('/destroy/{id}','Admin\AdminController@destroy');
    Route::get('/register', 'AdminAuth\RegisterController@showRegistrationForm')->name('register');
    Route::post('/register', 'AdminAuth\RegisterController@register');
});

Route::group(['prefix' => 'user'], function () {
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
