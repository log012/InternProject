<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Two\FacebookProvider;

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
    return redirect()->route('admin.home');
});

// Route::get('/home', function () {
//     return view('welcome');
// });

Route::middleware('auth')->group(function () {
    Route::get('/admin/dashboard',[AdminController::class,'dashboard'])->name('admin.dashboard');
    Route::get('/admin/profile',[AdminController::class,'profile'])->name('admin.profile');
});

// require __DIR__.'/auth.php';
// admin
Route::get('/login',[AdminController::class,'login'])->name('login');
Route::get('/register',[AdminController::class,'register'])->name('register');

Route::get('/admin/developer',[AdminController::class,'developer'])->name('admin.developer');
Route::get('/home',[AdminController::class,'home'])->name('admin.home'); 
Route::get('/admin/lead_data',[AdminController::class,'read_lead_message']);
Route::post('/logout',[AuthenticatedSessionController::class,'destroy'])->middleware('auth')->name('logout');
Route::get('/admin/user_detail/{name}',[AdminController::class,'getFacebookId'])->name('admin.user_detail'); // add /{name} to the route
// Facebook
Route::get('/facebook/login',[UserController::class,'userLogin']);
Route::get('/facebook/callback',[UserController::class,'userCallback']);
// Route::post('/logout',[AuthenticatedSessionController::class,'destroy'])->name('logout')->middleware('auth');

