<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



require_once ('public/public_view.php');

Auth::routes();

require_once ('patient/user_routes.php');

//Route::get('/home', 'HomeController@index');
Route::post('/user/logout', 'Auth\LoginController@userLogout')->name('user.logout');

// Social Login
require_once ('public/social_login.php');

// Admin Routing
require_once ('admin/admin_routes.php');

// Clinic Routing
require_once ('clinic/clinic_routes.php');