<?php

namespace App\Http\Controllers;

use App\Models\NutritionScreening;
use Illuminate\Http\Request;

class NutritionScreeningController extends Controller
{
    public function create()
    {
        return view('nurse.nutrition-screening');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'patient_name' => ['nullable','string','max:255'],
            'address' => ['nullable','string','max:255'],
            'age' => ['nullable','string','max:50'],
            'sex' => ['nullable','string','max:50'],
            'height' => ['nullable','string','max:50'],
            'weight' => ['nullable','string','max:50'],

            'clinical_conditions' => ['nullable','array'],
            'intake_weight_history' => ['nullable','array'],

            'others_a' => ['nullable','string','max:255'],
            'others_b' => ['nullable','string','max:255'],

            'nurse_printed_name' => ['nullable','string','max:255'],
            'nurse_signature' => ['nullable','string','max:255'],
            'nurse_datetime' => ['nullable','string','max:255'],

            'diagnosis' => ['nullable','string','max:255'],
            'diet_prescription' => ['nullable','string','max:255'],
            'diet_type' => ['nullable','in:per_orem,tube_feeding,npotpn'],

            'physician_printed_name' => ['nullable','string','max:255'],
            'physician_signature' => ['nullable','string','max:255'],
            'physician_datetime' => ['nullable','string','max:255'],
        ]);

        NutritionScreening::create([
            'user_id' => auth()->id(),
            ...$validated,
        ]);

        return back()->with('success', '✅ Nutrition screening saved!');
    }
}