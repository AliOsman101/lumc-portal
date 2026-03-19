<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clinical Laboratory Request Form — La Union Medical Center</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link
        href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700&family=JetBrains+Mono:wght@400;500&display=swap"
        rel="stylesheet">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Plus Jakarta Sans', 'sans-serif'],
                        mono: ['JetBrains Mono', 'monospace']
                    }
                }
            }
        }
    </script>
    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        .test-item.checked {
            background: #eef2ff;
        }

        .test-item.checked .cb {
            background: #6366f1;
            border-color: #6366f1;
        }

        .test-item.checked .cb::after {
            content: '';
            display: block;
            width: 8px;
            height: 5px;
            border-left: 2px solid white;
            border-bottom: 2px solid white;
            transform: rotate(-45deg) translate(1px, -1px);
        }

        .test-item.checked .test-name {
            color: #4f46e5;
            font-weight: 600;
        }

        .req-card.active-routine {
            border-color: #6366f1;
            background: #eef2ff;
        }

        .req-card.active-stat {
            border-color: #f59e0b;
            background: #fffbeb;
        }
    </style>
</head>

<body class="bg-gray-50 min-h-screen">

    <!-- Topbar -->
    <nav class="bg-white border-b border-gray-200 shadow-sm sticky top-0 z-50">
        <div class="max-w-5xl mx-auto px-5 h-14 flex items-center justify-between">
            <div class="flex items-center gap-3">
                <div class="w-8 h-8 bg-indigo-500 rounded-lg flex items-center justify-center">
                    <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" stroke-width="2"
                        viewBox="0 0 24 24">
                        <path
                            d="M9 3H5a2 2 0 00-2 2v4m6-6h10a2 2 0 012 2v4M9 3v18m0 0h10a2 2 0 002-2V9M9 21H5a2 2 0 01-2-2V9m0 0h18" />
                    </svg>
                </div>
                <div>
                    <div class="text-sm font-semibold">La Union Medical Center</div>
                    <div class="text-xs text-gray-400">Laboratory Information System</div>
                </div>
            </div>
            <div class="flex items-center gap-2">
                <span
                    class="font-mono text-xs bg-indigo-50 text-indigo-600 px-2.5 py-1 rounded-full font-medium">LAB-001-1
                    · Rev. 1</span>
            </div>
        </div>
    </nav>

    <div class="max-w-5xl mx-auto px-5 py-7 pb-16">

        <!-- Page Header -->
        <div class="flex items-start justify-between mb-6">
            <div>
                <h1 class="text-lg font-bold text-gray-900">Clinical Laboratory Request Form</h1>
                <p class="text-xs text-gray-400 mt-0.5">Brgy Nazareno, Agoo, La Union · (072) 607-5541/45 local 117/118
                </p>
            </div>
            <div class="flex gap-2">
                <button
                    class="text-sm font-medium text-gray-600 border border-gray-200 px-4 py-2 rounded-md hover:bg-gray-50 transition">Save
                    Draft</button>
            </div>
        </div>

        <!-- Patient Info -->
        <div class="bg-white border border-gray-200 rounded-lg shadow-sm mb-4 overflow-hidden">
            <div class="px-5 py-3.5 border-b border-gray-100 flex items-center gap-2.5">
                <span class="text-sm font-semibold">Patient Information</span>
            </div>
            <div class="p-5 space-y-4">
                <div class="grid grid-cols-4 gap-4">
                    <div class="space-y-1">
                        <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wide">Date of
                            Request</label>
                        <input type="date"
                            class="w-full px-3 py-2 border border-gray-200 rounded-md text-sm focus:outline-none focus:border-indigo-400 focus:ring-2 focus:ring-indigo-100 transition">
                    </div>
                    <div class="space-y-1">
                        <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wide">Hospital
                            No.</label>
                        <input type="text" placeholder="e.g. 2024-00123"
                            class="w-full px-3 py-2 border border-gray-200 rounded-md text-sm focus:outline-none focus:border-indigo-400 focus:ring-2 focus:ring-indigo-100 transition">
                    </div>
                    <div class="space-y-1">
                        <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wide">Receipt
                            Number</label>
                        <input type="text" placeholder="Receipt #"
                            class="w-full px-3 py-2 border border-gray-200 rounded-md text-sm focus:outline-none focus:border-indigo-400 focus:ring-2 focus:ring-indigo-100 transition">
                    </div>
                    <div class="space-y-1">
                        <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wide">Ward /
                            PhilIC</label>
                        <input type="text" placeholder="Ward / PhilIC"
                            class="w-full px-3 py-2 border border-gray-200 rounded-md text-sm focus:outline-none focus:border-indigo-400 focus:ring-2 focus:ring-indigo-100 transition">
                    </div>
                </div>
                <div class="grid grid-cols-4 gap-4">
                    <div class="space-y-1">
                        <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wide">Surname</label>
                        <input type="text" placeholder="Last name"
                            class="w-full px-3 py-2 border border-gray-200 rounded-md text-sm focus:outline-none focus:border-indigo-400 focus:ring-2 focus:ring-indigo-100 transition">
                    </div>
                    <div class="space-y-1">
                        <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wide">First
                            Name</label>
                        <input type="text" placeholder="First name"
                            class="w-full px-3 py-2 border border-gray-200 rounded-md text-sm focus:outline-none focus:border-indigo-400 focus:ring-2 focus:ring-indigo-100 transition">
                    </div>
                    <div class="space-y-1">
                        <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wide">Middle
                            Name</label>
                        <input type="text" placeholder="Middle name"
                            class="w-full px-3 py-2 border border-gray-200 rounded-md text-sm focus:outline-none focus:border-indigo-400 focus:ring-2 focus:ring-indigo-100 transition">
                    </div>
                    <div class="space-y-1">
                        <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wide">Address</label>
                        <input type="text" placeholder="Address"
                            class="w-full px-3 py-2 border border-gray-200 rounded-md text-sm focus:outline-none focus:border-indigo-400 focus:ring-2 focus:ring-indigo-100 transition">
                    </div>
                </div>
                <div class="grid grid-cols-4 gap-4">
                    <div class="space-y-1">
                        <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wide">Birth
                            Date</label>
                        <input type="date"
                            class="w-full px-3 py-2 border border-gray-200 rounded-md text-sm focus:outline-none focus:border-indigo-400 focus:ring-2 focus:ring-indigo-100 transition">
                    </div>
                    <div class="space-y-1">
                        <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wide">Age</label>
                        <input type="number" placeholder="Age" min="0"
                            class="w-full px-3 py-2 border border-gray-200 rounded-md text-sm focus:outline-none focus:border-indigo-400 focus:ring-2 focus:ring-indigo-100 transition">
                    </div>
                    <div class="space-y-1">
                        <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wide">Gender</label>
                        <select
                            class="w-full px-3 py-2 border border-gray-200 rounded-md text-sm focus:outline-none focus:border-indigo-400 focus:ring-2 focus:ring-indigo-100 transition bg-white">
                            <option value="">Select</option>
                            <option>Male</option>
                            <option>Female</option>
                            <option>Other</option>
                        </select>
                    </div>
                    <div class="space-y-1">
                        <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wide">Civil
                            Status</label>
                        <select
                            class="w-full px-3 py-2 border border-gray-200 rounded-md text-sm focus:outline-none focus:border-indigo-400 focus:ring-2 focus:ring-indigo-100 transition bg-white">
                            <option value="">Select</option>
                            <option>Single</option>
                            <option>Married</option>
                            <option>Widowed</option>
                            <option>Separated</option>
                        </select>
                    </div>
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div class="space-y-1">
                        <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wide">Clinical
                            Diagnosis</label>
                        <input type="text" placeholder="Clinical diagnosis"
                            class="w-full px-3 py-2 border border-gray-200 rounded-md text-sm focus:outline-none focus:border-indigo-400 focus:ring-2 focus:ring-indigo-100 transition">
                    </div>
                    <div class="space-y-1">
                        <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wide">Requesting
                            Physician</label>
                        <input type="text" placeholder="Physician name"
                            class="w-full px-3 py-2 border border-gray-200 rounded-md text-sm focus:outline-none focus:border-indigo-400 focus:ring-2 focus:ring-indigo-100 transition">
                    </div>
                </div>
            </div>
        </div>

        <!-- Type of Request -->
        <div class="bg-white border border-gray-200 rounded-lg shadow-sm mb-4 overflow-hidden">
            <div class="px-5 py-3.5 border-b border-gray-100 flex items-center gap-2.5">
                <span class="text-sm font-semibold">Type of Request</span>
            </div>
            <div class="p-5">
                <div class="flex gap-3">
                    <label id="req-routine"
                        class="req-card flex-1 flex items-center gap-3 p-3.5 border-2 border-gray-200 rounded-md cursor-pointer transition active-routine"
                        onclick="setRequest('routine')">
                        <input type="radio" name="req_type" value="routine" class="hidden" checked>
                        <div id="rdot-routine"
                            class="w-4 h-4 rounded-full border-2 border-indigo-500 bg-indigo-500 flex items-center justify-center flex-shrink-0">
                            <div class="w-1.5 h-1.5 bg-white rounded-full"></div>
                        </div>
                        <div>
                            <div class="text-sm font-semibold text-gray-800">Routine</div>
                            <div class="text-xs text-gray-400">Standard processing</div>
                        </div>
                    </label>
                    <label id="req-stat"
                        class="req-card flex-1 flex items-center gap-3 p-3.5 border-2 border-gray-200 rounded-md cursor-pointer transition"
                        onclick="setRequest('stat')">
                        <input type="radio" name="req_type" value="stat" class="hidden">
                        <div id="rdot-stat"
                            class="w-4 h-4 rounded-full border-2 border-gray-300 flex items-center justify-center flex-shrink-0">
                        </div>
                        <div>
                            <div class="text-sm font-semibold text-gray-800">STAT</div>
                            <div class="text-xs text-gray-400">Urgent — specify justification</div>
                        </div>
                    </label>
                </div>
                <div id="stat-just" class="hidden mt-3">
                    <label
                        class="block text-xs font-semibold text-gray-500 uppercase tracking-wide mb-1">Justification</label>
                    <input type="text" placeholder="State reason for urgent request…"
                        class="w-full px-3 py-2 border border-amber-300 rounded-md text-sm focus:outline-none focus:border-amber-500 focus:ring-2 focus:ring-amber-100 transition">
                </div>
            </div>
        </div>

        <!-- Tests -->
        <div class="bg-white border border-gray-200 rounded-lg shadow-sm mb-4 overflow-hidden">
            <div class="px-5 py-3.5 border-b border-gray-100 flex items-center gap-2.5">
                <span class="text-sm font-semibold">Test Selection</span>
            </div>
            <div class="p-5">
                <div class="grid grid-cols-3 gap-4">

                    <!-- COL 1 -->
                    <div class="space-y-3">
                        <!-- Hematology -->
                        <div class="border border-gray-200 rounded-md overflow-hidden">
                            <div
                                class="bg-blue-50 px-3 py-2 text-xs font-bold text-blue-700 uppercase tracking-wide flex items-center gap-2">
                                <span class="w-2 h-2 bg-blue-500 rounded-full"></span>Hematology
                            </div>
                            <div id="sec-hema" class="py-1"></div>
                        </div>
                        <!-- Blood Typing -->
                        <div class="border border-gray-200 rounded-md overflow-hidden">
                            <div
                                class="bg-gray-100 px-3 py-2 text-xs font-bold text-gray-600 uppercase tracking-wide flex items-center gap-2">
                                <span class="w-2 h-2 bg-gray-500 rounded-full"></span>Blood Typing
                            </div>
                            <div class="py-1">
                                <div class="test-item flex items-center gap-2 px-3 py-1.5 cursor-pointer hover:bg-gray-50 rounded mx-1 transition"
                                    onclick="toggle(this)">
                                    <div
                                        class="cb w-3.5 h-3.5 rounded border-2 border-gray-300 flex-shrink-0 flex items-center justify-center bg-white transition">
                                    </div>
                                    <span class="test-name text-xs text-gray-700">Blood Typing</span>
                                </div>
                            </div>
                        </div>
                        <!-- Serology -->
                        <div class="border border-gray-200 rounded-md overflow-hidden">
                            <div
                                class="bg-purple-50 px-3 py-2 text-xs font-bold text-purple-700 uppercase tracking-wide flex items-center gap-2">
                                <span class="w-2 h-2 bg-purple-500 rounded-full"></span>Serology
                            </div>
                            <div id="sec-serology" class="py-1"></div>
                        </div>
                    </div>

                    <!-- COL 2 -->
                    <div class="space-y-3">
                        <!-- Clinical Chemistry -->
                        <div class="border border-gray-200 rounded-md overflow-hidden">
                            <div
                                class="bg-green-50 px-3 py-2 text-xs font-bold text-green-700 uppercase tracking-wide flex items-center gap-2">
                                <span class="w-2 h-2 bg-green-500 rounded-full"></span>Clinical Chemistry
                            </div>
                            <div id="sec-chem" class="py-1"></div>
                        </div>
                        <!-- Lipid -->
                        <div class="border border-gray-200 rounded-md overflow-hidden">
                            <div
                                class="bg-red-50 px-3 py-2 text-xs font-bold text-red-700 uppercase tracking-wide flex items-center gap-2">
                                <span class="w-2 h-2 bg-red-500 rounded-full"></span>Lipid Profile
                            </div>
                            <div id="sec-lipid" class="py-1"></div>
                        </div>
                        <!-- Electrolytes -->
                        <div class="border border-gray-200 rounded-md overflow-hidden">
                            <div
                                class="bg-pink-50 px-3 py-2 text-xs font-bold text-pink-700 uppercase tracking-wide flex items-center gap-2">
                                <span class="w-2 h-2 bg-pink-500 rounded-full"></span>Serum Electrolytes
                            </div>
                            <div id="sec-electro" class="py-1"></div>
                        </div>
                        <!-- Renal -->
                        <div class="border border-gray-200 rounded-md overflow-hidden">
                            <div
                                class="bg-sky-50 px-3 py-2 text-xs font-bold text-sky-700 uppercase tracking-wide flex items-center gap-2">
                                <span class="w-2 h-2 bg-sky-500 rounded-full"></span>Renal Profile
                            </div>
                            <div id="sec-renal" class="py-1"></div>
                        </div>
                        <!-- HBT -->
                        <div class="border border-gray-200 rounded-md overflow-hidden">
                            <div
                                class="bg-emerald-50 px-3 py-2 text-xs font-bold text-emerald-700 uppercase tracking-wide flex items-center gap-2">
                                <span class="w-2 h-2 bg-emerald-500 rounded-full"></span>HBT Profile
                            </div>
                            <div id="sec-hbt" class="py-1"></div>
                        </div>
                    </div>

                    <!-- COL 3 -->
                    <div class="space-y-3">
                        <!-- Clinical Microscopy -->
                        <div class="border border-gray-200 rounded-md overflow-hidden">
                            <div
                                class="bg-yellow-50 px-3 py-2 text-xs font-bold text-yellow-700 uppercase tracking-wide flex items-center gap-2">
                                <span class="w-2 h-2 bg-yellow-500 rounded-full"></span>Clinical Microscopy
                            </div>
                            <div id="sec-micro" class="py-1"></div>
                        </div>
                        <!-- Microbiology -->
                        <div class="border border-gray-200 rounded-md overflow-hidden">
                            <div
                                class="bg-orange-50 px-3 py-2 text-xs font-bold text-orange-700 uppercase tracking-wide flex items-center gap-2">
                                <span class="w-2 h-2 bg-orange-500 rounded-full"></span>Microbiology
                            </div>
                            <div id="sec-mbio" class="py-1"></div>
                            <div class="px-3 pb-3 pt-1 border-t border-gray-100 space-y-2">
                                <div class="space-y-1">
                                    <label
                                        class="block text-xs font-semibold text-gray-400 uppercase tracking-wide">Specimen</label>
                                    <input type="text" placeholder="Specimen type"
                                        class="w-full px-2.5 py-1.5 border border-gray-200 rounded text-xs focus:outline-none focus:border-indigo-400 transition">
                                </div>
                                <div class="space-y-1">
                                    <label
                                        class="block text-xs font-semibold text-gray-400 uppercase tracking-wide">Antibiotics
                                        Taken</label>
                                    <input type="text" placeholder="List antibiotics"
                                        class="w-full px-2.5 py-1.5 border border-gray-200 rounded text-xs focus:outline-none focus:border-indigo-400 transition">
                                </div>
                                <div class="space-y-1">
                                    <label
                                        class="block text-xs font-semibold text-gray-400 uppercase tracking-wide">Duration</label>
                                    <input type="text" placeholder="Duration"
                                        class="w-full px-2.5 py-1.5 border border-gray-200 rounded text-xs focus:outline-none focus:border-indigo-400 transition">
                                </div>
                            </div>
                        </div>
                        <!-- Others -->
                        <div class="border border-gray-200 rounded-md overflow-hidden">
                            <div
                                class="bg-gray-100 px-3 py-2 text-xs font-bold text-gray-600 uppercase tracking-wide flex items-center gap-2">
                                <span class="w-2 h-2 bg-gray-400 rounded-full"></span>Others (Send-Out)
                            </div>
                            <div class="p-3">
                                <textarea placeholder="Enter any other tests or remarks…"
                                    class="w-full px-2.5 py-2 border border-gray-200 rounded text-xs focus:outline-none focus:border-indigo-400 transition resize-none h-16"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer timing -->
        <div class="bg-white border border-gray-200 rounded-lg shadow-sm p-5">
            <div class="grid grid-cols-5 gap-4">
                <div class="space-y-1">
                    <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wide">Date</label>
                    <input type="date"
                        class="w-full px-2.5 py-2 border border-gray-200 rounded-md text-xs focus:outline-none focus:border-indigo-400 transition">
                </div>
                <div class="space-y-1">
                    <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wide">Request
                        Received</label>
                    <input type="time"
                        class="w-full px-2.5 py-2 border border-gray-200 rounded-md text-xs focus:outline-none focus:border-indigo-400 transition">
                </div>
                <div class="space-y-1">
                    <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wide">Specimen
                        Collected</label>
                    <input type="text"
                        class="w-full px-2.5 py-2 border border-gray-200 rounded-md text-xs focus:outline-none focus:border-indigo-400 transition">
                </div>
                <div class="space-y-1">
                    <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wide">Test
                        Started</label>
                    <input type="time"
                        class="w-full px-2.5 py-2 border border-gray-200 rounded-md text-xs focus:outline-none focus:border-indigo-400 transition">
                </div>
                <div class="space-y-1">
                    <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wide">Test Done</label>
                    <input type="time"
                        class="w-full px-2.5 py-2 border border-gray-200 rounded-md text-xs focus:outline-none focus:border-indigo-400 transition">
                </div>

            </div>
        </div>

        <!-- Actions -->
        <div class="flex justify-end gap-2 mt-5">
            <button onclick="clearAll()"
                class="flex items-center gap-1.5 text-sm font-medium text-gray-600 border border-gray-200 px-4 py-2 rounded-md hover:bg-gray-50 transition">
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path d="M3 6h18M8 6V4h8v2M19 6l-1 14H6L5 6" />
                </svg>Clear All
            </button>
            <button onclick="window.print()"
                class="flex items-center gap-1.5 text-sm font-medium text-gray-600 border border-gray-200 px-4 py-2 rounded-md hover:bg-gray-50 transition">
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <rect x="6" y="9" width="12" height="8" />
                    <path d="M6 9V5h12v4M6 17H4V9h16v8h-2" />
                </svg>Print
            </button>
            <button onclick="submitForm()"
                class="flex items-center gap-1.5 text-sm font-medium text-white bg-indigo-500 hover:bg-indigo-600 px-4 py-2 rounded-md transition">
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                    <path d="M5 12l5 5L20 7" />
                </svg>Submit Request
            </button>
        </div>

    </div>

    <script>
        // Test data
        const sections = {
            'sec-hema': ['Complete Blood Count', 'Reticulocyte Count', 'Peripheral Smear', 'Malarial Smear', 'Clotting / Bleeding Time', 'Clot Retraction Time', 'Prothrombin Time (PTPA)', 'APTT', 'Erythrocyte Sedimentation Rate'],
            'sec-serology': ['Dengue Combo (NS1 + IgM/IgG)', 'Typhidot', 'ASTO — Qualitative', 'ASTO — Semi Quantitative', 'C-Reactive Protein — Qualitative', 'C-Reactive Protein — Semi Quant.', 'Rheumatoid Factor — Qualitative', 'Rheumatoid Factor — Semi Quant.', 'HBsAg — Rapid', 'HBsAg — EIA', 'Anti-HCV — Rapid', 'Anti-HCV — EIA', 'VDRL/RPR — Rapid', 'VDRL/RPR — EIA', 'Referral to HACT (HIV)'],
            'sec-chem': ['Fasting Blood Sugar', 'Random Blood Sugar', 'OGTT', '2hr Post-prandial Blood Glucose', 'HBA1c', 'Blood Uric Acid', 'Amylase'],
            'sec-lipid': ['Total Cholesterol only', 'Total, HDL & LDL Cholesterol', 'Triglycerides'],
            'sec-electro': ['Sodium, Potassium, Chloride', 'Phosphorus', 'Magnesium', 'Calcium — Total', 'Calcium — Ionized'],
            'sec-renal': ['BUN', 'Creatinine', 'Creatinine Clearance Test', 'Sodium, Potassium, Chloride', 'Total Protein', 'Albumin', 'Calcium'],
            'sec-hbt': ['AST/SGOT', 'ALT/SGPT', 'Alkaline Phosphatase', 'Total Protein', 'Albumin', 'Total Bilirubin Only', 'Total, Direct & Indirect Bilirubin', 'PT-PA', 'Troponin-T'],
            'sec-micro': ['Routine Urinalysis', 'Urine Ketones', 'Urine Leukocyte Esterase & Nitrite', 'Urine Urobilinogen & Bilirubin', 'Pregnancy Test — Urine', 'Pregnancy Test — Serum', 'Seminal Fluid Analysis', 'Body Fluid Analysis', 'Cell Count / Differential Count', 'Protein (semi-quantitative)', 'Glucose (quantitative)', 'Routine Fecalysis (Saline Mount)', 'Fecalysis with Stool Concentration', 'Fecal Occult Blood'],
            'sec-mbio': ['Gram Stain', 'Acid Fast Stain', 'Acid Fast for Leprosy', 'India Ink Stain', 'KOH Preparation', 'Culture and Sensitivity'],
        };

        Object.entries(sections).forEach(([id, tests]) => {
            const container = document.getElementById(id);
            tests.forEach(name => {
                const div = document.createElement('div');
                div.className = 'test-item flex items-center gap-2 px-3 py-1.5 cursor-pointer hover:bg-gray-50 rounded mx-1 transition';
                div.onclick = function () {
                    toggle(this);
                };
                div.innerHTML = `<div class="cb w-3.5 h-3.5 rounded border-2 border-gray-300 flex-shrink-0 flex items-center justify-center bg-white transition"></div><span class="test-name text-xs text-gray-700">${name}</span>`;
                container.appendChild(div);
            });
        });

        function toggle(el) {
            el.classList.toggle('checked');
        }

        function setRequest(val) {
            const rr = document.getElementById('req-routine');
            const rs = document.getElementById('req-stat');
            const dr = document.getElementById('rdot-routine');
            const ds = document.getElementById('rdot-stat');
            const just = document.getElementById('stat-just');

            rr.className = `req-card flex-1 flex items-center gap-3 p-3.5 border-2 rounded-md cursor-pointer transition ${val === 'routine' ? 'active-routine' : 'border-gray-200'}`;
            rs.className = `req-card flex-1 flex items-center gap-3 p-3.5 border-2 rounded-md cursor-pointer transition ${val === 'stat' ? 'active-stat' : 'border-gray-200'}`;
            dr.className = `w-4 h-4 rounded-full border-2 flex items-center justify-center flex-shrink-0 transition ${val === 'routine' ? 'border-indigo-500 bg-indigo-500' : 'border-gray-300'}`;
            dr.innerHTML = val === 'routine' ? '<div class="w-1.5 h-1.5 bg-white rounded-full"></div>' : '';
            ds.className = `w-4 h-4 rounded-full border-2 flex items-center justify-center flex-shrink-0 transition ${val === 'stat' ? 'border-amber-500 bg-amber-500' : 'border-gray-300'}`;
            ds.innerHTML = val === 'stat' ? '<div class="w-1.5 h-1.5 bg-white rounded-full"></div>' : '';
            just.className = val === 'stat' ? 'mt-3' : 'hidden mt-3';
        }

        function clearAll() {
            if (!confirm('Clear all selected tests?')) return;
            document.querySelectorAll('.test-item.checked').forEach(el => el.classList.remove('checked'));
            document.querySelectorAll('input[type=text],input[type=number],textarea').forEach(el => {
                el.value = '';
            });
        }

        function submitForm() {
            const n = document.querySelectorAll('.test-item.checked').length;
            if (!n) {
                alert('Please select at least one test before submitting.');
                return;
            }
            alert(`Request submitted with ${n} test(s) selected. ✓`);
        }
    </script>
</body>

</html>