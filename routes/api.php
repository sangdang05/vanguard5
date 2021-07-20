<?php

Route::post('login', 'Auth\AuthController@token');
Route::post('login/social', 'Auth\SocialLoginController@index');
Route::post('logout', 'Auth\AuthController@logout');

Route::post('register', 'Auth\RegistrationController@index')->middleware('registration');

Route::group(['middleware' => ['guest', 'password-reset']], function () {
    Route::post('password/remind', 'Auth\Password\RemindController@index');
    Route::post('password/reset', 'Auth\Password\ResetController@index');
});

Route::group(['middleware' => ['auth', 'verified']], function () {

    Route::group(['middleware' => 'registration'], function () {
        Route::post('email/resend', 'Auth\VerificationController@resend');
        Route::post('email/verify', 'Auth\VerificationController@verify');
    });
    Route::get('me', 'Profile\DetailsController@index');
    Route::patch('me/details', 'Profile\DetailsController@update');
    Route::patch('me/details/auth', 'Profile\AuthDetailsController@update');
    Route::post('me/avatar', 'Profile\AvatarController@update');
    Route::delete('me/avatar', 'Profile\AvatarController@destroy');
    Route::put('me/avatar/external', 'Profile\AvatarController@updateExternal');
    Route::get('me/sessions', 'Profile\SessionsController@index');

    Route::group(['middleware' => 'two-factor'], function () {
        Route::put('me/2fa', 'Profile\TwoFactorController@update');
        Route::post('me/2fa/verify', 'Profile\TwoFactorController@verify');
        Route::delete('me/2fa', 'Profile\TwoFactorController@destroy');
    });

    Route::get('stats', 'StatsController@index');

    Route::apiResource('users', 'Users\UsersController')->except('show');
    Route::get('users/{userId}', 'Users\UsersController@show');

    Route::post('users/{user}/avatar', 'Users\AvatarController@update');
    Route::put('users/{user}/avatar/external', 'Users\AvatarController@updateExternal');
    Route::delete('users/{user}/avatar', 'Users\AvatarController@destroy');

    Route::group(['middleware' => 'two-factor'], function () {
        Route::put('users/{user}/2fa', 'Users\TwoFactorController@update');
        Route::post('users/{user}/2fa/verify', 'Users\TwoFactorController@verify');
        Route::delete('users/{user}/2fa', 'Users\TwoFactorController@destroy');
    });

    Route::get('users/{user}/sessions', 'Users\SessionsController@index');

    Route::get('/sessions/{session}', 'SessionsController@show');
    Route::delete('/sessions/{session}', 'SessionsController@destroy');

    Route::apiResource('roles', 'Authorization\RolesController')->except('show');
    Route::get('/roles/{roleId}', 'Authorization\RolesController@show');

    Route::get("roles/{role}/permissions", 'Authorization\RolePermissionsController@show');
    Route::put("roles/{role}/permissions", 'Authorization\RolePermissionsController@update');

    Route::apiResource('permissions', 'Authorization\PermissionsController');

    Route::get('/settings', 'SettingsController@index');

    Route::get('/countries', 'CountriesController@index');
});


Route::get('/dssinhvien', 'SinhvienController@dssinhvien');
Route::post('/themsinhvien', 'SinhvienController@themsinhvien');
Route::post('/suasinhvien', 'SinhvienController@updatesinhvien');
Route::delete('/xoasinhvien/{id}', 'SinhvienController@deletesinhvien');


//cay canh
Route::post('/them', 'CaycanhController@themcay');
Route::get('/dscay', 'CaycanhController@dscay');
Route::delete('xoa/{id}', 'CaycanhController@xoacay');
Route::post('sua', 'CaycanhController@suacay');

//sach
Route::post('/themsach', 'SachController@them');
Route::get('/dssach', 'SachController@danhsach');
Route::delete('/xoasach/{id}', 'SachController@xoa');
Route::post('/suasach', 'SachController@sua');