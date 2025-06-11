<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\UserDashboardController;

use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\Admin\AdminEventController;
use App\Http\Controllers\Admin\AdminTicketController;
use App\Http\Controllers\Admin\AdminReportController;
use App\Http\Controllers\Admin\OrderStatusController;


// akses tanpa login

Route::get('/', function () {
    return view('home');
});

Route::get('/home', function () {
    return view('home');
})->name('home'); // ← ini penting


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


Route::get('/user-dashboard', [UserDashboardController::class, 'index'])
    ->middleware(['auth'])
    ->name('user.dashboard'); // ← ini penting




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


Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
   Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');

    Route::resource('/users', AdminUserController::class, ['as' => 'admin']);
    Route::resource('/events', AdminEventController::class, ['as' => 'admin']);
    Route::resource('/tickets', AdminTicketController::class, ['as' => 'admin']);

    Route::get('/reports', [AdminReportController::class, 'index'])->name('admin.reports.index');
});

require __DIR__ . '/auth.php';



// Route::get('/dashboard', function () {
// })->middleware(['auth', 'admin']);

Route::middleware(['auth'])->group(function () {
    Route::post('/orders', [OrderController::class, 'store'])->name('orders.store');
    Route::get('/orders/success/{order}', [OrderController::class, 'success'])->name('orders.success');
});


Route::get('/orders', [OrderStatusController::class, 'index'])->name('admin.orders.index');


Route::patch('/admin/orders/{order}/status', [App\Http\Controllers\Admin\OrderStatusController::class, 'update'])
    ->name('admin.orders.updateStatus');

    Route::patch('/admin/orders/{order}/cancel', [OrderStatusController::class, 'cancel'])
    ->name('admin.orders.cancel');


Route::patch('/admin/organizer/{user}/approve', [App\Http\Controllers\Admin\OrganizerApprovalController::class, 'approve'])
    ->name('admin.organizer.approve');


Route::post('/organizer/request', [App\Http\Controllers\OrganizerRequestController::class, 'store'])
    ->middleware('auth')
    ->name('organizer.request');
