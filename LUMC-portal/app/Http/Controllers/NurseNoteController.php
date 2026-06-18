<?php

namespace App\Http\Controllers;

use App\Models\NurseNote;
use Illuminate\Http\Request;

class NurseNoteController extends Controller
{
    public function create()
    {
        return view('nurse.notes');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'last_name' => ['nullable', 'string', 'max:255'],
            'given_name' => ['nullable', 'string', 'max:255'],
            'middle_name' => ['nullable', 'string', 'max:255'],
            'hospital_case_no' => ['nullable', 'string', 'max:255'],

            'permanent_address' => ['nullable', 'string', 'max:255'],
            'tel_no' => ['nullable', 'string', 'max:50'],
            'ward_service' => ['nullable', 'string', 'max:255'],

            'sex' => ['nullable', 'in:M,F'],
            'civil_status' => ['nullable', 'in:S,M,D,W,SP'],

            'date_shift' => ['nullable', 'string', 'max:255'],
            'signature' => ['nullable', 'string', 'max:255'],

            'notes' => ['nullable', 'string'],
        ]);

        NurseNote::create([
            'user_id' => auth()->user()?->id,
            ...$validated,
        ]);

        return back()->with('success', '✅ Nurse notes saved!');
    }
}