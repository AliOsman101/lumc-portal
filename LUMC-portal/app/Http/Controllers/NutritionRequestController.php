<?php

namespace App\Http\Controllers;

use App\Models\NutritionRequest;
use Illuminate\Http\Request;

class NutritionRequestController extends Controller
{
    public function create()
    {
        return view('nutrition.request');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'patient_name' => 'nullable|string|max:255',
            'hospital_no' => 'nullable|string|max:100',
            'age' => 'nullable|string|max:50',
            'gender' => 'nullable|string|max:20',
            'attending_physician' => 'nullable|string|max:255',
            'admission_date' => 'nullable|date',
            'diagnosis' => 'nullable|string|max:255',
            'religion' => 'nullable|string|max:255',
            'total_points' => 'nullable|integer',
            'risk' => 'nullable|string|max:50',
            'nutrition_diagnosis' => 'nullable|string',
            'prepared_by' => 'nullable|string|max:255',
            'conforme' => 'nullable|string|max:255',
        ]);

        // normalize array inputs
        $data['food_intake'] = $request->input('food_intake') ? implode(',', $request->input('food_intake')) : null;
        $data['functional_assessment'] = $request->input('functional_assessment') ? implode(',', $request->input('functional_assessment')) : null;
        $data['nutrition_intervention'] = $request->input('nutrition_intervention') ? implode(',', $request->input('nutrition_intervention')) : null;
        $data['monitoring'] = $request->input('monitoring') ? implode(',', $request->input('monitoring')) : null;

        // labs - collect known lab inputs if present
        $labs = [];
        foreach (['albumin','hemoglobin','bun','ldl','calcium','phosphate','cholesterol','creatinine','glucose','sodium','hba1c','triglycerides'] as $lab) {
            if ($request->filled($lab)) {
                $labs[$lab] = $request->input($lab);
            }
        }
        $data['labs'] = $labs ?: null;

        // other simple fields
        foreach (['height_cm','weight_kg','usual_weight_kg','bmi','weight_change_pct','percent_ibw','total_energy','total_carbohydrates','total_protein','total_fat'] as $f) {
            if ($request->filled($f)) $data[$f] = $request->input($f);
        }

        $data['date'] = now()->toDateString();

        NutritionRequest::create($data);

        return redirect()->back()->with('status', 'Nutrition record saved');
    }
}
