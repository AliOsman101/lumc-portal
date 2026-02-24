<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Radiology Request Form — La Union Medical Center</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @media print {
            .no-print {
                display: none;
            }

            body {
                background: white;
                padding: 0;
            }

            .page {
                box-shadow: none;
                border: 1px solid #000;
            }
        }

        .page {
            max-width: 900px;
            margin: 20px auto;
        }
    </style>
</head>

<body class="bg-slate-100 font-sans p-6">
    <div class="page bg-white border rounded-md p-6">
        @if(session('status'))
            <div class="mb-4 p-2 bg-emerald-100 text-emerald-800 rounded">{{ session('status') }}</div>
        @endif

        <form method="POST" action="{{ route('radiology.request.store') }}">
            @csrf
            <header class="mb-4">
                <div class="flex items-center justify-between">

                    <img src="{{ asset('images/lumc-logo.png') }}" alt="LUMC Logo" class="h-16 w-16 object-contain">

                    <div class="text-center flex-1">
                        <h1 class="text-lg font-bold">
                            LA UNION MEDICAL CENTER
                        </h1>
                        <p class="text-sm font-semibold text-slate-600">
                            Radiology Request Form
                        </p>
                    </div>

                    <img src="{{ asset('images/ProvinceofLaUnion.png') }}" alt="Province of La Union Logo"
                        class="h-16 w-16 object-contain">
                </div>
                <hr class="h-px my-4 bg-neutral-quaternary border-1">
            </header>

            <div class="mb-4 mx-16">
                <div class="flex items-center justify-between text-lg">
                    <label class="inline-flex items-center"><input type="radio" name="modality" value="X-RAY"
                            class="mr-1">X-RAY</label>
                    <label class="inline-flex items-center"><input type="radio" name="modality" value="ULTRASOUND"
                            class="mr-1">ULTRASOUND</label>
                    <label class="inline-flex items-center"><input type="radio" name="modality" value="CT SCAN"
                            class="mr-1">CT SCAN</label>
                </div>
            </div>
            <hr class="h-px my-4 bg-neutral-quaternary border-1">


            <div class="grid grid-cols-4 gap-3 mb-3 text-sm">
                <div>
                    <label class="block text-xs font-semibold text-slate-600">Date</label>
                    <input id="date" type="date" name="date" class="mt-1 w-full p-2 border rounded"
                        value="{{ date('Y-m-d') }}">
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-600">RAD File No.</label>
                    <input id="rad_file" type="text" name="rad_file" class="mt-1 w-full p-2 border rounded"
                        placeholder="RAD File #">
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-600">Hospital No.</label>
                    <input id="hospital_no" type="text" name="hospital_no" class="mt-1 w-full p-2 border rounded"
                        placeholder="Hospital #">
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-600">Service / Ward</label>
                    <div class="flex items-center gap-3 mt-1">
                        <input id="ward" type="text" name="ward" class="mt-1 w-full p-2 border rounded"
                            placeholder="Ward or Service">
                    </div>
                </div>
            </div>

            <div class="mb-3 text-sm ">
                <div class="flex justify-between items-center gap-2 text-lg">
                    <label class="inline-flex items-center"><input type="radio" name="source[]" value="OPD"
                            class="mr-1">OPD</label>
                    <label class="inline-flex items-center"><input type="radio" name="source[]" value="ER"
                            class="mr-1">ER</label>
                    <label class="inline-flex items-center"><input type="radio" name="source[]" value="PRIVATE"
                            class="mr-1">PRIVATE</label>
                    <label class="inline-flex items-center"><input type="radio" name="source[]" value="PHIC"
                            class="mr-1">PHIC</label>
                    <label class="inline-flex items-center"><input type="radio" name="source[]" value="CHARITY"
                            class="mr-1">CHARITY/INDIGENT</label>
                </div>
            </div>

            <fieldset class="mb-3">
                <legend class="text-sm font-semibold text-slate-600">Patient Name</legend>
                <div class="grid grid-cols-3 gap-3 mt-2 text-sm">
                    <div>
                        <label class="block text-xs text-slate-500">Family name</label>
                        <input id="family_name" type="text" name="family_name" class="mt-1 w-full p-2 border rounded"
                            placeholder="Family name">
                    </div>
                    <div>
                        <label class="block text-xs text-slate-500">Given name</label>
                        <input id="given_name" type="text" name="given_name" class="mt-1 w-full p-2 border rounded"
                            placeholder="Given name">
                    </div>
                    <div>
                        <label class="block text-xs text-slate-500">Middle name</label>
                        <input id="middle_name" type="text" name="middle_name" class="mt-1 w-full p-2 border rounded"
                            placeholder="Middle name">
                    </div>
                </div>
            </fieldset>

            <div class="grid grid-cols-3 gap-3 mb-4 text-sm">
                <div>
                    <label class="block text-xs text-slate-500">Address</label>
                    <input id="address" type="text" name="address" class="mt-1 w-full p-2 border rounded"
                        placeholder="Address">
                </div>
                <div>
                    <label class="block text-xs text-slate-500">Date of Birth</label>
                    <input id="dob" type="date" name="dob" class="mt-1 w-full p-2 border rounded"
                        value="{{ date('Y-m-d') }}">
                </div>
                <div>
                    <label class="block text-xs text-slate-500">Age / Sex</label>
                    <div class="flex gap-2 mt-1">
                        <input id="age" type="text" name="age" class="p-2 border rounded w-1/3" placeholder="Age">
                        <select id="sex" name="sex" class="p-2 border rounded w-2/3">
                            <option value="">Sex</option>
                            <option>Male</option>
                            <option>Female</option>
                            <option>Other</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="mb-4">
                <label class="block text-xs font-semibold text-slate-600">Examination Desired</label>
                <textarea name="examination" rows="3" class="mt-1 w-full p-2 border rounded"
                    placeholder="Specify exam (e.g., Chest X-Ray PA)"></textarea>
            </div>

            <div class="mb-4">
                <label class="block text-xs font-semibold text-slate-600">Clinical Diagnosis</label>
                <textarea name="clinical_diagnosis" rows="2" class="mt-1 w-full p-2 border rounded"
                    placeholder="Clinical diagnosis"></textarea>
            </div>

            <div class="mb-4">
                <label class="block text-xs font-semibold text-slate-600">Pertinent / Brief Clinical
                    Findings</label>
                <textarea name="findings" rows="3" class="mt-1 w-full p-2 border rounded"
                    placeholder="Pertinent findings"></textarea>
            </div>

            <div class="grid grid-cols-2 gap-4 mt-6">
                <div>
                    <label class="block text-xs text-slate-500">Radiologist Interpretation</label>
                    <textarea name="radiologist_interpretation" rows="6"
                        class="mt-1 w-full p-2 border rounded"></textarea>
                </div>
                <div>
                    <div class="mb-6">
                        <label class="block text-xs text-slate-500">Requesting Physician</label>
                        <input type="text" name="requesting_physician"
                            class="mt-1 w-auto py-2 bg-transparent border-0 border-b-2 border-slate-800 focus:ring-0 focus:outline-none focus:border-emerald-500"
                            placeholder="Name of physician">
                    </div>
                </div>
            </div>

            <div class="mt-6 flex gap-3 justify-end no-print">
                <button onclick="window.print()" type="button" class="px-4 py-2 bg-indigo-600 text-white rounded">Print
                    / Export PDF</button>
                <button type="button" id="clearBtn" class="px-4 py-2 bg-slate-200 rounded">Clear</button>
                <button type="submit" class="px-4 py-2 bg-emerald-600 text-white rounded">Submit</button>
            </div>
        </form>
    </div>

    <script>
        document.getElementById('clearBtn')?.addEventListener('click', () => {
            const form = document.querySelector('form');
            if (form) form.reset();
        });

        // try to prefill patient data by hospital number (best-effort lookup)
        document.getElementById('hospital_no')?.addEventListener('blur', async (e) => {
            const hn = e.target.value.trim();
            if (!hn) return;
            try {
                const res = await fetch(`{{ route('radiology.patient.find') }}?hn=${encodeURIComponent(hn)}`);
                if (!res.ok) return;
                const json = await res.json();
                if (json.found && json.patient) {
                    const p = json.patient;
                    document.getElementById('family_name').value = p.name || '';
                    document.getElementById('given_name').value = p.email || '';
                    // map additional patient fields here if available on PatientProfile
                }
            } catch (err) {
                // ignore lookup errors
            }
        });
    </script>
</body>

</html>