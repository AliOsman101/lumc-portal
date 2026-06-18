<?php

namespace App\Http\Controllers;

use App\Models\MedicationRecord;
use Illuminate\Http\Request;

class MedicationRecordController extends Controller
{
    public function create()
    {
        return view('nurse.medication-records');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'last_name' => ['nullable','string','max:255'],
            'given_name' => ['nullable','string','max:255'],
            'middle_name' => ['nullable','string','max:255'],
            'hospital_case_no' => ['nullable','string','max:255'],
            'ward_service' => ['nullable','string','max:255'],
            'permanent_address' => ['nullable','string','max:255'],
            'tel_no' => ['nullable','string','max:50'],
            'sex' => ['nullable','in:M,F'],
            'civil_status' => ['nullable','in:S,M,D,W,SP'],
            'month' => ['nullable','string','max:50'],
            'grid' => ['nullable','array'],
        ]);

        MedicationRecord::create([
            'user_id' => auth()->id(),
            ...$validated,
        ]);

        return back()->with('success', '✅ Medication record saved!');
    }
}