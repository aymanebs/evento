<?php

use App\Http\Controllers\Admin\CategoryController as CategoryController;
use App\Http\Controllers\Admin\dashboardController as dashboardController;
use App\Http\Controllers\Admin\UserController as UserController;
use App\Http\Controllers\ProfileController;
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

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Admin routes ////////////////////

Route::prefix('admin')->name('admin.')->group(function(){

Route::get('/dashboard',[dashboardController::class,'index'])->name('dashboard');
    // User
Route::get('/users',[UserController::class,'index'])->name('users');
Route::post('/users/ban/{buyer}',[UserController::class,'ban'])->name('users.ban');
Route::post('/users/ban/{buyer}',[UserController::class,'unban'])->name('users.unban');

    // category
Route::get('/categories',[CategoryController::class,'index'])->name('categories');
Route::post('/categories/store',[CategoryController::class,'store'])->name('categories.store');
Route::patch('/categories/update/{category}',[CategoryController::class,'update'])->name('categories.update');
Route::delete('/categories/delete/{category}',[CategoryController::class,'destroy'])->name('categories.delete');
});



require __DIR__.'/auth.php';
