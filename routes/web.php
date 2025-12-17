<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\RentalController;
use App\Http\Controllers\MaintenanceController;

// Welcome / Dashboard
Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Profile routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Admin-only dashboard
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', function () {
        return "Welcome Admin";
    });
});

// Vehicle routes
Route::resource('vehicles', VehicleController::class)->middleware('auth');

// Rental routes
Route::middleware('auth')->group(function () {

    Route::get('/rent', [VehicleController::class, 'available'])
        ->name('rentals.available');

    Route::get('/rentals', [RentalController::class, 'index'])
        ->name('rentals.index');

    Route::get('/rentals/create/{vehicle}', [RentalController::class, 'create'])
        ->name('rentals.create');

    Route::post('/rentals', [RentalController::class, 'store'])
        ->name('rentals.store');

    // Booking confirmation
    Route::get('/rentals/confirmation/{rental}', [RentalController::class, 'confirmation'])
        ->name('rentals.confirmation');
});

// Admin rental approval/reject
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/rentals', [RentalController::class, 'adminIndex'])->name('admin.rentals');
    Route::post('/admin/rentals/{rental}/approve', [RentalController::class, 'approve'])->name('rentals.approve');
    Route::post('/admin/rentals/{rental}/reject', [RentalController::class, 'reject'])->name('rentals.reject');
});

require __DIR__ . '/auth.php';

// Maintenance routes

Route::middleware(['auth'])->group(function () {
    // Maintenance routes
    Route::get('/maintenance', [MaintenanceController::class, 'index'])->name('maintenance.index');
    Route::get('/maintenance/create', [MaintenanceController::class, 'create'])->name('maintenance.create');
    Route::post('/maintenance', [MaintenanceController::class, 'store'])->name('maintenance.store');
});

use App\Http\Controllers\ContactController;

// Contact form submit
Route::get('/contact', [ContactController::class, 'create'])
    ->name('contact');

Route::post('/contact', [ContactController::class, 'store'])
    ->name('contact.store');


// Admin messages
Route::get('/admin/messages/{id}', [ContactController::class, 'show']);
Route::get('/admin/messages', [ContactController::class, 'index'])
    ->name('admin.messages');


Route::middleware(['auth'])->group(function () {
    Route::get('/admin/messages', [ContactController::class, 'index'])
        ->name('admin.messages');

    Route::get('/admin/messages/{id}', [ContactController::class, 'show'])
        ->name('admin.messages.view');
});
