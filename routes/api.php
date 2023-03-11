<?php

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


Route::get('/portfolio',[App\Http\Controllers\ApiController::class,'allSelectPortfolio']);

Route::get('/project',[App\Http\Controllers\ApiController::class,'projectSelect']);

Route::get('/information',[App\Http\Controllers\ApiController::class,'allSelectInformation']);

Route::post('/contactsend',[App\Http\Controllers\ApiController::class,'create']);
Route::get('/contact',[App\Http\Controllers\ApiController::class,'allContact']);
Route::get('/service',[App\Http\Controllers\ApiController::class,'allSelectService']);

Route::get('/chart',[App\Http\Controllers\ApiController::class,'allSelectChart']);