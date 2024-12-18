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
use App\Http\Controllers\EventDetailController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AuthController;

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


Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::get('', [HomeController::class, 'index'])->name('home');
Route::resource('Place', PlaceController::class);
Route::get('/PlaceDetail', [PlaceDetailController::class, 'index']);
Route::post('/Cart/add', [CartController::class, 'addToCart'])->name('cart.add');
Route::get('/Cart', [CartController::class, 'viewCart'])->name('cart.view');
Route::post('/Cart/remove/{placeId}', [CartController::class, 'removeFromCart'])->name('cart.remove');
Route::post('/Cart/clear', [CartController::class, 'clearCart'])->name('cart.clear');
Route::get('/Plan', [PlanController::class, 'index']);
Route::get('/PlanDetail/{planId}', [PlanDetailController::class, 'index'])
    ->where('planId', 'osaka|kobe|kyoto|nara|wakayama|shiga|arashiyama|usj|arima|narapark|amanohashidate|himeji')
    ->name('plan.detail');
Route::get('/register',[RegisterController::class,'showRegisterForm'])->name('register');
Route::post('/register',[RegisterController::class,'register']);
Route::get('/password/reset',[ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::resource('Event', EventController::class);
Route::get('/EventDetail', [EventDetailController::class, 'index']);


// ログイン関連のルート
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

// マイプロフィール関連のルート
Route::get('/myprofile', [AuthController::class, 'showMyProfile'])->name('showMyProfile');
Route::post('/myprofile/password', [AuthController::class, 'updatePassword']);
Route::post('/logout', [AuthController::class, 'logout']);

// 登録関連のルート
Route::get('/register', [RegisterController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register'])->name('register.post');


