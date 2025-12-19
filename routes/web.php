<?php

use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\MaintenanceController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\RentalController;
use App\Models\Payment;

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
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])
        ->name('admin.dashboard');
});

Route::resource('vehicles', VehicleController::class)->middleware(['auth',]);


Route::middleware(['auth'])->group(function () {

    Route::get('/rent', [VehicleController::class, 'available'])
        ->name('rentals.available');

        
    Route::get('/rentals', [RentalController::class, 'index'])
        ->name('rentals.index');

    Route::get('/rentals/create/{vehicle}', [RentalController::class, 'create'])
        ->name('rentals.create');

    Route::post('/rentals', [RentalController::class, 'store'])
        ->name('rentals.store');
});
//Booking Confirmation Route
Route::get('/rentals/confirmation/{rental}', [RentalController::class, 'confirmation'])
    ->name('rentals.confirmation')
    ->middleware('auth');
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/rentals', [RentalController::class, 'adminIndex'])->name('admin.rentals');
    Route::post('/admin/rentals/{rental}/approve', [RentalController::class, 'approve'])->name('rentals.approve');
    Route::post('/admin/rentals/{rental}/reject', [RentalController::class, 'reject'])->name('rentals.reject');
});
Route::middleware(['auth'])->group(function () {

    Route::get('/payment/{rental}', [PaymentController::class, 'create'])
        ->name('payment.create');

    // eSewa
    Route::post('/payment/esewa/{rental}', [PaymentController::class, 'esewa'])
        ->name('payment.esewa');

    Route::get('/payment/esewa/success', [PaymentController::class, 'esewaSuccess'])
        ->name('payment.esewa.success');

    Route::get('/payment/esewa/failure', [PaymentController::class, 'esewaFailure'])
        ->name('payment.esewa.failure');

    // Khalti
    Route::post('/payment/khalti/{rental}', [PaymentController::class, 'khalti'])
        ->name('payment.khalti');

    Route::post('/payment/khalti/verify', [PaymentController::class, 'khaltiVerify'])
        ->name('payment.khalti.verify');
});

Route::middleware(['auth', 'role:admin'])->group(function () {

    Route::get('/admin/maintenance', [MaintenanceController::class, 'index'])
        ->name('maintenance.index');

    Route::get('/admin/maintenance/create', [MaintenanceController::class, 'create'])
        ->name('maintenance.create');

    Route::post('/admin/maintenance', [MaintenanceController::class, 'store'])
        ->name('maintenance.store');

    Route::post('/admin/maintenance/{maintenance}/complete', [MaintenanceController::class, 'complete'])
        ->name('maintenance.complete');
});
require __DIR__.'/auth.php';
