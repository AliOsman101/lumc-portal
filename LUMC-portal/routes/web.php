<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\RadiologyRequestController;
use App\Http\Controllers\LaboratoryController;
use App\Http\Controllers\NutritionRequestController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('public.home');
})->name('home');

/**
 * Direct-access routes (no login) for UI testing.
 * Enabled only in local environment.
 */
if (app()->isLocal()) {
    Route::prefix('test')->name('test.')->group(function () {
        Route::view('/login', 'auth.login')->name('login');
        Route::view('/register', 'auth.register')->name('register');

        Route::view('/admin', 'admin.dashboard')->name('admin');
        Route::view('/doctor', 'doctor.dashboard')->name('doctor');
        Route::view('/nurse', 'nurse.dashboard')->name('nurse');
        Route::view('/patient', 'patient.dashboard')->name('patient');

        Route::view('/nursing_services/pews', 'nursing_services.pews')->name('nursing_services.pews');
        Route::view('/radiology/request', 'radiology.request')->name('radiology.request');
        Route::view('/nutrition_dietetics/request', 'nutrition_dietetics.request')->name('nutrition.request');
        Route::view('/clinical_laboratory/request', 'clinical_laboratory.request')->name('clinical_laboratory.request');
        Route::view('/nursing_services/red_monitoring_checklist', 'nursing_services.red_monitoring_checklist')->name('nursing_services.red_monitoring_checklist');
        Route::view('/nursing_services/nfaprep', 'nursing_services.nfaprep')->name('nursing_services.nfaprep');
    });
}

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

    Route::view('/nursing_services/pews', 'nursing_services.pews')->name('nursing_services.pews');
    Route::view('/nursing_services/nfaprep', 'nursing_services.nfaprep')->name('nursing_services.nfaprep');

    // Radiology request form (authenticated)
    Route::get('/radiology/request', [RadiologyRequestController::class, 'create'])->name('radiology.request.create');
    Route::post('/radiology/request', [RadiologyRequestController::class, 'store'])->name('radiology.request.store');
    Route::get('/radiology/patient', [RadiologyRequestController::class, 'findPatient'])->name('radiology.patient.find');

    // Nutrition request form (authenticated)
    Route::get('/nutrition_dietetics/request', [NutritionRequestController::class, 'create'])->name('nutrition.request.create');
    Route::post('/nutrition_dietetics/request', [NutritionRequestController::class, 'store'])->name('nutrition.request.store');

    // Clinical Laboratory request form (authenticated)
    Route::get('/clinical_laboratory/request', [LaboratoryController::class, 'create'])->name('laboratory.request.create');
    Route::post('/clinical_laboratory/request', [LaboratoryController::class, 'store'])->name('laboratory.request.store');
    Route::get('/clinical_laboratory/request/{laboratoryRequest}/print', [LaboratoryController::class, 'print'])->name('laboratory.request.print');

    // Profile Routes (accessible by all authenticated users)
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
