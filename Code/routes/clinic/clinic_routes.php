<?php
Route::prefix('clinic')->group(function () {
require_once ('clinic_auth.php');
require_once ('clinic_user.php');
});