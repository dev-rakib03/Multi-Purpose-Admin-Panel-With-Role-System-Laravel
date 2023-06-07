<?php
use Illuminate\Support\Facades\Route;

//admin
use App\Http\Controllers\backend\Auth\ForgotPasswordController;
use App\Http\Controllers\backend\Auth\LoginController;
use App\Http\Controllers\backend\adminsController;
use App\Http\Controllers\backend\dashboardController;
use App\Http\Controllers\backend\rolesController;
use App\Http\Controllers\backend\usersController;
use App\Http\Controllers\backend\settingsController;
use App\Http\Controllers\backend\socialController;
use App\Http\Controllers\backend\page\adminhomeController;




/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register admin routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "admin" middleware group. Now create something great!
|
*/



// Admin Login Routes
Route::get('login', [LoginController::class,'showLoginForm'])->name('admin.login');
Route::post('login/submit', [LoginController::class,'login'])->name('admin.login.submit');

// Admin Forget Password Routes
Route::get('password/reset', [ForgotPasswordController ::class,'showLinkRequestForm'])->name('admin.password.request');
Route::post('password/reset/submit', [ForgotPasswordController ::class,'reset'])->name('admin.password.update');



//Dashboard
Route::get('dashboard', [dashboardController::class, 'index'])->name('admin.dashboard');
//role
Route::resource('roles',rolesController::class, ['names' => 'admin.roles']);
//users
Route::resource('users',usersController::class, ['names' => 'admin.users']);
//admin
Route::resource('admins',adminsController::class, ['names' => 'admin.admins']);
//Pages
Route::resource('pages/home',adminhomeController::class, ['names' => 'admin.pages.home']);
Route::post('pages/success/massage', [adminhomeController ::class, 'success_massage'])->name('admin.success.massage');
//settings
Route::resource('settings/site',settingsController::class, ['names' => 'admin.settings.site']);
Route::resource('settings/social',socialController::class, ['names' => 'admin.settings.social']);
// Logout Routes
Route::post('/logout/submit', [LoginController::class,'logout'])->name('admin.logout.submit');


