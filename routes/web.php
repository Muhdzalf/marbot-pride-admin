<?php

use App\Http\Controllers\DonationMethodController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DonasiController;
use App\Http\Controllers\KajianVideoController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\ThemeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UstadzController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Route::group(["middleware" => ['auth:sanctum', 'verified',]], function () {
    Route::view('/dashboard', "dashboard")->name('dashboard');

    // User Route
    Route::get('/user', [UserController::class, "index"])->name('user');
    Route::view('/user/new', "pages.user.user-new")->name('user.new');
    Route::view('/user/edit/{userId}', "pages.user.user-edit")->name('user.edit');
    Route::view('/user/detail/{userId}', "pages.user.user-detail")->name('user.detail');

    //Tema Route
    Route::get('/tema', [ThemeController::class, "index"])->name('tema');
    Route::view('/tema/new', "pages.tema.tema-new")->name('tema.new');
    Route::view('/tema/edit/{temaId}', "pages.tema.tema-edit")->name('tema.edit');
    Route::view('/tema/detail/{temaId}', "pages.tema.tema-detail")->name('tema.detail');

    //Tema Route
    Route::get('/tag', [TagController::class, "index"])->name('tag');
    Route::view('/tag/new', "pages.tag.tag-new")->name('tag.new');
    Route::view('/tag/edit/{tagId}', "pages.tag.tag-edit")->name('tag.edit');
    Route::view('/tag/detail/{tagId}', "pages.tag.tag-detail")->name('tag.detail');


    //Video Route
    Route::get('/video', [KajianVideoController::class, "index"])->name('video');
    Route::view('/video/new', 'pages.video.video-new')->name('video.new');
    Route::view('/video/edit/{videoId}', 'pages.video.video-edit')->name('video.edit');
    Route::view('/video/detail/{videoId}', 'pages.video.video-detail')->name('video.detail');

    //Category Route
    Route::get('/category', [CategoryController::class, "index"])->name('category');
    Route::view('/category/new', "pages.category.category-new")->name('category.new');
    Route::view('/category/edit/{categoryId}', "pages.category.category-edit")->name('category.edit');

    //Method Route
    Route::get('/method', [DonationMethodController::class, "index"])->name('method');
    Route::view('/method/new', "pages.method.method-new")->name('method.new');
    Route::view('/method/edit/{methodId}', "pages.method.method-edit")->name('method.edit');

    //Ustadz Route
    Route::get('/ustadz', [UstadzController::class, "index"])->name('ustadz');
    Route::view('/ustadz/new', "pages.ustadz.ustadz-new")->name('ustadz.new');
    Route::view('/ustadz/edit/{ustadzId}', "pages.ustadz.ustadz-edit")->name('ustadz.edit');
    Route::view('/ustadz/detail/{ustadzId}', "pages.ustadz.ustadz-detail")->name('ustadz.detail');


    //Donasi
    Route::get('/donation', [DonasiController::class, "index"])->name('donation');
    Route::view('/donation/new', "pages.donation.donation-new")->name('donation.new');
    Route::view('/donation/edit/{donationId}', "pages.donation.donation-edit")->name('donation.edit');

    //program
    Route::get('/program', [ProgramController::class, "index"])->name('program');
    Route::view('/program/new', "pages.program.program-new")->name('program.new');
    Route::view('/program/edit/{programId}', "pages.program.program-edit")->name('program.edit');
    Route::view('/program/detail/{programId}', 'pages.program.program-detail')->name('program.detail');
});
