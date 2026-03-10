<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>React to Red Monitoring Checklist — La Union Medical Center</title>
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

        .shift-am {
            background: #eff6ff;
            color: #1d4ed8;
        }

        .shift-pm {
            background: #f5f3ff;
            color: #6d28d9;
        }

        .shift-noc {
            background: #f0fdfa;
            color: #0f766e;
        }

        .cell-check {
            background: #fef2f2 !important;
            color: #dc2626;
            font-weight: 700;
        }

        .cell-x {
            background: #f0fdf4 !important;
            color: #16a34a;
            font-weight: 700;
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

        .grade-btn.active {
            background: #dc2626 !important;
            color: white !important;
            border-color: #dc2626 !important;
        }
    </style>
</head>

<body class="bg-gray-50 min-h-screen">

    <!-- Topbar -->
    <nav class="bg-white border-b border-gray-200 shadow-sm sticky top-0 z-50">
        <div class="max-w-6xl mx-auto px-5 h-14 flex items-center justify-between">
            <div class="flex items-center gap-3">
                <div class="w-8 h-8 bg-red-500 rounded-lg flex items-center justify-center">
                    <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z" />
                    </svg>
                </div>
                <div>
                    <div class="text-sm font-semibold">La Union Medical Center</div>
                    <div class="text-xs text-gray-400">Nursing Service — Pressure Ulcer Monitoring</div>
                </div>
            </div>
            <div class="flex items-center gap-2">
                <span class="font-mono text-xs bg-red-50 text-red-600 px-2.5 py-1 rounded-full font-medium">NUR-118</span>
            </div>
        </div>
    </nav>

    <div class="max-w-6xl mx-auto px-5 py-7 pb-16">

        <!-- Page Header -->
        <div class="flex items-start justify-between mb-6">
            <div>
                <h1 class="text-lg font-bold text-gray-900">React to Red Monitoring Checklist</h1>
                <p class="text-xs text-gray-400 mt-0.5">Nursing Service · Nazareno, Agoo, La Union</p>
            </div>
            <div class="flex gap-2">
                <button class="text-sm font-medium text-gray-600 border border-gray-200 px-4 py-2 rounded-md hover:bg-gray-50 transition">Save Draft</button>
            </div>
        </div>

        <!-- Patient Info -->
        <div class="bg-white border border-gray-200 rounded-lg shadow-sm mb-4 overflow-hidden">
            <div class="px-5 py-3.5 border-b border-gray-100 flex items-center gap-2.5">
                <div class="w-7 h-7 bg-red-50 rounded-md flex items-center justify-center text-sm">🏥</div>
                <span class="text-sm font-semibold">Patient Information</span>
            </div>
            <div class="p-5 space-y-4">
                <div class="grid grid-cols-4 gap-4">
                    <div class="col-span-2 space-y-1">
                        <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wide">Name of Patient</label>
                        <input type="text" placeholder="Full name" class="w-full px-3 py-2 border border-gray-200 rounded-md text-sm focus:outline-none focus:border-indigo-400 focus:ring-2 focus:ring-indigo-100 transition">
                    </div>
                    <div class="space-y-1">
                        <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wide">Age</label>
                        <input type="number" placeholder="Age" min="0" class="w-full px-3 py-2 border border-gray-200 rounded-md text-sm focus:outline-none focus:border-indigo-400 focus:ring-2 focus:ring-indigo-100 transition">
                    </div>
                    <div class="space-y-1">
                        <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wide">Sex</label>
                        <select class="w-full px-3 py-2 border border-gray-200 rounded-md text-sm focus:outline-none focus:border-indigo-400 focus:ring-2 focus:ring-indigo-100 transition bg-white">
                            <option value="">Select</option>
                            <option>Male</option>
                            <option>Female</option>
                        </select>
                    </div>
                </div>
                <div class="grid grid-cols-4 gap-4">
                    <div class="col-span-2 space-y-1">
                        <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wide">Presence of Ulcer upon Admission</label>
                        <div class="flex gap-2 mt-1">
                            <button id="btn-yes" onclick="setUlcer('yes')" class="flex items-center gap-2 px-4 py-2 border-2 border-gray-200 rounded-md text-sm font-semibold transition">
                                <span id="dot-yes" class="w-3 h-3 rounded-full border-2 border-gray-300 flex-shrink-0 transition"></span> Yes
                            </button>
                            <button id="btn-no" onclick="setUlcer('no')" class="flex items-center gap-2 px-4 py-2 border-2 border-gray-200 rounded-md text-sm font-semibold transition">
                                <span id="dot-no" class="w-3 h-3 rounded-full border-2 border-gray-300 flex-shrink-0 transition"></span> No
                            </button>
                        </div>
                    </div>
                    <div class="space-y-1">
                        <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wide">Hospital #</label>
                        <input type="text" placeholder="Hospital number" class="w-full px-3 py-2 border border-gray-200 rounded-md text-sm focus:outline-none focus:border-indigo-400 focus:ring-2 focus:ring-indigo-100 transition">
                    </div>
                    <div class="space-y-1">
                        <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wide">Ward</label>
                        <input type="text" placeholder="Ward" class="w-full px-3 py-2 border border-gray-200 rounded-md text-sm focus:outline-none focus:border-indigo-400 focus:ring-2 focus:ring-indigo-100 transition">
                    </div>
                </div>
            </div>
        </div>

        <!-- Monitoring Table -->
        <div class="bg-white border border-gray-200 rounded-lg shadow-sm mb-4 overflow-hidden">
            <div class="px-5 py-3.5 border-b border-gray-100 flex items-center gap-2.5">
                <div class="w-7 h-7 bg-red-50 rounded-md flex items-center justify-center text-sm">📋</div>
                <span class="text-sm font-semibold">Pressure Point Assessment Grid</span>
                <span class="ml-auto text-xs text-gray-400">Click a cell: blank → ✓ → ✗ → blank</span>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full text-xs border-collapse" style="min-width:820px;">
                    <thead>
                        <tr class="bg-gray-50">
                            <th class="border border-gray-200 text-left px-3 py-2.5 w-44">
                                <div class="text-xs text-gray-600 leading-snug">Checked and Assessed the Following pressure points:</div>
                                <div class="text-xs font-black text-gray-800 mt-0.5">BEST SHOT</div>
                            </th>
                            <th class="border border-gray-200 text-center py-2.5 text-xs font-bold text-gray-500 uppercase tracking-wide w-14">Shift</th>
                            <th class="border border-gray-200 text-center py-2 text-xs font-bold text-gray-400 w-20">DATE</th>
                            <th class="border border-gray-200 text-center py-1 w-20"><input class="date-input" type="text" placeholder="mm/dd"></th>
                            <th class="border border-gray-200 text-center py-1 w-20"><input class="date-input" type="text" placeholder="mm/dd"></th>
                            <th class="border border-gray-200 text-center py-1 w-20"><input class="date-input" type="text" placeholder="mm/dd"></th>
                            <th class="border border-gray-200 text-center py-1 w-20"><input class="date-input" type="text" placeholder="mm/dd"></th>
                            <th class="border border-gray-200 text-center py-1 w-20"><input class="date-input" type="text" placeholder="mm/dd"></th>
                            <th class="border border-gray-200 text-center py-1 w-20"><input class="date-input" type="text" placeholder="mm/dd"></th>
                            <th class="border border-gray-200 text-center py-1 w-20"><input class="date-input" type="text" placeholder="mm/dd"></th>
                        </tr>
                    </thead>
                    <tbody id="table-body"></tbody>
                </table>
            </div>

            <div class="p-5 space-y-3">
                <div class="bg-amber-50 border border-amber-200 rounded-md p-4">
                    <div class="text-xs font-bold text-amber-700 uppercase tracking-wide mb-2">Entry Guide</div>
                    <div class="flex flex-wrap gap-5">
                        <div class="flex items-center gap-2 text-xs text-amber-800">
                            <span class="w-6 h-6 bg-red-50 border border-red-200 rounded flex items-center justify-center font-bold text-red-600 text-sm">✓</span>
                            Pressure damage indicator present — refer nurse immediately
                        </div>
                        <div class="flex items-center gap-2 text-xs text-amber-800">
                            <span class="w-6 h-6 bg-green-50 border border-green-200 rounded flex items-center justify-center font-bold text-green-600 text-sm">✗</span>
                            No signs of pressure damage — continue monitoring
                        </div>
                    </div>
                </div>
                <div class="bg-gray-50 border border-gray-200 rounded-md p-4 space-y-1.5 text-xs text-gray-500 leading-relaxed">
                    <p><span class="font-semibold text-gray-700">Write (✓)</span> if the following pressure damage indicators are present on the patient:</p>
                    <p>• On light-skinned people, red patches of skin that do not go away — or on dark-skinned people, bluish/purplish patches that do not go away.</p>
                    <p>• Blisters or damage to the skin, swelling, patches of hot skin, patches of hard skin, and patches of cool skin. Refer for immediate action.</p>
                    <p><span class="font-semibold text-gray-700">Write (✗)</span> if there are no signs of pressure damages — continue monitoring and health education sessions.</p>
                    <p class="text-gray-400 italic pt-1">Reference: Adopted from ITRMC Nursing Service.</p>
                </div>
            </div>
        </div>


        <!-- Actions -->
        <div class="flex justify-end gap-2 mt-5">
            <button onclick="clearTable()" class="flex items-center gap-1.5 text-sm font-medium text-gray-600 border border-gray-200 px-4 py-2 rounded-md hover:bg-gray-50 transition">
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
            <button onclick="submitForm()" class="flex items-center gap-1.5 text-sm font-medium text-white bg-red-500 hover:bg-red-600 px-4 py-2 rounded-md transition">
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                    <path d="M5 12l5 5L20 7" />
                </svg>Submit Record
            </button>
        </div>
    </div>

    <script>
        const pts = [{
                label: 'Buttocks',
                initial: 'B'
            }, {
                label: 'Ears & Elbows',
                initial: 'E'
            },
            {
                label: 'Sacrum',
                initial: 'S'
            }, {
                label: 'Trochanters (Hips)',
                initial: 'T'
            },
            {
                label: 'Shoulder',
                initial: 'S'
            }, {
                label: 'Heels including ankle',
                initial: 'H'
            },
            {
                label: 'Occiput (Back of Head)',
                initial: 'O'
            }, {
                label: 'Toes',
                initial: 'T'
            },
        ];
        const shifts = [{
            l: '7-3',
            c: 'shift-am'
        }, {
            l: '3-11',
            c: 'shift-pm'
        }, {
            l: '11-7',
            c: 'shift-noc'
        }];

        const tbody = document.getElementById('table-body');
        pts.forEach(pt => {
            shifts.forEach((sh, si) => {
                const tr = document.createElement('tr');
                if (si === 0) tr.style.borderTop = '2px solid #d1d5db';
                if (si === 0) {
                    const td = document.createElement('td');
                    td.rowSpan = 3;
                    td.className = 'border border-gray-200 px-3 align-middle bg-gray-50 border-r-2 border-r-gray-300 italic text-sm font-medium text-gray-700';
                    td.innerHTML = `<span class="text-base font-bold not-italic">${pt.initial}</span>${pt.label.slice(1)}`;
                    tr.appendChild(td);
                }
                const ts = document.createElement('td');
                ts.className = `border border-gray-200 text-center text-xs font-semibold px-2 py-2 ${sh.c}`;
                ts.textContent = sh.l;
                tr.appendChild(ts);
                for (let d = 0; d < 8; d++) {
                    const td = document.createElement('td');
                    td.className = 'border border-gray-200 text-center cursor-pointer hover:bg-gray-100 transition text-sm h-8';
                    td.dataset.state = '0';
                    td.addEventListener('click', function() {
                        const n = (parseInt(this.dataset.state) + 1) % 3;
                        this.dataset.state = n;
                        this.textContent = n === 1 ? '✓' : n === 2 ? '✗' : '';
                        this.className = `border border-gray-200 text-center cursor-pointer transition text-sm h-8 ${n===1?'cell-check':n===2?'cell-x':'hover:bg-gray-100'}`;
                    });
                    tr.appendChild(td);
                }
                tbody.appendChild(tr);
            });
        });

        function setUlcer(val) {
            const by = document.getElementById('btn-yes'),
                bn = document.getElementById('btn-no');
            const dy = document.getElementById('dot-yes'),
                dn = document.getElementById('dot-no');
            by.className = `flex items-center gap-2 px-4 py-2 border-2 rounded-md text-sm font-semibold transition ${val==='yes'?'border-red-500 bg-red-50 text-red-700':'border-gray-200 text-gray-700'}`;
            bn.className = `flex items-center gap-2 px-4 py-2 border-2 rounded-md text-sm font-semibold transition ${val==='no'?'border-green-500 bg-green-50 text-green-700':'border-gray-200 text-gray-700'}`;
            dy.className = `w-3 h-3 rounded-full border-2 flex-shrink-0 transition ${val==='yes'?'bg-red-500 border-red-500':'border-gray-300'}`;
            dn.className = `w-3 h-3 rounded-full border-2 flex-shrink-0 transition ${val==='no'?'bg-green-500 border-green-500':'border-gray-300'}`;
        }



        function clearTable() {
            if (!confirm('Clear all assessments?')) return;
            document.querySelectorAll('[data-state]').forEach(td => {
                td.dataset.state = '0';
                td.textContent = '';
                td.className = 'border border-gray-200 text-center cursor-pointer hover:bg-gray-100 transition text-sm h-8';
            });
        }

        function submitForm() {
            const c = document.querySelectorAll('.cell-check').length;
            const x = document.querySelectorAll('.cell-x').length;
            if (!c && !x) {
                alert('Please complete at least one entry before submitting.');
                return;
            }
            alert(`Record submitted.\n✓ Indicators present: ${c}\n✗ No signs: ${x}`);
        }
    </script>
</body>

</html>