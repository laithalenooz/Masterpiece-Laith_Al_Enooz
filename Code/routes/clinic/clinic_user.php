<?php
Route::middleware('auth:clinic')->group(function (){
    // Dashboard route
    Route::get('/', 'ClinicController@index')->name('clinic.dashboard');
    Route::view('/dashboard', 'clinic.dashboard');
    Route::view('/profile', 'clinic.profile')->name('clinic.profile');
    Route::PUT('/avatar_update', 'ClinicController@updateAvatar')->name('clinic.updateAvatar');
    Route::PUT('/information_update/{clinic}', 'ClinicController@updateInformation')->name('clinic.updateInformation');
    Route::POST('/about_update', 'ClinicController@updateAbout')->name('clinic.updateAbout');
    Route::POST('/about_delete', 'ClinicController@deleteAbout')->name('clinic.deleteAbout');
    Route::POST('/update_location', 'ClinicController@updateLocation')->name('update_location');
    Route::POST('/update_password', 'ClinicController@updatePassword')->name('update_location');
});