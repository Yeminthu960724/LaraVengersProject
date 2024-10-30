<?php
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PlaceController;
use App\Http\Controllers\PlaceDetailController;
use App\Http\Controllers\CartController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\PlanDetailController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\EventController;

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

Route::get('/login',[LoginController::class, 'showLoginForm']);
Route::get('', [HomeController::class, 'index']);
Route::get('/Place', [PlaceController::class, 'index']);
Route::get('/PlaceDetail', [PlaceDetailController::class, 'index']);
Route::get('/Cart', [CartController::class, 'index']);
Route::get('/Plan', [PlanController::class, 'index']);
Route::get('/PlanDetail', [PlanDetailController::class, 'index']);
Route::get('/register',[RegisterController::class,'showRegisterForm'])->name('register');
Route::post('/register',[RegisterController::class,'register']);
Route::get('/password/reset',[ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::get('/Event', [EventController::class, 'index']);
<<<<<<< HEAD
Route::get('/api/events', [EventController::class, 'getEvents']);
Route::any('/chat', [ChatController::class, 'chat']);
Route::get('/Event/{id}', [EventController::class, 'detail'])->name('events.detail');
=======
>>>>>>> 4d33a7669954975f73a29fc98a13e98a60df853f




