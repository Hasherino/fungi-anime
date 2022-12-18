<?php

use App\Http\Controllers\AnimeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PhraseController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ThreadController;
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

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/forum/create', function () {
    return view('forum.create');
});

Route::get('/profile/register', function () {
    return view('profile.register');
});

Route::get('/profile/edit', function () {
    return view('profile.edit');
});

Route::get('/anime/create', function () {
    return view('profile.create-anime');
});

Route::get('/forum', [ThreadController::class, 'index']);
Route::post('/forum/create', [ThreadController::class, 'create']);
Route::get('/forum/edit/{id}', [ThreadController::class, 'edit']);
Route::post('/forum/update/{id}', [ThreadController::class, 'update']);
Route::get('/forum/delete/{id}', [ThreadController::class, 'destroy']);
Route::get('/forum/{id}', [ThreadController::class, 'show']);

Route::get('/anime/delete/{id}', [AnimeController::class, 'destroy']);
Route::post('/anime/create', [AnimeController::class, 'create']);
Route::post('/anime/create/kitsu', [AnimeController::class, 'createKitsu']);

Route::post('/comment/create', [ThreadController::class, 'createComment']);
Route::get('/comment/edit/{id}', [ThreadController::class, 'editComment']);
Route::post('/comment/update/{id}', [ThreadController::class, 'updateComment']);
Route::get('/comment/delete/{id}', [ThreadController::class, 'destroyComment']);

Route::get('/profile/confirm/{id}', [ProfileController::class, 'confirm']);
Route::post('/profile/update', [ProfileController::class, 'update']);
Route::get('/profile/delete', [ProfileController::class, 'destroy']);
Route::post('/profile/search', [ProfileController::class, 'search']);
Route::get('/profile/{id}', [ProfileController::class, 'show']);

Route::post('/phrase', [PhraseController::class, 'update']);
