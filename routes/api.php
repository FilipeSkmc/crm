<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\EnumController;
use App\Http\Controllers\LeadController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

/** Desprotegidas */
Route::post('login', [AuthController::class, 'login'])->name('login');
Route::get('enums', [EnumController::class, 'index']);

/** Autenticadas */
Route::middleware('auth:sanctum')->prefix('api')->group(function () {
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('check-auth', [AuthController::class, 'checkAuth']);
    Route::apiResource('leads', LeadController::class);
});
