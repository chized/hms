<?php

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
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EventController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [HomeController::class, 'aboutus'])->name('aboutus');
//Route::get('/', function () {    return view('home');});
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ForgotPasswordController;

/* Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout'); */

Route::get('/forgot-password', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('/forgot-password', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('/reset-password/{token}', [ForgotPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('/reset-password', [ForgotPasswordController::class, 'reset']);

//Show Register/Create Form
Route::get('/register', [UserController::class, 'create'])->name('register');
//->middleware('guest') this ensures that the logged in does see the register page

//Create new user
Route::post('/users', [UserController::class, 'store'])->name('store');


//Show registration success
Route::get('/register/success', [UserController::class, 'showRegistrationSuccess'])->name('registration.success');

Route::get('/register/verification', [UserController::class, 'showRegistrationSuccess'])->name('verification.resend');

//Log user out
Route::post('/logout', [UserController::class, 'logout'])->name('logout')->middleware('auth');

//Show login form
Route::get('/login', [UserController::class, 'login'])->name('login');
//->name('login') is used so that middleware auth can find the login route (learnt for laragig traversy tutorial)

// Login user
Route::post('/users/authenticate', [UserController::class, 'authenticate'])->name('authenticate');

//Get email validation
Route::get('/email/validation', [EmailValidationController::class, 'validateEmail'])->name('email.validation');

//Show forgot password form
Route::get('/forgot_password', [UserController::class, 'forgotPassword'])->name('forgot_password');

//Events routes

Route::get('/events', [EventController::class, 'index'])->name('events.index');
Route::get('/events/show', [EventController::class, 'show'])->name('events.show');
Route::get('/events/create', [EventController::class, 'create'])->name('events.create');
Route::post('/events', [EventController::class, 'store'])->name('events.store');
Route::post('/events/edit', [EventController::class, 'store'])->name('events.edit');
Route::post('/events/destroy', [EventController::class, 'store'])->name('events.destroy');

//Dashboard routes
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth');
Route::get('/dashboard/all_events', [DashboardController::class, 'all_events'])->name('all_events')->middleware('auth');