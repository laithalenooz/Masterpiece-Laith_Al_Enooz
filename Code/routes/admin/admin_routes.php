<?php
Route::prefix('admin')->group(function () {
    require_once ('admin_auth.php');
    require_once ('admin_crud.php');
    Route::get('/specialities', 'AdminController@showSpecialities')->name('admin.specialities');
    Route::get('/clinics', 'AdminController@showClinics')->name('admin.clinics');
});