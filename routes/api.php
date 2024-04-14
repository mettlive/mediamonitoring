<?php

use Illuminate\Support\Facades\Route;

Route::prefix('news')->group(function () {
    Route::post('', \App\Infrastructure\Http\Controllers\CreateNewsPageController::class);
    Route::post('report', \App\Infrastructure\Http\Controllers\CreateReportController::class);
    Route::get('', \App\Infrastructure\Http\Controllers\GetAllNewsPageController::class);
});
