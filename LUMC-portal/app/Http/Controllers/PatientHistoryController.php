<?php

// namespace App\Http\Controllers;

// use Illuminate\Http\Request;

// class PatientHistoryController extends Controller
// {
//     //
// }

use Illuminate\Http\Request;
use App\Models\PatientHistory;

public function create()
{
    return view('nurse.patient-history');
}

public function store(Request $request)
{
    PatientHistory::create($request->all());

    return back()->with('success', 'Saved successfully!');
}

protected $fillable = [
    'last_name','first_name','middle_name','case_no','ward','contact',
    'chief_complaint','history_present','past_history','family_history'
];