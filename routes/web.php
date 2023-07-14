<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\RegionController;

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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/store/add', [StoreController::class, 'view']);
Route::post('/store/add', [StoreController::class, 'submit']);
Route::get('/region/add', [RegionController::class, 'view']);
Route::post('/region/add', [RegionController::class, 'submit']);
Route::get('/store/addrelation', [StoreController::class, 'relationship']);
Route::post('/store/addrelation', [StoreController::class, 'relationship_submit']);
Route::get('/region/addrelation', [RegionController::class, 'relationship']);
Route::post('/region/addrelation', [RegionController::class, 'relationship_submit']);
