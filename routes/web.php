<?php

use App\Http\Controllers\CategorieController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\googleAuthController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReservationController;
use App\Models\Categorie;
use App\Models\Event;
use Illuminate\Support\Facades\Route;
use Spatie\Browsershot\Browsershot;
// use Spatie\Permission\Contracts\Role;

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

Route::get('/', [EventController::class, 'welcome']);

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
    Route::get('/invoice', [InvoiceController::class, 'generate'])->name('generate');

    Route::get('/filtre{id}', [EventController::class, 'filtre'])->name('filtre');

    Route::get('/filtreDate/{date}', [EventController::class, 'filtreDate'])->name('filtreDate');

    // Browsershot::url('https://example.com')->save('reservetion.pdf');
    // Browsershot::url('http://127.0.0.1:8000/user/MyTickets')
    // ->save('ticket.pdf');
});
// all

Route::get('/event/showDetails{id}', [EventController::class, 'showDetails'])->name('showDetails');
Route::post('/search', [EventController::class, 'search'])->name('search');

// Browsershot::html('Hello world')->savePdf('reservetion.pdf');
// Route::get('/pdf{id}', [InvoiceController::class, 'generate'])->name('generate');

// organisateur
Route::middleware(['auth', 'role:organisateur'])->group(function (){
    Route::get('/event/addForm', [EventController::class, 'addEventForm'])->name('addEventForm');
    Route::post('/event/addEvent', [EventController::class, 'addEvent'])->name('addEvent');

    Route::get('/event/editForm{id}', [EventController::class, 'editForm'])->name('editEventForm');
    Route::put('/event/editEvent{id}', [EventController::class, 'editEvent'])->name('editEvent');

    Route::get('/event/MyList', [EventController::class, 'myEvents'])->name('myEvents');

    Route::get('/reservations/domand', [ReservationController::class, 'listReservationsDomand'])->name('listReservationsDomand');
    Route::get('/reservations/valid{id}', [ReservationController::class, 'validReservation'])->name('validReservation');
    Route::get('/reservation/invalid{id}', [ReservationController::class, 'invalidReservation'])->name('invalidReservation');

    Route::delete('/event/deleteEvent{id}', [EventController::class, 'deleteEvent'])->name('deleteEvent');

    Route::get('/event/statistics/{id}', [EventController::class, 'statisticsReservation'])->name('statistics');
});

// admin
Route::middleware(['auth', 'role:admin'])->group(function (){
    Route::get('/events/domand', [EventController::class, 'listEventsDomand'])->name('listEventsDomand');
    Route::get('/events/valid{id}', [EventController::class, 'validEvent'])->name('validEvent');
    Route::get('/events/invalid{id}', [EventController::class, 'invalidEvent'])->name('invalidEvent');

    Route::get('/categoriesList', [CategorieController::class, 'listCategories'])->name('listCategories');
    Route::get('/categories/addForm', [CategorieController::class, 'addCategoryForm'])->name('addCategoryForm');
    Route::post('/categories/add', [CategorieController::class, 'addCategory'])->name('addCategory');
    Route::delete('/categories/delete{id}', [CategorieController::class, 'deleteCategory'])->name('deleteCategory');
    Route::get('/categories/editForm{id}', [CategorieController::class, 'editCategoryForm'])->name('editCategoryForm');
    Route::put('/categories/edit{id}', [CategorieController::class, 'editCategory'])->name('editCategory');

    Route::get('/event/statisticsEvents', [EventController::class, 'statisticsEvents'])->name('statisticsEvents');

    Route::get('/users/controllerList', [ProfileController::class, 'usersControllerList'])->name('usersControllerList');
    Route::get('/users/userActive{id}', [ProfileController::class, 'userActive'])->name('userActive');
    Route::get('/users/usersDisactive{id}', [ProfileController::class, 'userDisactive'])->name('userDisactive');

    Route::get('/users/reservationActive/{id}', [ProfileController::class, 'userReservationActive'])->name('userReservationActive');
    Route::get('/uses/reservationDisactive/{id}', [ProfileController::class, 'userReservationDisactive'])->name('userReservationDisactive');
});

// google authentification

Route::get('/auth/google/utilisateur', [googleAuthController::class, 'redirect'])->name('googleAuthentication');
Route::get('/auth/google/call-back', [googleAuthController::class, 'handleGoogleCallback'])->name('googleAuthenticationCallback');

Route::get('/auth/google/organisateur', [googleAuthController::class, 'handleGoogleCallbackOrganisateur'])->name('googleAuthenticationCallbackOrganisateur');

require __DIR__.'/auth.php';
