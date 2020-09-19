<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Usuario\RegisterController;

Route::post(
    'registrar',
    [ RegisterController::class, 'index' ]
)->name('api.usuario.registrar');


