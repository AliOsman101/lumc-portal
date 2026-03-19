<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>LUMC | Nutrition Screening</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body{ margin:0; font-family: ui-sans-serif,system-ui,Segoe UI,Roboto,Arial; background:#f3f6fb; }
        .wrap{ width:min(1100px,92vw); margin:24px auto; }
        .card{ background:#fff; border-radius:18px; padding:22px; box-shadow:0 10px 30px rgba(0,0,0,.08); }
        .top{ display:flex; justify-content:space-between; gap:14px; align-items:center; }
        .brand{ display:flex; gap:12px; align-items:center; }
        .brand img{ width:48px; height:48px; object-fit:contain; }
        h1{ margin:0; font-size:20px; font-weight:900; }
        .muted{ color:#64748b; font-size:13px; margin-top:4px; }
        .grid{ display:grid; grid-template-columns:1fr 1fr 1fr; gap:12px; margin-top:18px; }
        .field label{ font-size:12px; font-weight:800; color:#475569; display:block; margin-bottom:6px; }
        .field input{ width:100%; padding:10px 12px; border:1px solid #e2e8f0; border-radius:12px; outline:none; }
        .section{ margin-top:18px; border-top:1px solid #eef2f7; padding-top:16px; }
        .section h2{ margin:0 0 10px; font-size:16px; font-weight:900; }
        .checks{ display:grid; grid-template-columns:1fr 1fr; gap:10px; }
        .check{ display:flex; gap:10px; align-items:flex-start; padding:10px 12px; border:1px solid #e2e8f0; border-radius:12px; }
        .check input{ margin-top:3px; }
        textarea{ width:100%; min-height:70px; padding:10px 12px; border:1px solid #e2e8f0; border-radius:12px; outline:none; }
        .actions{ display:flex; gap:10px; justify-content:flex-end; margin-top:16px; flex-wrap:wrap; }
        .btn{ border:none; border-radius:12px; padding:10px 14px; font-weight:900; cursor:pointer; }
        .btn-primary{ background:#dc2626; color:#fff; }
        .btn-secondary{ background:#e2e8f0; }
        @media print{
            .actions{ display:none; }
            body{ background:#fff; }
            .card{ box-shadow:none; }
        }
    </style>
</head>
<body>
<div class="wrap">
    <div class="card">
        <div class="top">
            <div class="brand">
                <img src="{{ asset('images/LUMC_LOGO.png') }}" alt="LUMC">
                <div>
                    <h1>Admission Adult — Nutrition Screening & Referral Tool</h1>
                    <div class="muted">La Union Medical Center • Nurse Module</div>
                </div>
            </div>
            <button class="btn btn-secondary" type="button" onclick="window.print()">Print</button>
        </div>

        <form method="POST" action="{{ route('nurse.nutrition.store') }}">
            @csrf

            @if(session('success'))
                <div style="margin-top:12px; padding:10px 12px; border-radius:12px; background:#dcfce7; color:#166534; font-weight:900;">
                    {{ session('success') }}
                </div>
            @endif

            <div class="grid">
                <div class="field">
                    <label>Name of Patient</label>
                    <input name="patient_name" value="{{ old('patient_name') }}">
                </div>
                <div class="field">
                    <label>Age</label>
                    <input name="age" value="{{ old('age') }}">
                </div>
                <div class="field">
                    <label>Sex</label>
                    <input name="sex" value="{{ old('sex') }}">
                </div>
                <div class="field" style="grid-column:1/-1;">
                    <label>Address</label>
                    <input name="address" value="{{ old('address') }}">
                </div>
                <div class="field">
                    <label>Height</label>
                    <input name="height" value="{{ old('height') }}">
                </div>
                <div class="field">
                    <label>Weight</label>
                    <input name="weight" value="{{ old('weight') }}">
                </div>
            </div>

            <div class="section">
                <h2>A. Clinical Condition</h2>
                <div class="checks">
                    @php
                        $a = [
                            'Admission to ICU',
                            'Anorexia Nervosa / Bulimia Nervosa',
                            'Cachexia (temporal wasting, muscle wasting, cancer, COPD, cardiac)',
                            'Cerebrovascular accident',
                            'Coma',
                            'Diabetes Mellitus / Gestational Diabetes Mellitus',
                            'Gastrointestinal disease or complication',
                            'Liver disease',
                            'Malabsorption (celiac sprue, ulcerative colitis, Crohn’s disease, short bowel syndrome)',
                            'Multiple Trauma (closed head injury, penetrating trauma, multiple fractures)',
                            'Non-healing wounds / Pressure injury',
                            'On tube feeding / parenteral nutrition',
                            'Renal disease (acute, chronic, undergoing dialysis)',
                            'Sepsis',
                            'Serum albumin <3.5 gm/L',
                        ];
                    @endphp

                    @foreach($a as $item)
                        <label class="check">
                            <input type="checkbox" name="clinical_conditions[]" value="{{ $item }}"
                                @checked(is_array(old('clinical_conditions')) && in_array($item, old('clinical_conditions'))) />
                            <span>{{ $item }}</span>
                        </label>
                    @endforeach
                </div>

                <div class="field" style="margin-top:10px;">
                    <label>Others (A)</label>
                    <input name="others_a" value="{{ old('others_a') }}">
                </div>
            </div>

            <div class="section">
                <h2>B. Intake / Weight History</h2>
                <div class="checks">
                    @php
                        $b = [
                            'Unintentional weight loss in the past 3 months',
                            'Reduced dietary intake in the past week',
                            'BMI below 18.5 and above 30 (to be computed by the RND)',
                            'Pregnant patient is aged ≤ 18 years old or ≥ 35 years old',
                            'Pregnancy with Hyperemesis gravidarum / Pregnancy-Induced Hypertension',
                            'Multiple Pregnancy',
                            'Lactating Mother',
                        ];
                    @endphp

                    @foreach($b as $item)
                        <label class="check">
                            <input type="checkbox" name="intake_weight_history[]" value="{{ $item }}"
                                @checked(is_array(old('intake_weight_history')) && in_array($item, old('intake_weight_history'))) />
                            <span>{{ $item }}</span>
                        </label>
                    @endforeach
                </div>

                <div class="field" style="margin-top:10px;">
                    <label>Others (B)</label>
                    <input name="others_b" value="{{ old('others_b') }}">
                </div>
            </div>

            <div class="section">
                <h2>Accomplished by (Nurse)</h2>
                <div class="grid">
                    <div class="field">
                        <label>Printed Name</label>
                        <input name="nurse_printed_name" value="{{ old('nurse_printed_name') }}">
                    </div>
                    <div class="field">
                        <label>Signature</label>
                        <input name="nurse_signature" value="{{ old('nurse_signature') }}">
                    </div>
                    <div class="field">
                        <label>Date/Time</label>
                        <input name="nurse_datetime" placeholder="e.g., 02/24/2026 10:30 AM" value="{{ old('nurse_datetime') }}">
                    </div>
                </div>
            </div>

            <div class="section">
                <h2>Referral for Medical Nutrition Therapy</h2>
                <div class="grid">
                    <div class="field" style="grid-column:1/-1;">
                        <label>Diagnosis</label>
                        <input name="diagnosis" value="{{ old('diagnosis') }}">
                    </div>
                    <div class="field" style="grid-column:1/-1;">
                        <label>Diet Prescription</label>
                        <input name="diet_prescription" value="{{ old('diet_prescription') }}">
                    </div>
                </div>

                <div class="field" style="margin-top:10px;">
                    <label>Diet Type</label>
                    <div style="display:flex; gap:12px; flex-wrap:wrap;">
                        <label class="check"><input type="radio" name="diet_type" value="per_orem" @checked(old('diet_type')==='per_orem')> Per Orem</label>
                        <label class="check"><input type="radio" name="diet_type" value="tube_feeding" @checked(old('diet_type')==='tube_feeding')> Tube Feeding</label>
                        <label class="check"><input type="radio" name="diet_type" value="npotpn" @checked(old('diet_type')==='npotpn')> NPO/TPN</label>
                    </div>
                </div>

                <div class="grid" style="margin-top:10px;">
                    <div class="field">
                        <label>Physician Printed Name</label>
                        <input name="physician_printed_name" value="{{ old('physician_printed_name') }}">
                    </div>
                    <div class="field">
                        <label>Physician Signature</label>
                        <input name="physician_signature" value="{{ old('physician_signature') }}">
                    </div>
                    <div class="field">
                        <label>Date/Time</label>
                        <input name="physician_datetime" value="{{ old('physician_datetime') }}">
                    </div>
                </div>
            </div>

            <div class="actions">
                <button class="btn btn-primary" type="submit">Save</button>
            </div>
        </form>
    </div>
</div>
</body>
</html>