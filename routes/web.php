<?php

use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\HomeController;
use App\Models\Application;
use App\Services\SSLInfo;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index']);

Route::get('/test', function () {
});

Route::get('/application/create', [ApplicationController::class, 'create'])->name('application.create');
Route::get('/application/{application}', [ApplicationController::class, 'show'])->name('application.show');
Route::post('/application', [ApplicationController::class, 'store'])->name('application.store');
