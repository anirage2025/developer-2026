<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GolferController;
use App\Http\Controllers\GolferExportController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/golfers/near', [GolferController::class, 'near']);
Route::get('/golfers/near/csv', [GolferExportController::class, 'nearCsv']);
