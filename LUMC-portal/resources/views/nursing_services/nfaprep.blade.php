<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Morse Fall Scale — La Union Medical Center</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700&family=JetBrains+Mono:wght@400;500&display=swap" rel="stylesheet">
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

        .score-btn.selected {
            background: #6366f1;
            color: white;
            border-color: #6366f1;
            font-weight: 700;
        }

        .risk-none {
            background: #f0fdf4;
            color: #166534;
            border-color: #86efac;
        }

        .risk-low {
            background: #fefce8;
            color: #854d0e;
            border-color: #fde047;
        }

        .risk-med {
            background: #fff7ed;
            color: #9a3412;
            border-color: #fdba74;
        }

        .risk-high {
            background: #fef2f2;
            color: #991b1b;
            border-color: #fca5a5;
        }

        .date-input {
            background: transparent;
            border: none;
            outline: none;
            width: 100%;
            text-align: center;
            font-family: 'JetBrains Mono', monospace;
            font-size: 10px;
            color: #374151;
        }

        .date-input:focus {
            background: #eef2ff;
            border-radius: 3px;
        }
    </style>
</head>

<body class="bg-gray-50 min-h-screen">

    <!-- Topbar -->
    <nav class="bg-white border-b border-gray-200 shadow-sm sticky top-0 z-50">
        <div class="max-w-6xl mx-auto px-5 h-14 flex items-center justify-between">
            <div class="flex items-center gap-3">
                <div class="w-8 h-8 bg-orange-500 rounded-lg flex items-center justify-center">
                    <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path d="M12 9v4m0 4h.01M10.29 3.86L1.82 18a2 2 0 001.71 3h16.94a2 2 0 001.71-3L13.71 3.86a2 2 0 00-3.42 0z" />
                    </svg>
                </div>
                <div>
                    <div class="text-sm font-semibold">La Union Medical Center</div>
                    <div class="text-xs text-gray-400">Nursing Fall Assessment & Prevention Program</div>
                </div>
            </div>
            <div class="flex items-center gap-2">
                <span class="font-mono text-xs bg-orange-50 text-orange-600 px-2.5 py-1 rounded-full font-medium">NUR-121</span>
            </div>
        </div>
    </nav>

    <div class="max-w-6xl mx-auto px-5 py-7 pb-16">

        <!-- Page Header -->
        <div class="flex items-start justify-between mb-6">
            <div>
                <h1 class="text-lg font-bold text-gray-900">Morse Fall Scale</h1>
                <p class="text-xs text-gray-400 mt-0.5">Nursing Fall Assessment and Prevention Program (NFAPREP)</p>
            </div>
            <div class="flex gap-2">
                <button class="text-sm font-medium text-gray-600 border border-gray-200 px-4 py-2 rounded-md hover:bg-gray-50 transition">Save Draft</button>
            </div>
        </div>

        <!-- Patient Info -->
        <div class="bg-white border border-gray-200 rounded-lg shadow-sm mb-4 overflow-hidden">
            <div class="px-5 py-3.5 border-b border-gray-100 flex items-center gap-2.5">
                <div class="w-7 h-7 bg-orange-50 rounded-md flex items-center justify-center text-sm">👤</div>
                <span class="text-sm font-semibold">Patient Information</span>
            </div>
            <div class="p-5 space-y-4">
                <div class="grid grid-cols-4 gap-4">
                    <div class="col-span-2 space-y-1">
                        <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wide">Name of Patient</label>
                        <input type="text" placeholder="Full name" class="w-full px-3 py-2 border border-gray-200 rounded-md text-sm focus:outline-none focus:border-orange-400 focus:ring-2 focus:ring-orange-100 transition">
                    </div>
                    <div class="space-y-1">
                        <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wide">Age</label>
                        <input type="number" placeholder="Age" min="0" class="w-full px-3 py-2 border border-gray-200 rounded-md text-sm focus:outline-none focus:border-orange-400 focus:ring-2 focus:ring-orange-100 transition">
                    </div>
                    <div class="space-y-1">
                        <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wide">Gender</label>
                        <select class="w-full px-3 py-2 border border-gray-200 rounded-md text-sm focus:outline-none focus:border-orange-400 focus:ring-2 focus:ring-orange-100 transition bg-white">
                            <option value="">Select</option>
                            <option>Male</option>
                            <option>Female</option>
                        </select>
                    </div>
                </div>
                <div class="grid grid-cols-4 gap-4">
                    <div class="space-y-1">
                        <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wide">Hospital No.</label>
                        <input type="text" placeholder="Hospital number" class="w-full px-3 py-2 border border-gray-200 rounded-md text-sm focus:outline-none focus:border-orange-400 focus:ring-2 focus:ring-orange-100 transition">
                    </div>
                    <div class="space-y-1">
                        <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wide">Ward</label>
                        <input type="text" placeholder="Ward" class="w-full px-3 py-2 border border-gray-200 rounded-md text-sm focus:outline-none focus:border-orange-400 focus:ring-2 focus:ring-orange-100 transition">
                    </div>
                    <div class="space-y-1">
                        <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wide">Month</label>
                        <select class="w-full px-3 py-2 border border-gray-200 rounded-md text-sm focus:outline-none focus:border-orange-400 focus:ring-2 focus:ring-orange-100 transition bg-white">
                            <option value="">Select month</option>
                            <option value="1">January</option>
                            <option value="2">February</option>
                            <option value="3">March</option>
                            <option value="4">April</option>
                            <option value="5">May</option>
                            <option value="6">June</option>
                            <option value="7">July</option>
                            <option value="8">August</option>
                            <option value="9">September</option>
                            <option value="10">October</option>
                            <option value="11">November</option>
                            <option value="12">December</option>
                        </select>
                    </div>
                    <div class="space-y-1">
                        <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wide">Year</label>
                        <input type="number" placeholder="Year" value="2026" class="w-full px-3 py-2 border border-gray-200 rounded-md text-sm focus:outline-none focus:border-orange-400 focus:ring-2 focus:ring-orange-100 transition">
                    </div>
                </div>
            </div>
        </div>

        <!-- Morse Fall Scale Table -->
        <div class="bg-white border border-gray-200 rounded-lg shadow-sm mb-4 overflow-hidden">
            <div class="px-5 py-3.5 border-b border-gray-100 flex items-center gap-2.5">
                <div class="w-7 h-7 bg-orange-50 rounded-md flex items-center justify-center text-sm">📊</div>
                <span class="text-sm font-semibold">Morse Fall Scale Assessment</span>
                <span class="ml-auto text-xs text-gray-400">Click a score button to select</span>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-xs border-collapse" style="min-width:900px;">
                    <thead>
                        <tr class="bg-gray-50">
                            <th class="border border-gray-200 text-left px-4 py-3 text-xs font-bold text-gray-600 uppercase tracking-wide w-64">Item</th>
                            <th class="border border-gray-200 text-center px-3 py-3 text-xs font-bold text-gray-600 uppercase tracking-wide w-28">Scale</th>
                            <th class="border border-gray-200 text-center py-1 w-24"><input class="date-input" type="date" placeholder="Date"></th>
                            <th class="border border-gray-200 text-center py-1 w-24"><input class="date-input" type="date" placeholder="Date"></th>
                            <th class="border border-gray-200 text-center py-1 w-24"><input class="date-input" type="date" placeholder="Date"></th>
                            <th class="border border-gray-200 text-center py-1 w-24"><input class="date-input" type="date" placeholder="Date"></th>
                            <th class="border border-gray-200 text-center py-1 w-24"><input class="date-input" type="date" placeholder="Date"></th>
                            <th class="border border-gray-200 text-center py-1 w-24"><input class="date-input" type="date" placeholder="Date"></th>
                            <th class="border border-gray-200 text-center py-1 w-24"><input class="date-input" type="date" placeholder="Date"></th>
                        </tr>
                    </thead>
                    <tbody id="scale-body"></tbody>
                    <!-- Total Row -->
                    <tfoot>
                        <tr class="bg-gray-50 font-bold">
                            <td class="border border-gray-200 px-4 py-3 text-sm font-bold text-gray-800" colspan="2">TOTAL SCORE</td>
                            <td class="border border-gray-200 text-center py-2 font-mono text-sm font-bold text-indigo-600" id="total-0">—</td>
                            <td class="border border-gray-200 text-center py-2 font-mono text-sm font-bold text-indigo-600" id="total-1">—</td>
                            <td class="border border-gray-200 text-center py-2 font-mono text-sm font-bold text-indigo-600" id="total-2">—</td>
                            <td class="border border-gray-200 text-center py-2 font-mono text-sm font-bold text-indigo-600" id="total-3">—</td>
                            <td class="border border-gray-200 text-center py-2 font-mono text-sm font-bold text-indigo-600" id="total-4">—</td>
                            <td class="border border-gray-200 text-center py-2 font-mono text-sm font-bold text-indigo-600" id="total-5">—</td>
                            <td class="border border-gray-200 text-center py-2 font-mono text-sm font-bold text-indigo-600" id="total-6">—</td>
                        </tr>
                        <tr>
                            <td class="border border-gray-200 px-4 py-3 text-sm font-bold text-gray-800" colspan="2">RISK ASSESSMENT</td>
                            <td class="border border-gray-200 text-center py-2 text-xs font-semibold" id="risk-0">—</td>
                            <td class="border border-gray-200 text-center py-2 text-xs font-semibold" id="risk-1">—</td>
                            <td class="border border-gray-200 text-center py-2 text-xs font-semibold" id="risk-2">—</td>
                            <td class="border border-gray-200 text-center py-2 text-xs font-semibold" id="risk-3">—</td>
                            <td class="border border-gray-200 text-center py-2 text-xs font-semibold" id="risk-4">—</td>
                            <td class="border border-gray-200 text-center py-2 text-xs font-semibold" id="risk-5">—</td>
                            <td class="border border-gray-200 text-center py-2 text-xs font-semibold" id="risk-6">—</td>
                        </tr>
                        <tr>
                            <td class="border border-gray-200 px-4 py-3 text-sm font-bold text-gray-800" colspan="2">NURSE ON DUTY</td>
                            <td class="border border-gray-200 p-1"><input type="text" class="w-full px-1.5 py-1 text-xs border-0 focus:outline-none focus:bg-indigo-50 rounded transition" placeholder="Nurse"></td>
                            <td class="border border-gray-200 p-1"><input type="text" class="w-full px-1.5 py-1 text-xs border-0 focus:outline-none focus:bg-indigo-50 rounded transition" placeholder="Nurse"></td>
                            <td class="border border-gray-200 p-1"><input type="text" class="w-full px-1.5 py-1 text-xs border-0 focus:outline-none focus:bg-indigo-50 rounded transition" placeholder="Nurse"></td>
                            <td class="border border-gray-200 p-1"><input type="text" class="w-full px-1.5 py-1 text-xs border-0 focus:outline-none focus:bg-indigo-50 rounded transition" placeholder="Nurse"></td>
                            <td class="border border-gray-200 p-1"><input type="text" class="w-full px-1.5 py-1 text-xs border-0 focus:outline-none focus:bg-indigo-50 rounded transition" placeholder="Nurse"></td>
                            <td class="border border-gray-200 p-1"><input type="text" class="w-full px-1.5 py-1 text-xs border-0 focus:outline-none focus:bg-indigo-50 rounded transition" placeholder="Nurse"></td>
                            <td class="border border-gray-200 p-1"><input type="text" class="w-full px-1.5 py-1 text-xs border-0 focus:outline-none focus:bg-indigo-50 rounded transition" placeholder="Nurse"></td>
                        </tr>
                    </tfoot>
                </table>
            </div>

            <!-- Legend -->
            <div class="p-5 space-y-3">
                <div class="text-xs font-bold text-gray-500 uppercase tracking-wide mb-2">Legend — Risk Level</div>
                <div class="flex flex-wrap gap-3">
                    <div class="flex items-center gap-2 px-3 py-2 rounded-md border risk-none text-xs font-semibold">No Risk (NR): 0</div>
                    <div class="flex items-center gap-2 px-3 py-2 rounded-md border risk-low  text-xs font-semibold">Low Risk (LR): 1–24</div>
                    <div class="flex items-center gap-2 px-3 py-2 rounded-md border risk-med  text-xs font-semibold">Medium Risk (MR): 25–50</div>
                    <div class="flex items-center gap-2 px-3 py-2 rounded-md border risk-high text-xs font-semibold">High Risk (HR): 51+</div>
                </div>
            </div>
        </div>

        <!-- Fall Prevention Measures -->
        <div class="bg-white border border-gray-200 rounded-lg shadow-sm mb-4 overflow-hidden">
            <div class="px-5 py-3.5 border-b border-gray-100 flex items-center gap-2.5">
                <div class="w-7 h-7 bg-blue-50 rounded-md flex items-center justify-center text-sm">🛡️</div>
                <span class="text-sm font-semibold">Fall Prevention Measures</span>
            </div>
            <div class="p-5 grid grid-cols-2 gap-6">
                <div>
                    <div class="text-xs font-bold text-blue-700 uppercase tracking-wide mb-2">Low / Medium Risk</div>
                    <ul class="space-y-1.5 text-xs text-gray-600 leading-relaxed">
                        <li class="flex gap-2"><span class="text-blue-400 flex-shrink-0">1.</span>Educate family and patient about fall assessment and prevention program.</li>
                        <li class="flex gap-2"><span class="text-blue-400 flex-shrink-0">2.</span>Orient patient to surroundings and hospital routines; set-up especially location of bathroom.</li>
                        <li class="flex gap-2"><span class="text-blue-400 flex-shrink-0">3.</span>Call light in easy reach; instruct patient to call for help/assistance to watcher or nurse before getting out of bed.</li>
                        <li class="flex gap-2"><span class="text-blue-400 flex-shrink-0">4.</span>Instruct patient to use non-slip footwear.</li>
                        <li class="flex gap-2"><span class="text-blue-400 flex-shrink-0">5.</span>Provide adequate lighting.</li>
                        <li class="flex gap-2"><span class="text-blue-400 flex-shrink-0">6.</span>Ensure personal items are within reach.</li>
                        <li class="flex gap-2"><span class="text-blue-400 flex-shrink-0">7.</span>Provide lower position of bed; secure brakes are locked and side rails are raised.</li>
                        <li class="flex gap-2"><span class="text-blue-400 flex-shrink-0">8.</span>Instruct patients to sit in bed before standing.</li>
                        <li class="flex gap-2"><span class="text-blue-400 flex-shrink-0">9.</span>Ensure floors and pathways are clear and clutter removed.</li>
                        <li class="flex gap-2"><span class="text-blue-400 flex-shrink-0">10.</span>Caution patient/family coming to wear non-slip footwear.</li>
                        <li class="flex gap-2"><span class="text-blue-400 flex-shrink-0">11.</span>Caution medications for potential side effects and explain to patient.</li>
                        <li class="flex gap-2"><span class="text-blue-400 flex-shrink-0">12.</span>Inform patient to re-orient new watchers coming in to the unit.</li>
                        <li class="flex gap-2"><span class="text-blue-400 flex-shrink-0">13.</span>Other actions: ___________________</li>
                    </ul>
                    <div class="mt-3 text-xs font-bold text-orange-700 uppercase tracking-wide mb-2">Also from Low/Medium Risk:</div>
                    <ul class="space-y-1.5 text-xs text-gray-600 leading-relaxed">
                        <li class="flex gap-2"><span class="text-orange-400 flex-shrink-0">1.</span>Post "HIGH RISK" tag at the head of the room or bed of the patient.</li>
                        <li class="flex gap-2"><span class="text-orange-400 flex-shrink-0">2.</span>Provide mobility nursing attendant to make comfort round every 2 hours and include change in position, toileting, offering of bedpan and ensure that patient is warm and dry.</li>
                        <li class="flex gap-2"><span class="text-orange-400 flex-shrink-0">3.</span>Coordinate with mobility nursing attendant to make comfort round every 2 hours and include change in position.</li>
                        <li class="flex gap-2"><span class="text-orange-400 flex-shrink-0">4.</span>Family/Bedpan should be within easy reach; if patient reaches a high fall prevention intervention mentioned above, the following shall be implemented from the unit.</li>
                    </ul>
                </div>
                <div>
                    <div class="text-xs font-bold text-red-700 uppercase tracking-wide mb-2">High Risk — Additional Measures</div>
                    <ul class="space-y-1.5 text-xs text-gray-600 leading-relaxed">
                        <li class="flex gap-2"><span class="text-red-400 flex-shrink-0">5.</span>Provide visible night light as appropriate.</li>
                        <li class="flex gap-2"><span class="text-red-400 flex-shrink-0">6.</span>Do not leave patients unattended in diagnostic or treatment areas all the time.</li>
                        <li class="flex gap-2"><span class="text-red-400 flex-shrink-0">7.</span>Institutional workers transport and transfer patients with the presence of a medical professional.</li>
                        <li class="flex gap-2"><span class="text-red-400 flex-shrink-0">8.</span>Consider placing a highly visible area (near the nurse's station) for close observation, especially for the first 24-48 hours.</li>
                        <li class="flex gap-2"><span class="text-red-400 flex-shrink-0">9.</span>Communicate the patient's HIGH RISK status every shift during ward endorsement.</li>
                        <li class="flex gap-2"><span class="text-red-400 flex-shrink-0">10.</span>Ensure presence of a 24-hour watcher (1:1).</li>
                        <li class="flex gap-2"><span class="text-red-400 flex-shrink-0">11.</span>Provide a request re-attention to client and family (2x a day).</li>
                        <li class="flex gap-2"><span class="text-red-400 flex-shrink-0">12.</span>Apply restraints (with MD order) as necessary.</li>
                    </ul>
                    <div class="mt-4 p-3 bg-gray-50 border border-gray-200 rounded-md">
                        <div class="text-xs font-bold text-gray-600 uppercase tracking-wide mb-2">Notes / Additional Actions</div>
                        <textarea rows="4" placeholder="Write additional notes or actions taken…" class="w-full px-2.5 py-2 text-xs border border-gray-200 rounded focus:outline-none focus:border-orange-400 transition resize-none bg-white"></textarea>
                    </div>
                    <p class="text-xs text-gray-400 italic mt-3">Reference: Adopted from ITRMC Nursing Service.</p>
                </div>
            </div>
        </div>

        <!-- Actions -->
        <div class="flex justify-end gap-2 mt-5">
            <button onclick="clearAll()" class="flex items-center gap-1.5 text-sm font-medium text-gray-600 border border-gray-200 px-4 py-2 rounded-md hover:bg-gray-50 transition">
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path d="M3 6h18M8 6V4h8v2M19 6l-1 14H6L5 6" />
                </svg>Clear All
            </button>
            <button onclick="window.print()" class="flex items-center gap-1.5 text-sm font-medium text-gray-600 border border-gray-200 px-4 py-2 rounded-md hover:bg-gray-50 transition">
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <rect x="6" y="9" width="12" height="8" />
                    <path d="M6 9V5h12v4M6 17H4V9h16v8h-2" />
                </svg>Print
            </button>
            <button onclick="submitForm()" class="flex items-center gap-1.5 text-sm font-medium text-white bg-orange-500 hover:bg-orange-600 px-4 py-2 rounded-md transition">
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                    <path d="M5 12l5 5L20 7" />
                </svg>Submit Assessment
            </button>
        </div>
    </div>

    <script>
        // Scale items: [label, options array of {label, value}]
        const items = [{
                label: '1. History of Fall (immediate or within 3 months)',
                options: [{
                    l: 'No',
                    v: 0
                }, {
                    l: 'Yes',
                    v: 25
                }]
            },
            {
                label: '2. Secondary Diagnosis',
                options: [{
                    l: 'No',
                    v: 0
                }, {
                    l: 'Yes',
                    v: 15
                }]
            },
            {
                label: '3. Ambulatory Aid',
                options: [{
                    l: 'Bed Rest / Nurse Assist',
                    v: 0
                }, {
                    l: 'Crutches / Cane / Walker',
                    v: 15
                }, {
                    l: 'Furniture',
                    v: 30
                }]
            },
            {
                label: '4. Contraptions (IV / Heparin Lock)',
                options: [{
                    l: 'No',
                    v: 0
                }, {
                    l: 'Yes',
                    v: 20
                }]
            },
            {
                label: '5. Gait / Transferring',
                options: [{
                    l: 'Normal',
                    v: 0
                }, {
                    l: 'Weak',
                    v: 10
                }, {
                    l: 'Impaired',
                    v: 20
                }]
            },
            {
                label: '6. Mental Status',
                options: [{
                    l: 'Oriented to own ability',
                    v: 0
                }, {
                    l: 'Forget Limitations',
                    v: 15
                }]
            },
        ];

        const COLS = 7;
        // selections[item][col] = value or null
        const selections = items.map(() => Array(COLS).fill(null));

        const tbody = document.getElementById('scale-body');

        items.forEach((item, ri) => {
            const tr = document.createElement('tr');
            tr.className = ri % 2 === 0 ? 'bg-white' : 'bg-gray-50/50';

            // Item label
            const tdLabel = document.createElement('td');
            tdLabel.className = 'border border-gray-200 px-4 py-3 text-xs font-semibold text-gray-700 align-top';
            tdLabel.textContent = item.label;
            tr.appendChild(tdLabel);

            // Scale options
            const tdScale = document.createElement('td');
            tdScale.className = 'border border-gray-200 px-2 py-2 align-top';
            tdScale.innerHTML = item.options.map(o =>
                `<div class="flex justify-between items-center gap-1 text-xs text-gray-600 py-0.5">
        <span>${o.l}</span><span class="font-mono font-bold text-gray-400">${o.v}</span>
       </div>`
            ).join('');
            tr.appendChild(tdScale);

            // Date columns
            for (let c = 0; c < COLS; c++) {
                const td = document.createElement('td');
                td.className = 'border border-gray-200 px-1 py-1 align-top';
                td.innerHTML = item.options.map(o =>
                    `<button class="score-btn w-full text-xs border border-gray-200 rounded px-1 py-0.5 my-0.5 hover:bg-indigo-50 hover:border-indigo-300 transition font-mono"
          data-row="${ri}" data-col="${c}" data-val="${o.v}"
          onclick="selectScore(this, ${ri}, ${c}, ${o.v})">${o.v}</button>`
                ).join('');
                tr.appendChild(td);
            }

            tbody.appendChild(tr);
        });

        function selectScore(btn, ri, ci, val) {
            // Deselect all buttons in same row+col
            document.querySelectorAll(`[data-row="${ri}"][data-col="${ci}"]`).forEach(b => b.classList.remove('selected'));
            // Toggle
            if (selections[ri][ci] === val) {
                selections[ri][ci] = null;
            } else {
                btn.classList.add('selected');
                selections[ri][ci] = val;
            }
            updateTotals();
        }

        function updateTotals() {
            for (let c = 0; c < COLS; c++) {
                let total = 0;
                let complete = true;
                for (let r = 0; r < items.length; r++) {
                    if (selections[r][c] === null) {
                        complete = false;
                    } else {
                        total += selections[r][c];
                    }
                }
                const tEl = document.getElementById(`total-${c}`);
                const rEl = document.getElementById(`risk-${c}`);
                if (complete) {
                    tEl.textContent = total;
                    const {
                        label,
                        cls
                    } = getRisk(total);
                    rEl.textContent = label;
                    rEl.className = `border border-gray-200 text-center py-2 text-xs font-semibold rounded-sm ${cls}`;
                } else {
                    const anyFilled = items.some((_, r) => selections[r][c] !== null);
                    if (anyFilled) {
                        let partial = 0;
                        items.forEach((_, r) => {
                            if (selections[r][c] !== null) partial += selections[r][c];
                        });
                        tEl.textContent = `${partial}…`;
                        rEl.textContent = '—';
                        rEl.className = 'border border-gray-200 text-center py-2 text-xs font-semibold';
                    } else {
                        tEl.textContent = '—';
                        rEl.textContent = '—';
                        rEl.className = 'border border-gray-200 text-center py-2 text-xs font-semibold';
                    }
                }
            }
        }

        function getRisk(score) {
            if (score === 0) return {
                label: 'No Risk (NR)',
                cls: 'risk-none'
            };
            if (score <= 24) return {
                label: 'Low Risk (LR)',
                cls: 'risk-low'
            };
            if (score <= 50) return {
                label: 'Medium Risk (MR)',
                cls: 'risk-med'
            };
            return {
                label: 'High Risk (HR)',
                cls: 'risk-high'
            };
        }

        function clearAll() {
            if (!confirm('Clear all assessments?')) return;
            selections.forEach(row => row.fill(null));
            document.querySelectorAll('.score-btn').forEach(b => b.classList.remove('selected'));
            updateTotals();
        }

        function submitForm() {
            const anyFilled = selections.some(row => row.some(v => v !== null));
            if (!anyFilled) {
                alert('Please complete at least one assessment column before submitting.');
                return;
            }
            alert('Assessment submitted successfully. ✓');
        }
    </script>
</body>

</html>