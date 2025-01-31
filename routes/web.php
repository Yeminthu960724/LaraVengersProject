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
use App\Http\Controllers\ResultController;
use App\Http\Controllers\FooterPagesController;
use App\Http\Controllers\TestController;


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
Route::post('/Cart/remove/{itemId}', [CartController::class, 'removeFromCart'])->name('cart.remove');
Route::post('/Cart/clear', [CartController::class, 'clearCart'])->name('cart.clear');
Route::post('/Cart/post', [CartController::class, 'post']);
Route::get('/Plan', [PlanController::class, 'index']);
Route::get('/PlanDetail/{planId}', [PlanDetailController::class, 'index'])
    ->where('planId', 'osaka|kobe|kyoto|nara|wakayama|shiga|arashiyama|usj|arima|narapark|amanohashidate|himeji')
    ->name('plan.detail');
Route::get('/register',[RegisterController::class,'showRegisterForm'])->name('register');
Route::post('/register',[RegisterController::class,'register']);
Route::get('/password/reset',[ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::resource('Event', EventController::class);
Route::get('/EventDetail', [EventDetailController::class, 'index']);
Route::get('/Result', [ResultController::class, 'index']);
Route::post('/api/chat', [ResultController::class, 'chat']);
Route::post('/api/generate-plan', [ResultController::class, 'generatePlan']);
//////test//////
Route::get('/Test', [TestController::class, 'index']);
Route::post('/api/chat', [TestController::class, 'chat']);

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

// フッター関連のルート
Route::get('/about', [FooterPagesController::class, 'about'])->name('about');
Route::get('/terms', [FooterPagesController::class, 'terms'])->name('terms');
Route::get('/privacy', [FooterPagesController::class, 'privacy'])->name('privacy');
Route::get('/guide', [FooterPagesController::class, 'guide'])->name('guide');
Route::get('/faq', [FooterPagesController::class, 'faq'])->name('faq');


