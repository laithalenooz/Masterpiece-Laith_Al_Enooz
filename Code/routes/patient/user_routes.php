<?php

Route::middleware('auth:web')->group(function (){
    Route::view('/profile', 'patient.patient_profile')->name('user.profile');
    Route::post('/profile/update', 'PatientController@update')->name('update.profile');
    Route::view('/profile/change_password', 'patient.change_password')->name('changePassword.page');
    Route::post('/profile/password_update', 'PatientController@changePatientPassword')->name('updatePatientPassword');
    Route::post('/{id}/book', 'HomeController@Book')->name('public.book');
    Route::view('/profile/dashboard', 'patient.dashboard')->name('user.dashboard');
    Route::get('/{id}/clinic', 'HomeController@showClinic')->name('single.clinic');
    Route::get('/clinics', 'HomeController@allClinics')->name('public.clinics');
});