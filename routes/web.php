<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\ProfileController;

// akses tanpa login

Route::get('/', function () {
    return view('home');
});

Route::get('/home', function () {
    return view('home');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/about', [TeamController::class, 'about'])->name('about');

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/event-list', function () {
    return view('event-list');
});

// akses perlu login

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth'])->group(function () {
    Route::resource('tickets', TicketController::class)->except(['show']);

    
    // Halaman Buat Event
    Route::get('/event/create', [EventController::class, 'create'])->name('event.create');
    
    // Proses Simpan Event
    Route::post('/event', [EventController::class, 'store'])->name('event.store');
    
    // CRUD Resource untuk Event & Tickets
    Route::resource('event', EventController::class)->except(['create', 'store']);
    Route::resource('tickets', TicketController::class);
});

// Daftar Event
Route::get('/event-list', [EventController::class, 'index'])->name('event-list');



require __DIR__ . '/auth.php';
