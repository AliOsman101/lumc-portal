<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PhysicalExamController extends Controller
{
    //
}

use Illuminate\Http\Request;
use App\Models\PhysicalExam;

public function create()
{
    return view('nurse.physical-exam');
}

public function store(Request $request)
{
    PhysicalExam::create($request->all());

    return back()->with('success', 'Saved successfully!');
}
protected $fillable = [
    'last_name','first_name','bp','temp',
    'skin','head','chest','abdomen','impression'
];
