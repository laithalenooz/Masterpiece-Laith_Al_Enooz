<?php
    // Login routes
    Route::get('/login', 'Auth\ClinicLoginController@showLoginForm')->name('clinic.login');
    Route::post('/login', 'Auth\ClinicLoginController@login')->name('clinic.login.submit');

    // Logout route
    Route::post('/logout', 'Auth\ClinicLoginController@logout')->name('clinic.logout');

    // Register Route
    Route::get('/register', 'Auth\ClinicRegisterController@showRegisterForm')->name('clinic.register');
    Route::post('/register', 'Auth\ClinicRegisterController@register')->name('clinic.register.submit');

    // Password reset routes
    Route::get('/password/reset', 'Auth\ClinicForgotPasswordController@showLinkRequestForm')->name('clinic.password.request');
    Route::post('/password/email', 'Auth\ClinicForgotPasswordController@sendResetLinkEmail')->name('clinic.password.email');
    Route::get('/password/reset/{token}', 'Auth\ClinicResetPasswordController@showResetForm')->name('clinic.password.reset');
    Route::post('/password/reset', 'Auth\ClinicResetPasswordController@reset')->name('clinic.password.update');