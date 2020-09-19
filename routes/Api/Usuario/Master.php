<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::prefix('usuario')->group(function () {

    require('Register.php');

});
