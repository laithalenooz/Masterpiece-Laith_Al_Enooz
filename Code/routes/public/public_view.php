<?php

Route::view('/', 'public.index')->name('home');
Route::get('/search', 'HomeController@search')->name('search');
Route::view('/privacy-policy', 'conditions.policy')->name('privacy-policy');
Route::view('/term-condition', 'conditions.terms')->name('term-condition');
