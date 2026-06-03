<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebController;

Route::get('/', [WebController::class, 'beranda']);
Route::get('/beranda', [WebController::class, 'beranda']);
Route::get('/profil', [WebController::class, 'profil']);
Route::get('/detail/{id}', [WebController::class, 'detail']);