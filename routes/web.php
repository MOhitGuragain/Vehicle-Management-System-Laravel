<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\RentalController;

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
    Route::get('/admin/dashboard', function () {
        return "Welcome Admin";
    });
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
require __DIR__.'/auth.php';
