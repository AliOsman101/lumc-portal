<?php

namespace App\Http\Controllers;

use App\Models\RadiologyRequest;
use App\Models\PatientProfile;
use Illuminate\Http\Request;

class RadiologyRequestController extends Controller
{
    public function create()
    {
        return view('radiology.request');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'date' => 'nullable|date',
            'rad_file' => 'nullable|string|max:255',
            'hospital_no' => 'nullable|string|max:255',
            'modality' => 'nullable|string|max:50',
            'ward' => 'nullable|string|max:255',
            'source' => 'nullable|array',
            'modality' => 'nullable|array',

            'family_name' => 'nullable|string|max:255',
            'given_name' => 'nullable|string|max:255',
            'middle_name' => 'nullable|string|max:255',
            'address' => 'nullable|string',
            'dob' => 'nullable|date',
            'age' => 'nullable|string|max:50',
            'sex' => 'nullable|string|max:20',

            'examination' => 'nullable|string',
            'clinical_diagnosis' => 'nullable|string',
            'findings' => 'nullable|string',

            'radiologist_interpretation' => 'nullable|string',
            'requesting_physician' => 'nullable|string|max:255',        ]);

        // ensure source saved as JSON array or null
        if (isset($data['source'])) {
            $data['source'] = array_values($data['source']);
        }

        RadiologyRequest::create($data);

        return redirect()->back()->with('status', 'Radiology request submitted.');
    }

    // Simple lookup to pre-fill patient by hospital number or identifier
    public function findPatient(Request $request)
    {
        $hn = $request->query('hn');
        if (!$hn) return response()->json(['found' => false], 400);

        // Try to find by id, name contains, or email matches
        $patient = PatientProfile::where('id', $hn)
            ->orWhere('name', 'like', "%{$hn}%")
            ->orWhere('email', $hn)
            ->first();

        if (!$patient) return response()->json(['found' => false], 404);

        return response()->json(['found' => true, 'patient' => $patient]);
    }
}
