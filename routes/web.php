<?php

// Importing controllers used in this routes file
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\MaintenanceController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\RentalController;
use App\Models\Payment;

/*
|--------------------------------------------------------------------------
| Public Routes (No authentication required)
|--------------------------------------------------------------------------
*/

// Landing page / welcome page
Route::get('/', function () {
    return view('welcome');
})->name('welcome');

/*
|--------------------------------------------------------------------------
| Dashboard Route (Authenticated & Verified users only)
|--------------------------------------------------------------------------
*/

// User dashboard after login
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

/*
|--------------------------------------------------------------------------
| Profile Management Routes (Authenticated users)
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    // Show user profile page
    Route::get('/profile', [ProfileController::class, 'show'])
        ->name('profile.show');

    // Edit profile form page
    Route::get('/profile/edit', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    // Update profile info
    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    // Delete user account
    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');
});


// Route::middleware('auth')->group(function () {

//     // show profile pages
//     Route::get('/profile', [ProfileController::class, 'show'])
//         ->name('profile.show')
//         ->middleware('auth');

//     // Show profile edit form
//     Route::get('/profile', [ProfileController::class, 'edit'])
//         ->name('profile.edit');

//     // Update profile information
//     Route::patch('/profile', [ProfileController::class, 'update'])
//         ->name('profile.update');

//     // Delete user account
//     Route::delete('/profile', [ProfileController::class, 'destroy'])
//         ->name('profile.destroy');
// });

/*
|--------------------------------------------------------------------------
| Admin Dashboard Routes (Admin only)
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'role:admin'])->group(function () {

    // Admin dashboard page
    Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])
        ->name('admin.dashboard');
});

/*
|--------------------------------------------------------------------------
| Vehicle Management Routes
|--------------------------------------------------------------------------
| Resource route automatically creates:
| index, create, store, show, edit, update, destroy
*/

Route::resource('vehicles', VehicleController::class)
    ->middleware(['auth']);

/*
|--------------------------------------------------------------------------
| Rental Routes (Authenticated users)
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->group(function () {

    // Show available vehicles for rent
    Route::get('/rent', [VehicleController::class, 'available'])
        ->name('rentals.available');

    // Show user's rental list
    Route::get('/rentals', [RentalController::class, 'index'])
        ->name('rentals.index');

    // Rental booking form for a specific vehicle
    Route::get('/rentals/create/{vehicle}', [RentalController::class, 'create'])
        ->name('rentals.create');

    // Store new rental booking
    Route::post('/rentals', [RentalController::class, 'store'])
        ->name('rentals.store');
});

/*
|--------------------------------------------------------------------------
| Rental Booking Confirmation
|--------------------------------------------------------------------------
*/

// Show booking confirmation after rental is created
Route::get('/rentals/confirmation/{rental}', [RentalController::class, 'confirmation'])
    ->name('rentals.confirmation')
    ->middleware('auth');

/*
|--------------------------------------------------------------------------
| Admin Rental Approval Routes (Admin only)
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'role:admin'])->group(function () {

    // View all rentals (admin side)
    Route::get('/admin/rentals', [RentalController::class, 'adminIndex'])
        ->name('admin.rentals');

    // Approve a rental request
    Route::post('/admin/rentals/{rental}/approve', [RentalController::class, 'approve'])
        ->name('rentals.approve');

    // Reject a rental request
    Route::post('/admin/rentals/{rental}/reject', [RentalController::class, 'reject'])
        ->name('rentals.reject');
});

/*
|--------------------------------------------------------------------------
| Payment Routes (Authenticated users)
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->group(function () {

    // Show payment page for a rental
    Route::get('/payment/{rental}', [PaymentController::class, 'create'])
        ->name('payment.create');

    /*
    |-------------------------
    | eSewa Payment Routes
    |-------------------------
    */

    // Initiate eSewa payment
    Route::post('/payment/esewa/{rental}', [PaymentController::class, 'esewa'])
        ->name('payment.esewa');

    // eSewa payment success callback
    Route::get('/payment/esewa/success', [PaymentController::class, 'esewaSuccess'])
        ->name('payment.esewa.success');

    // eSewa payment failure callback
    Route::get('/payment/esewa/failure', [PaymentController::class, 'esewaFailure'])
        ->name('payment.esewa.failure');

    /*
    |-------------------------
    | Khalti Payment Routes
    |-------------------------
    */

    // Initiate Khalti payment
    Route::post('/payment/khalti/{rental}', [PaymentController::class, 'khalti'])
        ->name('payment.khalti');

    // Verify Khalti payment
    Route::post('/payment/khalti/verify', [PaymentController::class, 'khaltiVerify'])
        ->name('payment.khalti.verify');
});

/*
|--------------------------------------------------------------------------
| Maintenance Routes (Admin only)
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'role:admin'])->group(function () {

    // View maintenance records
    Route::get('/admin/maintenance', [MaintenanceController::class, 'index'])
        ->name('maintenance.index');

    // Show maintenance create form
    Route::get('/admin/maintenance/create', [MaintenanceController::class, 'create'])
        ->name('maintenance.create');

    // Store new maintenance record
    Route::post('/admin/maintenance', [MaintenanceController::class, 'store'])
        ->name('maintenance.store');

    // Mark maintenance as completed
    Route::post('/admin/maintenance/{maintenance}/complete', [MaintenanceController::class, 'complete'])
        ->name('maintenance.complete');
});

/*
|--------------------------------------------------------------------------
| Authentication Routes (Login, Register, Forgot Password etc.)
|--------------------------------------------------------------------------
*/


// Contact form routes
Route::get('/contact', [ContactController::class, 'create'])->name('contact'); // show form
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store'); // submit form

// Admin messages routes (alternative, without prefix group)
Route::get('/admin/messages', [ContactController::class, 'index'])->name('admin.messages'); // list all messages
Route::get('/admin/messages/{id}', [ContactController::class, 'show'])->name('admin.messages.view'); // view single message

require __DIR__ . '/auth.php';
