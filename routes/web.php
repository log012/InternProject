<?php

use App\Http\Controllers\AdminController;
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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
// admin
Route::get('/admin/dashboard',[AdminController::class,'dashboard']);
Route::get('/admin/lead_data',[AdminController::class,'read_lead_message']);
Route::get('/admin/user_detail/{name}',[AdminController::class,'getFacebookId']);
// Facebook
Route::get('/facebook/login',[UserController::class,'userLogin']);
Route::get('/facebook/callback',[UserController::class,'userCallback']);

