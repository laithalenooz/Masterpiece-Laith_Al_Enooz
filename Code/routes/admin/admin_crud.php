<?php

Route::middleware('auth:admin')->group(function (){
    // Dashboard route
    Route::get('/', 'AdminController@index')->name('admin.dashboard');
    Route::get('/appointments', 'AdminController@appointments')->name('admin.appointment');
    Route::get('/profile', function (){return view('admin.profile');})->name('admin.profile');
    Route::get('/settings', function (){return view('admin.settings');})->name('admin.settings');
    Route::get('/patients', 'AdminController@patientsView')->name('admin.patients');
    Route::post('/update/image', 'AdminController@imageUpdate')->name('admin.image.update');
    Route::post('/update/settings', 'AdminController@Settings')->name('settings.update');
    Route::post('/update/details', 'AdminController@update')->name('admin.details.update');
    Route::post('/update/password', 'AdminController@changePassword')->name('admin.password.change');
    Route::get('/delete/{id}/patient', 'AdminController@deletePatient')->name('delete.patient');
    Route::post('/create/speciality', 'SpecialityController@addSpeciality')->name('add.specialities');
    Route::get('/update/{id}/speciality', 'SpecialityController@updateSpeciality')->name('update.specialities');
    Route::get('/delete/{id}/speciality', 'SpecialityController@deleteSpeciality')->name('delete.speciality');
    Route::get('/delete/{id}/clinic', 'AdminController@deleteClinic')->name('delete.clinic');
    Route::post('/create/clinic', 'AdminController@addClinic')->name('add.Clinics');
});