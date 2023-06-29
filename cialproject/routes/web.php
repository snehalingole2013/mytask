<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\AboutController;
use App\Http\Controllers\Frontend\ContactController;
use App\Http\Controllers\Frontend\IndexController;
use App\Http\Controllers\Frontend\ServicesController;
use App\Http\Controllers\Frontend\TeamController;

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
Route::get('/', [IndexController::class,'index']);
Route::get('/about', [AboutController::class,'index']);
Route::get('/contact', [ContactController::class,'index']);
Route::get('/services', [ServicesController::class,'index']);
Route::get('/team', [TeamController::class,'index']);
Route::get('/contactpage', [CialprojectController::class, 'create'])->name('contactpage.create');
Route::post('/contactpage', [CialprojectController::class, 'store']);
