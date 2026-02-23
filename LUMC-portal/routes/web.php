<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\NurseNoteController;
use App\Http\Controllers\MedicationRecordController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// ✅ Home
Route::get('/', function () {
    return view('public.home');
})->name('public.home');

// ✅ Dashboard (Breeze default)
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// ✅ Profile (Breeze)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// ✅ Pages
Route::get('/patient/personal-profile', function () {
    return view('patient.profile');
})->name('patient.personal-profile');

Route::get('/doctor/dashboard', function () {
    return view('doctor.dashboard');
})->middleware('auth')->name('doctor.dashboard');

// ✅ Nurse Notes (GET form + POST save)
Route::prefix('nurse')->name('nurse.')->group(function () {
// Route::middleware('auth')->prefix('nurse')->name('nurse.')->group(function () {
    Route::get('/notes', [NurseNoteController::class, 'create'])->name('notes');
    Route::post('/notes', [NurseNoteController::class, 'store'])->name('notes.store');
    Route::get('/medication-records', [MedicationRecordController::class, 'create'])->name('medication.records');
    Route::post('/medication-records', [MedicationRecordController::class, 'store'])->name('medication.records.store');
});

// Route::middleware('auth')->prefix('nurse')->name('nurse.')->group(function () {
//     // existing nurse notes routes...
//     // Route::get('/notes', ...);
//     // Route::post('/notes', ...);

//     // ✅ MEDICATION RECORDS
//     Route::get('/medication-records', [MedicationRecordController::class, 'create'])->name('medication.records');
//     Route::post('/medication-records', [MedicationRecordController::class, 'store'])->name('medication.records.store');
// });
// ✅ Auth routes (login/register)
require __DIR__.'/auth.php';