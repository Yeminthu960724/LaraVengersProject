<?php
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PlaceController;
use App\Http\Controllers\PlaceDetailController;
use App\Http\Controllers\CartController;
use Illuminate\Support\Facades\Route;

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
Route::get('', [HomeController::class, 'index']);
Route::get('/Place', [PlaceController::class, 'index']);
Route::get('/PlaceDetail', [PlaceDetailController::class, 'index']);
Route::get('/Cart', [CartController::class, 'index']);
