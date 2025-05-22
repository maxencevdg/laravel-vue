<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PlaylistController;

Route::middleware('check.api.key')->get('/playlists', [PlaylistController::class, 'apiIndex']);

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');