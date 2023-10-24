<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ZoneController;
use App\Http\Controllers\LocationController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/',[LocationController::class, 'index']);
Route::post('/store',[LocationController::class, 'store'])->name('store');

Route::get('/',[ZoneController::class,'addZone'])->name('addZone');
Route::post('/',[ZoneController::class,'addZone'])->name('addZone');
Route::get('/show', [ZoneController::class, 'show']);
Route::delete('/zone/{id}',[ZoneController::class,'delete'])->name('zone.delete');