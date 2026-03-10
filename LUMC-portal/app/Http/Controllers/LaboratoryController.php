<?php

namespace App\Http\Controllers;

use App\Models\LaboratoryRequest;
use Illuminate\Http\Request;
use Illuminate\View\View;

class LaboratoryController extends Controller
{
    public function create()
    {
        return view('clinical_laboratory.request');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'date_of_request' => 'nullable|date',
            'hospital_no' => 'nullable|string|max:255',
            'receipt_number' => 'nullable|string|max:255',
            'ward_phic' => 'nullable|string|max:255',

            'surname' => 'nullable|string|max:255',
            'first_name' => 'nullable|string|max:255',
            'middle_name' => 'nullable|string|max:255',
            'address' => 'nullable|string|max:255',

            'birth_date' => 'nullable|date',
            'age' => 'nullable|integer|min:0',
            'gender' => 'nullable|string|max:50',
            'civil_status' => 'nullable|string|max:50',

            'clinical_diagnosis' => 'nullable|string|max:255',
            'requesting_physician' => 'nullable|string|max:255',

            'request_type' => 'nullable|string|in:routine,stat',
            'justification' => 'nullable|string|max:255',

            'hematology' => 'nullable|array',
            'serology' => 'nullable|array',
            'chemistry' => 'nullable|array',
            'lipid_profile' => 'nullable|array',
            'serum_electrolytes' => 'nullable|array',
            'renal_profile' => 'nullable|array',
            'hbt_profile' => 'nullable|array',
            'clinical_microscopy' => 'nullable|array',
            'microbiology' => 'nullable|array',

            'micro_specimen' => 'nullable|string|max:255',
            'antibiotics_taken' => 'nullable|string|max:255',
            'duration' => 'nullable|string|max:255',

            'others' => 'nullable|string',

            'footer_date' => 'nullable|date',
            'request_received' => 'nullable|date_format:H:i',
            'specimen_collected' => 'nullable|date_format:H:i',
            'test_started' => 'nullable|date_format:H:i',
            'test_done' => 'nullable|date_format:H:i',
            'pages' => 'nullable|integer|min:1',
        ]);

        $validated['blood_typing'] = $request->has('blood_typing');

        $labRequest = LaboratoryRequest::create($validated);

        return redirect()
            ->route('laboratory.request.print', ['laboratoryRequest' => $labRequest->id, 'autoprint' => 1])
            ->with('success', 'Laboratory request submitted successfully.');
    }

    public function print(Request $request, LaboratoryRequest $laboratoryRequest): View
    {
        return view('clinical_laboratory.print', [
            'labRequest' => $laboratoryRequest,
            'autoprint' => (bool) $request->boolean('autoprint'),
            'successMessage' => session('success'),
        ]);
    }
}