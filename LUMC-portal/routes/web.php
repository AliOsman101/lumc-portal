<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\RadiologyRequestController;


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

Route::get('/test/pews', function () {
    return view('pews');
})->name('test.pews');


Route::get('/test/radiology/request', function () {
    return view('radiology.request');
})->name('test.radiology.request');

Route::get('/test/nutrition/request', function () {
    return view('nutrition.request');
})->name('test.nutrition.request');


// Role-Based Dashboard Routes (WITH AUTHENTICATION)
Route::middleware(['auth', 'verified'])->group(function () {

    // Redirect to appropriate dashboard based on role
    Route::get('/dashboard', function () {
        $user = Auth::user();

        return match ($user->role) {
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

    Route::get('/pews', function () {
        return view('pews');
    });

    // Radiology request form (authenticated)
    Route::get('/radiology/request', [RadiologyRequestController::class, 'create'])->name('radiology.request.create');
    Route::post('/radiology/request', [RadiologyRequestController::class, 'store'])->name('radiology.request.store');
    Route::get('/radiology/patient', [RadiologyRequestController::class, 'findPatient'])->name('radiology.patient.find');

    // Nutrition request form (authenticated)
    Route::get('/nutrition/request', [\App\Http\Controllers\NutritionRequestController::class, 'create'])->name('nutrition.request.create');
    Route::post('/nutrition/request', [\App\Http\Controllers\NutritionRequestController::class, 'store'])->name('nutrition.request.store');


    // Profile Routes (accessible by all authenticated users)
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
