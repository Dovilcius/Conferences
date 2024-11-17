<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ConferenceController;
use App\Http\Controllers\ClientController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
Route::post('/login', [AuthenticatedSessionController::class, 'store']);

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/dashboard2', [ConferenceController::class, 'dashboardWorkerView'])->name('dashboard2');

    Route::get('/dashboard3', function () {
        return view('dashboard3');
    })->name('dashboard3');

    Route::prefix('conferences')->name('conferences.')->group(function () {
        Route::get('/', [ConferenceController::class, 'index'])->name('index'); 
        Route::post('/', [ConferenceController::class, 'store'])->name('store'); 
        Route::get('/{conference}/edit', [ConferenceController::class, 'edit'])->name('edit');
        Route::put('/{conference}', [ConferenceController::class, 'update'])->name('update');
        Route::delete('/{conference}', [ConferenceController::class, 'destroy'])->name('destroy');

        Route::get('/{id}', [ConferenceController::class, 'show'])->name('show');
        Route::post('/{id}/register', [ConferenceController::class, 'registerForConference'])->name('register');
        Route::post('/{id}/unregister', [ConferenceController::class, 'unregisterForConference'])->name('unregister');

        Route::get('/{id}/inform', [ConferenceController::class, 'inform'])->name('inform');
    });

    Route::prefix('contacts')->name('contacts.')->group(function () {
        Route::get('/', [ClientController::class, 'index'])->name('index');
        Route::get('/{id}/edit', [ClientController::class, 'edit'])->name('edit');
        Route::put('/{id}', [ClientController::class, 'update'])->name('update');
    });

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
