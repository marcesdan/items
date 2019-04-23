<?php
/*
|--------------------------------------------------------------------------
| Auth Routes
|--------------------------------------------------------------------------
*/
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

Route::group(['middleware' => 'auth'], function () {
    // Password change routes
    Route::get('password/change', 'Auth\ChangePasswordController@showChangePasswordForm');
    Route::put('password/change', 'Auth\ChangePasswordController@changePassword');

    Route::group(['prefix' => '/admin', 'as' => 'admin.', 'middleware' => 'can:admin'], function () {
        // admin desarrolladores routes
        Route::group(['prefix' => '/desarrolladores', 'as' => 'desarrolladores.'], function () {
            Route::get('', 'DesarrolladorController@index')->name('index');
            Route::get('registrar', 'DesarrolladorController@create')->name('create');
            Route::post('', 'Auth\RegisterController@register')->name('register');
            Route::get('{id}', 'DesarrolladorController@show')->name('show');
            Route::get('{id}/editar', 'DesarrolladorController@edit')->name('edit');
            Route::put('{id}', 'DesarrolladorController@update')->name('update');
            Route::delete('{id}', 'DesarrolladorController@destroy')->name('destroy');
        });
        // admin proyectos routes
        Route::group(['prefix' => '/proyectos', 'as' => 'proyectos.'], function () {
            Route::get('', 'ProyectoController@index')->name('index');
            Route::get('nuevo', 'ProyectoController@create')->name('create');
            Route::post('', 'ProyectoController@store')->name('store');
            Route::get('{id}', 'ProyectoController@show')->name('show');
            Route::get('{id}/editar', 'ProyectoController@edit')->name('edit');
            Route::put('{id}', 'ProyectoController@update')->name('update');
            Route::delete('{id}', 'ProyectoController@destroy')->name('destroy');
        });
        // admin proyectos routes
        Route::group(['prefix' => '/items', 'as' => 'items.'], function () {
            Route::get('', 'ItemController@index')->name('index');
            Route::get('nuevo', 'ItemController@create')->name('create');
            Route::post('', 'ItemController@store')->name('store');
            Route::get('{id}', 'ItemController@show')->name('show');
            Route::get('{id}/editar', 'ItemController@edit')->name('edit');
            Route::put('{id}', 'ItemController@update')->name('update');
            Route::delete('{id}', 'ItemController@destroy')->name('destroy');
        });
    });

    // api routes
    Route::group(['namespace' => 'Api', 'prefix' => '/api'], function () {
        // api admin routes
        Route::group(['prefix' => '/admin', 'middleware' => 'can:admin'], function () {
            // api admin desarrolladores routes
            Route::group(['prefix' => '/desarrolladores'], function () {
                Route::get('', 'DesarrolladorController@index');
                Route::delete('{id}', 'DesarrolladorController@destroy');
            });
            // api admin desarrolladores routes
            Route::group(['prefix' => '/proyectos'], function () {
                Route::get('', 'ProyectoController@index');
                Route::delete('{id}', 'ProyectoController@destroy');
            });
            // api admin desarrolladores routes
            Route::group(['prefix' => '/items'], function () {
                Route::get('', 'ItemController@index');
                Route::delete('{id}', 'ItemController@destroy');
            });
        });
    });

    Route::put('/perfil', 'ProfileController@update')->name('perfil');
    Route::get('/perfil', 'ProfileController@edit');
});

Route::view('/', 'home')->name('home');
