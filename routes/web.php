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
<<<<<<< HEAD

Route::get('/home', function () {
    return view('welcome');
})->name('home');
=======
Route::get('/', function () {
    return redirect()->route('admin.home');
});
>>>>>>> b604ba043fa1ef4fd9e34980f2393f75832c56a6

// Route::get('/home', function () {
//     return view('welcome');
// });

Route::middleware('auth')->group(function () {
<<<<<<< HEAD
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/admin/dashboard',[AdminController::class,'dashboard'])->name('admin.dashboard');
Route::get('/admin/developer',[AdminController::class,'developer'])->name('admin.developer');
Route::get('/admin/home',[AdminController::class,'home'])->name('admin.home'); 
Route::get('/admin/lead_data',[AdminController::class,'read_lead_message']);
Route::post('/logout',[UserController::class,'logout'])->middleware('auth')->name('logout');
Route::get('/admin/user_detail',[AdminController::class,'getFacebookId'])->name('admin.user_detail');
=======
    Route::get('/admin/dashboard',[AdminController::class,'dashboard'])->name('admin.dashboard');
    Route::get('/admin/profile',[AdminController::class,'profile'])->name('admin.profile');
>>>>>>> b604ba043fa1ef4fd9e34980f2393f75832c56a6
});

// require __DIR__.'/auth.php';
// admin
<<<<<<< HEAD
 // add /{name} to the route
=======
Route::get('/login',[AdminController::class,'login'])->name('login');

Route::get('/admin/developer',[AdminController::class,'developer'])->name('admin.developer');
Route::get('/home',[AdminController::class,'home'])->name('admin.home'); 
Route::get('/admin/lead_data',[AdminController::class,'read_lead_message']);
Route::get('/admin/user_detail/{name}',[AdminController::class,'getFacebookId'])->name('admin.user_detail'); // add /{name} to the route
>>>>>>> b604ba043fa1ef4fd9e34980f2393f75832c56a6
// Facebook
Route::get('/facebook/login',[UserController::class,'userLogin']);
Route::get('/facebook/callback',[UserController::class,'userCallback']);
// Route::post('/logout',[AuthenticatedSessionController::class,'destroy'])->name('logout')->middleware('auth');

