<?php

use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\dashboardController as dashboardController;
use App\Http\Controllers\Admin\EventController as AdminEventController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Organiser\EventController as OrganiserEventController;
use App\Http\Controllers\Organiser\ReservationController;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\ProfileController;
use App\Models\Event;
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



// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Admin routes ////////////////////

Route::middleware('admin')->prefix('admin')->name('admin.')->group(function(){

Route::get('/dashboard',[dashboardController::class,'index'])->name('dashboard');
    // User
Route::get('/users',[AdminUserController::class,'index'])->name('users');
Route::post('/users/ban/{user}',[AdminUserController::class,'ban'])->name('users.ban');
Route::post('/users/unban/{user}',[AdminUserController::class,'unban'])->name('users.unban');

    // category
Route::get('/categories',[AdminCategoryController::class,'index'])->name('categories');
Route::post('/categories/store',[AdminCategoryController::class,'store'])->name('categories.store');
Route::patch('/categories/update/{category}',[AdminCategoryController::class,'update'])->name('categories.update');
Route::delete('/categories/delete/{category}',[AdminCategoryController::class,'destroy'])->name('categories.delete');

    // event
Route::get('/events',[AdminEventController::class,'index'])->name('events'); 
Route::post('/events/accept/{event}',[AdminEventController::class,'accept'])->name('events.accept'); 

});

// Organiser routes ////////////////////

Route::prefix('organiser')->group(function(){
    // event
Route::get('/dashboard/events',[OrganiserEventController::class,'index'])->name('organiser.events');
Route::get('/events/create',[OrganiserEventController::class,'create'])->name('organiser.events.create');
Route::post('/events/store',[OrganiserEventController::class,'store'])->name('organiser.events.store');
    //reservations
Route::get('/dashboard/reservations',[ReservationController::class,'index'])->name('organiser.reservations');   
Route::post('/dashboard/reservations/accept/{reservation}',[ReservationController::class,'accept'])->name('organiser.reservations.accept');
});


// Homepage routes /////////////////////

Route::get('/',[HomeController::class,'index'])->name('welcome');
Route::get('/details/{id}',[HomeController::class,'show'])->name('events.details');
Route::get('/reservation/{eventId}',[HomeController::class,'reservation'])->name('events.reservation');
Route::get('/requests',[HomeController::class,'requests'])->name('requests');
// Route::get('/generate-pdf', [PDFController::class, 'generatePDF']);

require __DIR__.'/auth.php';
