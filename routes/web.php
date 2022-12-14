<?php

use App\Http\Controllers\Criteria\CriteriaController;
use App\Http\Controllers\CsvController;
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
Route::get('/',[CsvController::class,'index']);
Route::post('/store',[CsvController::class,"store"])->name('store');
Route::get('/batch',[CsvController::class,"batch"]);