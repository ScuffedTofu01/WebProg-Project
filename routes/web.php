<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TipController;
use App\Http\Controllers\ResourceController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\DashboardAdminController;
use App\Http\Controllers\Admin\TipAdminController;
use App\Http\Controllers\Admin\ResourceAdminController;
use App\Http\Controllers\Admin\FeedbackAdminController;

Route::get('/', [HomeController::class, 'index']);
Route::get('/tips', [TipController::class, 'index']);
Route::get('/tips/{tip}', [TipController::class, 'show']);
Route::get('/resources', [ResourceController::class, 'index']);
Route::get('/feedback/{tip_id}', [FeedbackController::class, 'create']);
Route::post('/feedback', [FeedbackController::class, 'store']);
Route::get('/about', [AboutController::class, 'index']);

// AUTH
Route::get('/register', [AuthController::class, 'showRegister'])->middleware('guest');
Route::post('/register', [AuthController::class, 'register'])->middleware('guest');

Route::get('/login', [AuthController::class, 'showLogin'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'login'])->middleware('guest');

Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth');

// ADMIN CRUD
Route::prefix('admin')->group(function () {
    Route::get('/', [DashboardAdminController::class, 'index']);

    Route::get('/tips', [TipAdminController::class, 'index']);
    Route::get('/tips/create', [TipAdminController::class, 'create']);
    Route::post('/tips', [TipAdminController::class, 'store']);
    Route::get('/tips/{tip}/edit', [TipAdminController::class, 'edit']);
    Route::put('/tips/{tip}', [TipAdminController::class, 'update']);
    Route::delete('/tips/{tip}', [TipAdminController::class, 'destroy']);

    Route::get('/resources', [ResourceAdminController::class, 'index']);
    Route::get('/resources/create', [ResourceAdminController::class, 'create']);
    Route::post('/resources', [ResourceAdminController::class, 'store']);
    Route::get('/resources/{resource}/edit', [ResourceAdminController::class, 'edit']);
    Route::put('/resources/{resource}', [ResourceAdminController::class, 'update']);
    Route::delete('/resources/{resource}', [ResourceAdminController::class, 'destroy']);

    Route::get('/feedback', [FeedbackAdminController::class, 'index']);
    Route::delete('/feedback/{feedback}', [FeedbackAdminController::class, 'destroy']);
});