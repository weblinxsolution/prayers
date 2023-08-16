<?php

use App\Http\Controllers\ApiController;
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

// API For All Countries
Route::get('/countries', [ApiController::class, 'countries']);

// API For All Cities
Route::get('/cities', [ApiController::class, 'cities']);

// API For All Articles
Route::get('/articles', [ApiController::class, 'articles']);

// API For Getting Countries With Respect To Regions
Route::get('/countries/{id}', [ApiController::class, 'region_countries']);

// API For Getting Cities With Respect To Countries
Route::get('/cities/{id}', [ApiController::class, 'country_cities']);
