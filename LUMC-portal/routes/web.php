<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\NurseNoteController;
use App\Http\Controllers\MedicationRecordController;
use App\Http\Controllers\NutritionScreeningController;
use App\Http\Controllers\PatientHistoryController;
use App\Http\Controllers\PhysicalExamController;

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

Route::prefix('nurse')->name('nurse.')->group(function () {
// Route::middleware('auth')->prefix('nurse')->name('nurse.')->group(function () {
    Route::get('/nutrition-screening', [NutritionScreeningController::class, 'create'])->name('nutrition.create');
    Route::post('/nutrition-screening', [NutritionScreeningController::class, 'store'])->name('nutrition.store');
});

Route::prefix('nurse')->name('nurse.')->group(function () {

    Route::get('/fall-scale', function () {
        return view('nurse.fall-scale');
    })->name('fall-scale');

    Route::get('/safety-checklist', function () {
        return view('nurse.safety-checklist');
    })->name('safety-checklist');

});

Route::prefix('nurse')->name('nurse.')->group(function () {

    Route::get('/react-to-red', function () {
        return view('nurse.react-red');
    })->name('react-red');

});

Route::get('/nurse/humpty-dumpty', function () {
    return view('nurse.humpty');
}); 


Route::prefix('nurse')->name('nurse.')->group(function () {
    Route::get('/physical-exam', function () {
        return view('nurse.physical-exam');
    })->name('physical-exam');

    Route::get('/patient-history', function () {
        return view('nurse.patient-history');
    })->name('patient-history');
});


Route::get('/nurse/vital-signs', function () {
    return view('nurse.vital-signs');
});

Route::post('/nurse/vital-signs', function () {
    return back()->with('success','Saved!');
});

// SHOW PAGE (GET)
Route::get('/nurse/tpr-record', function () {
    return view('nurse.tpr-record');
});

// OPTIONAL: SAVE DATA (POST)
Route::post('/nurse/tpr-record', function () {
    return back()->with('success', 'Saved!');
});

Route::get('/nurse/admission-discharge', function () {
    return view('nurse.admission-discharge');
});

Route::post('/nurse/admission-discharge', function () {
    return back()->with('success','Saved!');
});

Route::get('/nurse/medicationrecords', function () {
    return view('nurse.medication-records');
});

Route::post('/nurse/medicationrecords', function () {
    return back()->with('success','Saved!');
});

Route::get('/nurse/triage', function () {
    return view('nurse.triage');
});

// // Route::middleware('auth')->prefix('nurse')->name('nurse.')->group(function () {
//     Route::get('/nutrition-screening/pedia', [NutritionScreeningController::class, 'create'])->name('nutrition.create');
//     Route::post('/nutrition-screening/pedia', [NutritionScreeningController::class, 'store'])->name('nutrition.store');
// });

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



// Route::prefix('nurse')->group(function () {

//     Route::get('/patient-history', [PatientHistoryController::class, 'create']);
//     Route::post('/patient-history', [PatientHistoryController::class, 'store']);

//     Route::get('/physical-exam', [PhysicalExamController::class, 'create']);
//     Route::post('/physical-exam', [PhysicalExamController::class, 'store']);

// });