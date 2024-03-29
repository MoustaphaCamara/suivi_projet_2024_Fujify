<?php

use App\Http\Controllers\AlbumCoverController;
use App\Http\Controllers\AnimeController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ArtistController;
use App\Http\Controllers\Auth\LoginRegisterController;
use App\Http\Controllers\SongController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('animes', AnimeController::class);
Route::apiResource('artists', ArtistController::class);
Route::apiResource('songs', SongController::class);
Route::apiResource('album-covers', AlbumCoverController::class);

Route::controller(LoginRegisterController::class)->group(function () {
    Route::post('/register', 'register');
    Route::post('/login', 'login');
});

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [LoginRegisterController::class, 'logout']);
});
Route::get('/create-cache', [Controller::class, 'cache']);
