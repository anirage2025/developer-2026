<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GolferController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/golfers/near', [GolferController::class, 'near']);
