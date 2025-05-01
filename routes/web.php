<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\RoomController as AdminRoomController;
use App\Http\Controllers\Admin\RoomTypeController as AdminRoomTypeController;
use App\Http\Controllers\Admin\BookingController as AdminBookingController;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/home', function () {
    return view('home');
})->middleware(['auth', 'verified'])->name('home');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Rooms routes
Route::get('/rooms', [App\Http\Controllers\RoomController::class, 'index'])->name('rooms.index');
Route::get('/rooms/search', [App\Http\Controllers\RoomController::class, 'search'])->name('rooms.search');
Route::get('/rooms/type/{roomType}', [App\Http\Controllers\RoomController::class, 'byType'])->name('rooms.by-type');
Route::get('/rooms/{room}', [App\Http\Controllers\RoomController::class, 'show'])->name('rooms.show');

// Booking routes - requires authentication
Route::middleware(['auth'])->group(function () {
    Route::get('/rooms/{room}/book', [App\Http\Controllers\BookingController::class, 'create'])->name('bookings.create');
    Route::post('/rooms/{room}/book', [App\Http\Controllers\BookingController::class, 'store'])->name('bookings.store');
    Route::get('/booking/success', [App\Http\Controllers\BookingController::class, 'success'])->name('bookings.success');
    Route::get('/my-bookings', [App\Http\Controllers\BookingController::class, 'myBookings'])->name('bookings.my-bookings');
    Route::get('/booking/{booking}', [App\Http\Controllers\BookingController::class, 'show'])->name('bookings.show');
    Route::post('/booking/{booking}/cancel', [App\Http\Controllers\BookingController::class, 'cancel'])->name('bookings.cancel');
});

// Admin routes
Route::prefix('admin')->name('admin.')->middleware(['auth'])->group(function () {
    // Dashboard
    Route::get('/', [AdminDashboardController::class, 'index'])->name('dashboard');
    
    // Rooms management
    Route::resource('rooms', AdminRoomController::class);
    
    // Room types management
    Route::resource('room_types', AdminRoomTypeController::class);
    
    // Bookings management
    Route::resource('bookings', AdminBookingController::class)->except(['create', 'store']);
});

require __DIR__.'/auth.php';
