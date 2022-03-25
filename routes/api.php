<?php

use App\Http\Controllers\API\CategoryController;
use App\Http\Controllers\API\DonationController;
use App\Http\Controllers\API\DonationMethodController;
use App\Http\Controllers\API\KajianThemeController;
use App\Http\Controllers\API\KajianVideoController;
use App\Http\Controllers\API\ProgramController;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\UstadzController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->group(
    function () {
        Route::get('user', [UserController::class, 'fetch']);
        Route::post('update', [UserController::class, 'updateProfile']);
        Route::post('logout', [UserController::class, 'logout']);
        Route::post('checkout', [DonationController::class, 'checkout']);
        Route::get('donation', [DonationController::class, 'all']);
    }
);


Route::post('register', [UserController::class, 'register']);
Route::post('login', [UserController::class, 'login']);
Route::get('category', [CategoryController::class, 'all']);
Route::get('method', [DonationMethodController::class, 'all']);
Route::get('theme', [KajianThemeController::class, 'all']);
Route::get('video', [KajianVideoController::class, 'all']);
Route::get('ustadz', [UstadzController::class, 'all']);
Route::get('program', [ProgramController::class, 'all']);
