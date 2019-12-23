<?php

Route::get('/', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::namespace('Manager')->prefix('manager')->middleware('auth', 'admin')->group(function () {
    Route::get('/', 'ManagerController@index')->name('manager');

    Route::resource('news', 'NewsController', [
        'as' => 'manager'
    ]);

    Route::resource('category', 'CategoryController', [
        'as' => 'manager'
    ]);
});


Route::get('/news/{news}', 'Manager\NewsController@show')->name('news');


