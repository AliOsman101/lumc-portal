@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto bg-white p-8 shadow rounded">

    <!-- ================= HEADER ================= -->
    <header class="border-b pb-4 mb-6">
        <div class="flex items-center justify-between">

            <img src="{{ asset('images/lumc-logo.png') }}" class="h-16 w-16">

            <div class="text-center flex-1">
                <h1 class="text-xl font-bold uppercase">
                    La Union Medical Center
                </h1>
                <p class="text-sm text-gray-600">Clinical Laboratory Request Form</p>
            </div>

            <div class="text-right text-xs">
                <p>Document #: LAB-001-1</p>
                <p>Revision #: 1</p>
            </div>
        </div>
    </header>

    <form method="POST" action="{{ route('laboratory.store') }}">
        @csrf

        <!-- ================= PATIENT INFO ================= -->
        <section class="mb-6">
            <h2 class="section-title">Patient Information</h2>

            <div class="grid grid-cols-4 gap-4">
                <input name="surname" class="input" placeholder="Surname">
                <input name="first_name" class="input" placeholder="First Name">
                <input name="middle_name" class="input" placeholder="Middle Name">
                <input name="ward" class="input" placeholder="Ward / PHIC">

                <input name="age" type="number" class="input" placeholder="Age">
                <select name="gender" class="input">
                    <option>Gender</option>
                    <option>Male</option>
                    <option>Female</option>
                </select>

                <input name="civil_status" class="input" placeholder="Civil Status">
                <input name="requesting_physician" class="input" placeholder="Requesting Physician">
            </div>
        </section>

        <!-- ================= REQUEST TYPE ================= -->
        <section class="mb-6">
            <h2 class="section-title">Type of Request</h2>

            <div class="flex gap-6">
                <label><input type="radio" name="request_type" value="Routine"> Routine</label>
                <label><input type="radio" name="request_type" value="STAT"> STAT</label>
                <input name="justification" class="input flex-1"
                    placeholder="Specify Justification">
            </div>
        </section>

        <!-- ================= TEST SECTIONS ================= -->
        <div class="grid grid-cols-3 gap-6">

            <!-- HEMATOLOGY -->
            <div class="lab-box">
                <h3 class="lab-title">Hematology</h3>

                @foreach([
                    'Complete Blood Count',
                    'Reticulocyte Count',
                    'Peripheral Smear',
                    'Clotting/Bleeding Time',
                    'Prothrombin Time',
                    'APTT',
                    'ESR'
                ] as $test)

                    <label class="check">
                        <input type="checkbox" name="hematology[]" value="{{ $test }}">
                        {{ $test }}
                    </label>
                @endforeach
            </div>

            <!-- CLINICAL CHEMISTRY -->
            <div class="lab-box">
                <h3 class="lab-title">Clinical Chemistry</h3>

                @foreach([
                    'Fasting Blood Sugar',
                    'Random Blood Sugar',
                    'OGTT',
                    'HbA1c',
                    'Blood Uric Acid',
                    'Amylase'
                ] as $test)

                    <label class="check">
                        <input type="checkbox" name="chemistry[]" value="{{ $test }}">
                        {{ $test }}
                    </label>
                @endforeach

                <h4 class="sub-title">Lipid Profile</h4>

                @foreach([
                    'Total Cholesterol',
                    'HDL & LDL',
                    'Triglycerides'
                ] as $test)

                    <label class="check">
                        <input type="checkbox" name="lipid[]" value="{{ $test }}">
                        {{ $test }}
                    </label>
                @endforeach
            </div>

            <!-- MICROBIOLOGY -->
            <div class="lab-box">
                <h3 class="lab-title">Microbiology</h3>

                @foreach([
                    'Gram Stain',
                    'Acid Fast Stain',
                    'KOH Preparation',
                    'Culture and Sensitivity'
                ] as $test)

                    <label class="check">
                        <input type="checkbox" name="microbiology[]" value="{{ $test }}">
                        {{ $test }}
                    </label>
                @endforeach

                <textarea name="micro_notes"
                    class="input mt-3"
                    placeholder="Specimen / Antibiotics Taken"></textarea>
            </div>

        </div>

        <!-- ================= OTHERS ================= -->
        <section class="mt-6">
            <h2 class="section-title">Others (Send-Out)</h2>
            <textarea name="others" class="input" rows="3"></textarea>
        </section>

        <!-- ================= LAB USE ================= -->
        <section class="mt-6 grid grid-cols-2 gap-4">
            <input type="date" name="date_received" class="input">
            <input type="text" name="specimen_collected" class="input" placeholder="Specimen Collected">

            <input type="text" name="test_started" class="input" placeholder="Test Started">
            <input type="text" name="test_done" class="input" placeholder="Test Done">
        </section>

        <!-- SUBMIT -->
        <div class="text-right mt-8">
            <button class="px-6 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                Save Laboratory Request
            </button>
        </div>

    </form>
</div>
@endsection