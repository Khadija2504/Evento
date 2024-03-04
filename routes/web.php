<?php

use App\Http\Controllers\EventController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReservationController;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Contracts\Role;

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

Route::get('/dashboardUser', function () {
    return view('home');
})->middleware(['auth', 'role:utilisateur'])->name('user.home');

// dashboard
Route::get('/dashboard', [EventController::class, 'dashboard'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//users

Route::middleware(['auth', 'role:utilisateur'])->group(function (){
    Route::post('/reservation{id}', [ReservationController::class, 'reserve'])->name('reservetion');
    Route::get('/user/MyTickets', [ReservationController::class, 'myTickets'])->name('myTickets');
});
// all

Route::get('/event/showDetails{id}', [EventController::class, 'showDetails'])->name('showDetails');

// organisateur
Route::middleware(['auth', 'role:organisateur'])->group(function (){
    Route::get('/event/addForm', [EventController::class, 'addEventForm'])->name('addEventForm');
    Route::post('/event/addEvent', [EventController::class, 'addEvent'])->name('addEvent');

    Route::get('/event/editForm{id}', [EventController::class, 'editForm'])->name('editEventForm');
    Route::put('/event/editEvent{id}', [EventController::class, 'editEvent'])->name('editEvent');
});

// admin
Route::middleware(['auth', 'role:admin'])->group(function (){
    Route::get('/events/domand', [EventController::class, 'listEventsDomand'])->name('listEventsDomand');
    Route::get('/events/valid{id}', [EventController::class, 'validEvent'])->name('validEvent');
    Route::get('/events/invalid{id}', [EventController::class, 'invalidEvent'])->name('invalidEvent');
});

require __DIR__.'/auth.php';
