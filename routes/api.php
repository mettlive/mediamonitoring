<?php

use Illuminate\Support\Facades\Route;

Route::prefix('news')->group(function () {
    Route::post('', \App\Presenter\Http\Controllers\CreateNewsPageController::class);
    Route::post('report', \App\Presenter\Http\Controllers\CreateReportController::class);
    Route::get('', \App\Presenter\Http\Controllers\GetAllNewsPageController::class);
});
