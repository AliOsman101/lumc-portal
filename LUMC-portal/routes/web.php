<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Public Routes
Route::get('/', function () {
    return view('public.home');
})->name('home');

// ⚡ DIRECT ACCESS ROUTES (NO LOGIN REQUIRED - FOR TESTING ONLY)
Route::get('/test/patient', function () {
    return view('patient.dashboard');
})->name('test.patient');

Route::get('/test/doctor', function () {
    return view('doctor.dashboard');
})->name('test.doctor');

Route::get('/test/nurse', function () {
    return view('nurse.dashboard');
})->name('test.nurse');

Route::get('/test/admin', function () {
    return view('admin.dashboard');
})->name('test.admin');

Route::get('/test/login', function () {
    return view('auth.login');
})->name('test.login');

Route::get('/test/register', function () {
    return view('auth.register');
})->name('test.register');

// Auth Routes (login, register, etc.) are handled by Breeze/Laravel

// Role-Based Dashboard Routes (WITH AUTHENTICATION)
Route::middleware(['auth', 'verified'])->group(function () {
    
    // Redirect to appropriate dashboard based on role
    Route::get('/dashboard', function () {
        $user = Auth::user();
        
        return match($user->role) {
            'admin' => redirect()->route('admin.dashboard'),
            'doctor' => redirect()->route('doctor.dashboard'),
            'nurse' => redirect()->route('nurse.dashboard'),
            'patient' => redirect()->route('patient.dashboard'),
            default => abort(403, 'Unauthorized')
        };
    })->name('dashboard');

    // Admin Routes
    Route::middleware(['role:admin'])->prefix('admin')->name('admin.')->group(function () {
        Route::get('/dashboard', function () {
            return view('admin.dashboard');
        })->name('dashboard');
    });

    // Doctor Routes
    Route::middleware(['role:doctor'])->prefix('doctor')->name('doctor.')->group(function () {
        Route::get('/dashboard', function () {
            return view('doctor.dashboard');
        })->name('dashboard');
    });

    // Nurse Routes
    Route::middleware(['role:nurse'])->prefix('nurse')->name('nurse.')->group(function () {
        Route::get('/dashboard', function () {
            return view('nurse.dashboard');
        })->name('dashboard');
    });

    // Patient Routes
    Route::middleware(['role:patient'])->prefix('patient')->name('patient.')->group(function () {
        Route::get('/dashboard', function () {
            return view('patient.dashboard');
        })->name('dashboard');
    });

    // Profile Routes (accessible by all authenticated users)
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';