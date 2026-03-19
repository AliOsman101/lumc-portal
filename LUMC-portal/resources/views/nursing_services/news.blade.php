<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NEWS — Nursing Early Warning Score · La Union Medical Center</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link
        href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&family=JetBrains+Mono:wght@400;500;600&display=swap"
        rel="stylesheet">
    <script>
        tailwind.config = {
            theme: { extend: { fontFamily: { sans: ['Plus Jakarta Sans', 'sans-serif'], mono: ['JetBrains Mono', 'monospace'] } } }
        }
    </script>
    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        /* Score button states */
        .score-btn {
            transition: all .12s;
        }

        .score-btn:hover {
            background: #eef2ff;
            border-color: #a5b4fc;
        }

        .score-btn.sel-0 {
            background: #f0fdf4;
            color: #166534;
            border-color: #4ade80;
            font-weight: 700;
        }

        .score-btn.sel-1 {
            background: #fefce8;
            color: #854d0e;
            border-color: #fbbf24;
            font-weight: 700;
        }

        .score-btn.sel-2 {
            background: #fff7ed;
            color: #9a3412;
            border-color: #fb923c;
            font-weight: 700;
        }

        .score-btn.sel-3 {
            background: #fef2f2;
            color: #991b1b;
            border-color: #f87171;
            font-weight: 700;
        }

        /* Risk badge colors */
        .risk-vl {
            background: #f0fdf4;
            color: #166534;
            border-color: #86efac;
        }

        .risk-l {
            background: #fefce8;
            color: #854d0e;
            border-color: #fde047;
        }

        .risk-lm {
            background: #fff7ed;
            color: #9a3412;
            border-color: #fdba74;
        }

        .risk-m {
            background: #fef3c7;
            color: #92400e;
            border-color: #fbbf24;
        }

        .risk-h {
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

        .time-input {
            background: transparent;
            border: none;
            outline: none;
            width: 100%;
            text-align: center;
            font-family: 'JetBrains Mono', monospace;
            font-size: 10px;
            color: #374151;
        }

        .time-input:focus {
            background: #eef2ff;
            border-radius: 3px;
        }

        /* rotated header */
        .rotated {
            writing-mode: vertical-rl;
            transform: rotate(180deg);
            white-space: nowrap;
        }
    </style>
</head>

<body class="bg-gray-50 min-h-screen">

    <!-- Topbar -->
    <nav class="bg-white border-b border-gray-200 shadow-sm sticky top-0 z-50">
        <div class="max-w-full mx-auto px-5 h-14 flex items-center justify-between">
            <div class="flex items-center gap-3">
                <div class="w-8 h-8 bg-violet-600 rounded-lg flex items-center justify-center">
                    <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" stroke-width="2"
                        viewBox="0 0 24 24">
                        <polyline points="22 12 18 12 15 21 9 3 6 12 2 12" />
                    </svg>
                </div>
                <div>
                    <div class="text-sm font-semibold">La Union Medical Center</div>
                    <div class="text-xs text-gray-400">Nursing Early Warning Score for Clinical Deterioration</div>
                </div>
            </div>
            <div class="flex items-center gap-2">
                <span
                    class="font-mono text-xs bg-violet-50 text-violet-600 px-2.5 py-1 rounded-full font-medium">NUR-106-0</span>
            </div>
        </div>
    </nav>

    <div class="max-w-full mx-auto px-4 py-6 pb-16" style="max-width:1400px;">

        <!-- Page Header -->
        <div class="flex items-start justify-between mb-5">
            <div>
                <h1 class="text-lg font-bold text-gray-900">Nursing Early Warning Score (NEWS)</h1>
                <p class="text-xs text-gray-400 mt-0.5">Nursing Services · Nazareno, Agoo, La Union</p>
            </div>
            <div class="flex gap-2">
                <button
                    class="text-sm font-medium text-gray-600 border border-gray-200 px-4 py-2 rounded-md hover:bg-gray-50 transition">Save
                    Draft</button>
            </div>
        </div>

        <!-- Patient Info -->
        <div class="bg-white border border-gray-200 rounded-lg shadow-sm mb-4 overflow-hidden">
            <div class="px-5 py-3 border-b border-gray-100 flex items-center gap-2">
                <div class="w-7 h-7 bg-violet-50 rounded-md flex items-center justify-center text-sm">👤</div>
                <span class="text-sm font-semibold">Patient Information</span>
            </div>
            <div class="p-4 grid grid-cols-5 gap-3">
                <div class="col-span-2 space-y-1">
                    <label class="block text-xs font-semibold text-gray-400 uppercase tracking-wide">Last Name</label>
                    <input type="text" placeholder="Last name"
                        class="w-full px-3 py-2 border border-gray-200 rounded-md text-sm focus:outline-none focus:border-violet-400 focus:ring-2 focus:ring-violet-100 transition">
                </div>
                <div class="col-span-2 space-y-1">
                    <label class="block text-xs font-semibold text-gray-400 uppercase tracking-wide">Given Name</label>
                    <input type="text" placeholder="Given name"
                        class="w-full px-3 py-2 border border-gray-200 rounded-md text-sm focus:outline-none focus:border-violet-400 focus:ring-2 focus:ring-violet-100 transition">
                </div>
                <div class="space-y-1">
                    <label class="block text-xs font-semibold text-gray-400 uppercase tracking-wide">Age</label>
                    <input type="number" placeholder="Age"
                        class="w-full px-3 py-2 border border-gray-200 rounded-md text-sm focus:outline-none focus:border-violet-400 focus:ring-2 focus:ring-violet-100 transition">
                </div>
                <div class="space-y-1">
                    <label class="block text-xs font-semibold text-gray-400 uppercase tracking-wide">Sex</label>
                    <select
                        class="w-full px-3 py-2 border border-gray-200 rounded-md text-sm focus:outline-none focus:border-violet-400 focus:ring-2 focus:ring-violet-100 bg-white transition">
                        <option value="">Select</option>
                        <option>Male</option>
                        <option>Female</option>
                    </select>
                </div>
                <div class="col-span-2 space-y-1">
                    <label class="block text-xs font-semibold text-gray-400 uppercase tracking-wide">Ward</label>
                    <input type="text" placeholder="Ward"
                        class="w-full px-3 py-2 border border-gray-200 rounded-md text-sm focus:outline-none focus:border-violet-400 focus:ring-2 focus:ring-violet-100 transition">
                </div>
                <div class="col-span-2 space-y-1">
                    <label class="block text-xs font-semibold text-gray-400 uppercase tracking-wide">Hospital
                        No.</label>
                    <input type="text" placeholder="Hospital number"
                        class="w-full px-3 py-2 border border-gray-200 rounded-md text-sm focus:outline-none focus:border-violet-400 focus:ring-2 focus:ring-violet-100 transition">
                </div>
            </div>
        </div>

        <!-- NEWS Score Table -->
        <div class="bg-white border border-gray-200 rounded-lg shadow-sm mb-4 overflow-hidden">
            <div class="px-5 py-3 border-b border-gray-100 flex items-center gap-2">
                <div class="w-7 h-7 bg-violet-50 rounded-md flex items-center justify-center text-sm">📈</div>
                <span class="text-sm font-semibold">Clinical Observations — Score Grid</span>
                <span class="ml-auto text-xs text-gray-400">Click a value to select score for each column</span>
            </div>

            <div class="overflow-x-auto">
                <table class="border-collapse text-xs" style="min-width:1100px; width:100%;">
                    <thead>
                        <tr class="bg-gray-50">
                            <th class="border border-gray-200 px-3 py-2.5 text-left text-xs font-bold text-gray-600 uppercase tracking-wide"
                                style="min-width:110px;">Parameter</th>
                            <th class="border border-gray-200 px-2 py-2.5 text-center text-xs font-bold text-gray-600 uppercase tracking-wide"
                                style="min-width:100px;">Values</th>
                            <th
                                class="border border-gray-200 px-2 py-2.5 text-center text-xs font-bold text-gray-600 uppercase tracking-wide w-10">
                                Pts</th>
                            <!-- 14 observation columns -->
                            <th class="border border-gray-200 text-center py-1" style="min-width:64px;"><input
                                    class="date-input" type="Date" placeholder="Date"></th>
                            <th class="border border-gray-200 text-center py-1" style="min-width:64px;"><input
                                    class="date-input" type="Date" placeholder="Date"></th>
                            <th class="border border-gray-200 text-center py-1" style="min-width:64px;"><input
                                    class="date-input" type="Date" placeholder="Date"></th>
                            <th class="border border-gray-200 text-center py-1" style="min-width:64px;"><input
                                    class="date-input" type="Date" placeholder="Date"></th>
                            <th class="border border-gray-200 text-center py-1" style="min-width:64px;"><input
                                    class="date-input" type="Date" placeholder="Date"></th>
                            <th class="border border-gray-200 text-center py-1" style="min-width:64px;"><input
                                    class="date-input" type="Date" placeholder="Date"></th>
                            <th class="border border-gray-200 text-center py-1" style="min-width:64px;"><input
                                    class="date-input" type="Date" placeholder="Date"></th>
                            <th class="border border-gray-200 text-center py-1" style="min-width:64px;"><input
                                    class="date-input" type="Date" placeholder="Date"></th>
                            <th class="border border-gray-200 text-center py-1" style="min-width:64px;"><input
                                    class="date-input" type="Date" placeholder="Date"></th>
                            <th class="border border-gray-200 text-center py-1" style="min-width:64px;"><input
                                    class="date-input" type="Date" placeholder="Date"></th>
                            <th class="border border-gray-200 text-center py-1" style="min-width:64px;"><input
                                    class="date-input" type="Date" placeholder="Date"></th>
                            <th class="border border-gray-200 text-center py-1" style="min-width:64px;"><input
                                    class="date-input" type="Date" placeholder="Date"></th>
                            <th class="border border-gray-200 text-center py-1" style="min-width:64px;"><input
                                    class="date-input" type="Date" placeholder="Date"></th>
                            <th class="border border-gray-200 text-center py-1" style="min-width:64px;"><input
                                    class="date-input" type="Date" placeholder="Date"></th>
                        </tr>

                        <!-- TIME row -->
                        <tr class="bg-gray-50 border-b-2 border-gray-300">
                            <th
                                class="border border-gray-200 px-3 py-1.5 text-left text-xs font-bold text-gray-500 uppercase">
                                TIME</th>
                            <th class="border border-gray-200" colspan="2"></th>
                            <th class="border border-gray-200 py-1"><input class="time-input" type="time"
                                    placeholder="Time"></th>
                            <th class="border border-gray-200 py-1"><input class="time-input" type="time"
                                    placeholder="Time"></th>
                            <th class="border border-gray-200 py-1"><input class="time-input" type="time"
                                    placeholder="Time"></th>
                            <th class="border border-gray-200 py-1"><input class="time-input" type="time"
                                    placeholder="Time"></th>
                            <th class="border border-gray-200 py-1"><input class="time-input" type="time"
                                    placeholder="Time"></th>
                            <th class="border border-gray-200 py-1"><input class="time-input" type="time"
                                    placeholder="Time"></th>
                            <th class="border border-gray-200 py-1"><input class="time-input" type="time"
                                    placeholder="Time"></th>
                            <th class="border border-gray-200 py-1"><input class="time-input" type="time"
                                    placeholder="Time"></th>
                            <th class="border border-gray-200 py-1"><input class="time-input" type="time"
                                    placeholder="Time"></th>
                            <th class="border border-gray-200 py-1"><input class="time-input" type="time"
                                    placeholder="Time"></th>
                            <th class="border border-gray-200 py-1"><input class="time-input" type="time"
                                    placeholder="Time"></th>
                            <th class="border border-gray-200 py-1"><input class="time-input" type="time"
                                    placeholder="Time"></th>
                            <th class="border border-gray-200 py-1"><input class="time-input" type="time"
                                    placeholder="Time"></th>
                            <th class="border border-gray-200 py-1"><input class="time-input" type="time"
                                    placeholder="Time"></th>
                        </tr>
                    </thead>
                    <tbody id="news-body"></tbody>
                    <tfoot>
                        <!-- Total Score -->
                        <tr class="bg-gray-50">
                            <td class="border border-gray-200 px-3 py-2.5 font-bold text-sm text-gray-800" colspan="3">
                                TOTAL SCORE</td>
                            <td id="tot-0"
                                class="border border-gray-200 text-center font-mono font-bold text-sm text-violet-700 py-2">
                                —</td>
                            <td id="tot-1"
                                class="border border-gray-200 text-center font-mono font-bold text-sm text-violet-700 py-2">
                                —</td>
                            <td id="tot-2"
                                class="border border-gray-200 text-center font-mono font-bold text-sm text-violet-700 py-2">
                                —</td>
                            <td id="tot-3"
                                class="border border-gray-200 text-center font-mono font-bold text-sm text-violet-700 py-2">
                                —</td>
                            <td id="tot-4"
                                class="border border-gray-200 text-center font-mono font-bold text-sm text-violet-700 py-2">
                                —</td>
                            <td id="tot-5"
                                class="border border-gray-200 text-center font-mono font-bold text-sm text-violet-700 py-2">
                                —</td>
                            <td id="tot-6"
                                class="border border-gray-200 text-center font-mono font-bold text-sm text-violet-700 py-2">
                                —</td>
                            <td id="tot-7"
                                class="border border-gray-200 text-center font-mono font-bold text-sm text-violet-700 py-2">
                                —</td>
                            <td id="tot-8"
                                class="border border-gray-200 text-center font-mono font-bold text-sm text-violet-700 py-2">
                                —</td>
                            <td id="tot-9"
                                class="border border-gray-200 text-center font-mono font-bold text-sm text-violet-700 py-2">
                                —</td>
                            <td id="tot-10"
                                class="border border-gray-200 text-center font-mono font-bold text-sm text-violet-700 py-2">
                                —</td>
                            <td id="tot-11"
                                class="border border-gray-200 text-center font-mono font-bold text-sm text-violet-700 py-2">
                                —</td>
                            <td id="tot-12"
                                class="border border-gray-200 text-center font-mono font-bold text-sm text-violet-700 py-2">
                                —</td>
                            <td id="tot-13"
                                class="border border-gray-200 text-center font-mono font-bold text-sm text-violet-700 py-2">
                                —</td>
                        </tr>
                        <!-- Risk Category -->
                        <tr>
                            <td class="border border-gray-200 px-3 py-2.5 font-bold text-sm text-gray-800" colspan="3">
                                RISK CATEGORY</td>
                            <td id="risk-0" class="border border-gray-200 text-center text-xs font-semibold py-1.5">—
                            </td>
                            <td id="risk-1" class="border border-gray-200 text-center text-xs font-semibold py-1.5">—
                            </td>
                            <td id="risk-2" class="border border-gray-200 text-center text-xs font-semibold py-1.5">—
                            </td>
                            <td id="risk-3" class="border border-gray-200 text-center text-xs font-semibold py-1.5">—
                            </td>
                            <td id="risk-4" class="border border-gray-200 text-center text-xs font-semibold py-1.5">—
                            </td>
                            <td id="risk-5" class="border border-gray-200 text-center text-xs font-semibold py-1.5">—
                            </td>
                            <td id="risk-6" class="border border-gray-200 text-center text-xs font-semibold py-1.5">—
                            </td>
                            <td id="risk-7" class="border border-gray-200 text-center text-xs font-semibold py-1.5">—
                            </td>
                            <td id="risk-8" class="border border-gray-200 text-center text-xs font-semibold py-1.5">—
                            </td>
                            <td id="risk-9" class="border border-gray-200 text-center text-xs font-semibold py-1.5">—
                            </td>
                            <td id="risk-10" class="border border-gray-200 text-center text-xs font-semibold py-1.5">—
                            </td>
                            <td id="risk-11" class="border border-gray-200 text-center text-xs font-semibold py-1.5">—
                            </td>
                            <td id="risk-12" class="border border-gray-200 text-center text-xs font-semibold py-1.5">—
                            </td>
                            <td id="risk-13" class="border border-gray-200 text-center text-xs font-semibold py-1.5">—
                            </td>
                        </tr>
                        <!-- Initials -->
                        <tr>
                            <td class="border border-gray-200 px-3 py-2 font-bold text-sm text-gray-800" colspan="3">
                                INITIALS</td>
                            <td class="border border-gray-200 p-1"><input type="text"
                                    class="w-full px-1 py-0.5 text-xs border-0 focus:outline-none focus:bg-violet-50 rounded text-center transition"
                                    placeholder="Init."></td>
                            <td class="border border-gray-200 p-1"><input type="text"
                                    class="w-full px-1 py-0.5 text-xs border-0 focus:outline-none focus:bg-violet-50 rounded text-center transition"
                                    placeholder="Init."></td>
                            <td class="border border-gray-200 p-1"><input type="text"
                                    class="w-full px-1 py-0.5 text-xs border-0 focus:outline-none focus:bg-violet-50 rounded text-center transition"
                                    placeholder="Init."></td>
                            <td class="border border-gray-200 p-1"><input type="text"
                                    class="w-full px-1 py-0.5 text-xs border-0 focus:outline-none focus:bg-violet-50 rounded text-center transition"
                                    placeholder="Init."></td>
                            <td class="border border-gray-200 p-1"><input type="text"
                                    class="w-full px-1 py-0.5 text-xs border-0 focus:outline-none focus:bg-violet-50 rounded text-center transition"
                                    placeholder="Init."></td>
                            <td class="border border-gray-200 p-1"><input type="text"
                                    class="w-full px-1 py-0.5 text-xs border-0 focus:outline-none focus:bg-violet-50 rounded text-center transition"
                                    placeholder="Init."></td>
                            <td class="border border-gray-200 p-1"><input type="text"
                                    class="w-full px-1 py-0.5 text-xs border-0 focus:outline-none focus:bg-violet-50 rounded text-center transition"
                                    placeholder="Init."></td>
                            <td class="border border-gray-200 p-1"><input type="text"
                                    class="w-full px-1 py-0.5 text-xs border-0 focus:outline-none focus:bg-violet-50 rounded text-center transition"
                                    placeholder="Init."></td>
                            <td class="border border-gray-200 p-1"><input type="text"
                                    class="w-full px-1 py-0.5 text-xs border-0 focus:outline-none focus:bg-violet-50 rounded text-center transition"
                                    placeholder="Init."></td>
                            <td class="border border-gray-200 p-1"><input type="text"
                                    class="w-full px-1 py-0.5 text-xs border-0 focus:outline-none focus:bg-violet-50 rounded text-center transition"
                                    placeholder="Init."></td>
                            <td class="border border-gray-200 p-1"><input type="text"
                                    class="w-full px-1 py-0.5 text-xs border-0 focus:outline-none focus:bg-violet-50 rounded text-center transition"
                                    placeholder="Init."></td>
                            <td class="border border-gray-200 p-1"><input type="text"
                                    class="w-full px-1 py-0.5 text-xs border-0 focus:outline-none focus:bg-violet-50 rounded text-center transition"
                                    placeholder="Init."></td>
                            <td class="border border-gray-200 p-1"><input type="text"
                                    class="w-full px-1 py-0.5 text-xs border-0 focus:outline-none focus:bg-violet-50 rounded text-center transition"
                                    placeholder="Init."></td>
                            <td class="border border-gray-200 p-1"><input type="text"
                                    class="w-full px-1 py-0.5 text-xs border-0 focus:outline-none focus:bg-violet-50 rounded text-center transition"
                                    placeholder="Init."></td>
                        </tr>
                    </tfoot>
                </table>
            </div>

            <!-- Legend & key messages -->
            <div class="p-5 space-y-4">
                <div class="bg-amber-50 border border-amber-200 rounded-md p-4 text-xs text-amber-900 space-y-1">
                    <p class="font-bold text-amber-800">Legend: CVPU = Confused, Responds to Voice, Pain or Unresponsive
                    </p>
                    <p class="italic text-amber-700">Reference: Adopted from ITRMC Nursing Service.</p>
                </div>
            </div>
        </div>

        <!-- Interpretation Table -->
        <div class="bg-white border border-gray-200 rounded-lg shadow-sm mb-4 overflow-hidden">
            <div class="px-5 py-3 border-b border-gray-100 flex items-center gap-2">
                <div class="w-7 h-7 bg-violet-50 rounded-md flex items-center justify-center text-sm">📋</div>
                <span class="text-sm font-semibold">Interpretation</span>
            </div>
            <div class="p-5 space-y-4">
                <div class="bg-gray-50 border border-gray-200 rounded-md p-4 text-xs text-gray-700 space-y-1">
                    <p class="font-bold text-gray-800">Key messages:</p>
                    <p>• The NEWS does not replace clinical judgement, but will assist in decision making.</p>
                    <p>• A Score of <span class="font-bold text-red-600">3 in any single parameter</span> requires
                        URGENT attention.</p>
                    <p>• Use ISBAR in all communications.</p>
                    <p>• Document all actions.</p>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full border-collapse text-xs" style="min-width:600px;">
                        <thead>
                            <tr class="bg-gray-100">
                                <th
                                    class="border border-gray-300 px-4 py-2.5 text-xs font-bold text-gray-700 uppercase tracking-wide text-center w-40">
                                    NEWS Score</th>
                                <th
                                    class="border border-gray-300 px-4 py-2.5 text-xs font-bold text-gray-700 uppercase tracking-wide text-center w-36">
                                    Clinical Risk</th>
                                <th
                                    class="border border-gray-300 px-4 py-2.5 text-xs font-bold text-gray-700 uppercase tracking-wide text-center w-44">
                                    Frequency of Monitoring</th>
                                <th
                                    class="border border-gray-300 px-4 py-2.5 text-xs font-bold text-gray-700 uppercase tracking-wide text-center">
                                    Response</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td
                                    class="border border-gray-300 text-center px-4 py-3 font-mono font-bold text-lg text-gray-800">
                                    0</td>
                                <td class="border border-gray-300 text-center px-4 py-3">
                                    <span
                                        class="inline-block px-2 py-1 rounded-md text-xs font-bold risk-vl border">Very
                                        Low (VL)</span>
                                </td>
                                <td class="border border-gray-300 text-center px-4 py-3 text-gray-600">Minimum every 4
                                    hrs</td>
                                <td class="border border-gray-300 px-4 py-3 text-gray-700" rowspan="2">Assessment by a
                                    competent registered nurse or equivalent, to decide change in frequency of clinical
                                    monitoring.</td>
                            </tr>
                            <tr>
                                <td
                                    class="border border-gray-300 text-center px-4 py-3 font-mono font-bold text-lg text-gray-800">
                                    1–4</td>
                                <td class="border border-gray-300 text-center px-4 py-3">
                                    <span class="inline-block px-2 py-1 rounded-md text-xs font-bold risk-l border">Low
                                        (L)</span>
                                </td>
                                <td class="border border-gray-300 text-center px-4 py-3 text-gray-600">Minimum every 2
                                    hrs</td>
                            </tr>
                            <tr class="bg-orange-50/40">
                                <td
                                    class="border border-gray-300 text-center px-4 py-3 font-mono font-bold text-sm text-gray-800">
                                    Score of 3 in any individual parameter</td>
                                <td class="border border-gray-300 text-center px-4 py-3">
                                    <span
                                        class="inline-block px-2 py-1 rounded-md text-xs font-bold risk-lm border">Low-Medium
                                        (L-M)</span>
                                </td>
                                <td class="border border-gray-300 text-center px-4 py-3 text-gray-600">Minimum every 1
                                    hr</td>
                                <td class="border border-gray-300 px-4 py-3 text-gray-700">REFER. Urgent review by
                                    ward-based doctor, to decide change in frequency of clinical monitoring or
                                    escalation of care.</td>
                            </tr>
                            <tr class="bg-amber-50/40">
                                <td
                                    class="border border-gray-300 text-center px-4 py-3 font-mono font-bold text-lg text-gray-800">
                                    5–6</td>
                                <td class="border border-gray-300 text-center px-4 py-3">
                                    <span
                                        class="inline-block px-2 py-1 rounded-md text-xs font-bold risk-m border">Medium
                                        (M)</span>
                                </td>
                                <td class="border border-gray-300 text-center px-4 py-3 text-gray-600">Minimum every 1
                                    hr</td>
                                <td class="border border-gray-300 px-4 py-3 text-gray-700">REFER. Urgent review and by a
                                    ward-based doctor, to decide if critical care assessment is needed.</td>
                            </tr>
                            <tr class="bg-red-50/40">
                                <td
                                    class="border border-gray-300 text-center px-4 py-3 font-mono font-bold text-lg text-red-700">
                                    ≥7</td>
                                <td class="border border-gray-300 text-center px-4 py-3">
                                    <span class="inline-block px-2 py-1 rounded-md text-xs font-bold risk-h border">High
                                        (H)</span>
                                </td>
                                <td class="border border-gray-300 text-center px-4 py-3 text-gray-600">Continuous
                                    monitoring of vital signs</td>
                                <td class="border border-gray-300 px-4 py-3 text-gray-700 font-semibold text-red-800">
                                    Emergent assessment and referral and usually transfer to higher level of care.</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Actions -->
        <div class="flex justify-end gap-2 mt-4">
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
                class="flex items-center gap-1.5 text-sm font-medium text-white bg-violet-600 hover:bg-violet-700 px-4 py-2 rounded-md transition">
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                    <path d="M5 12l5 5L20 7" />
                </svg>Submit
            </button>
        </div>
    </div>

    <script>
        const COLS = 14;

        // Each parameter: label, group label (for rotated header), options [{label, value}]
        const params = [
            {
                group: 'Respiratory Rate\n(breaths/min)',
                rows: [
                    { label: '≥25', value: 3 },
                    { label: '21-24', value: 2 },
                    { label: '12-20', value: 0 },
                    { label: '9-11', value: 1 },
                    { label: '≤8', value: 3 },
                ]
            },
            {
                group: 'SpO₂\n(O2 Sat)',
                rows: [
                    { label: '≤91%', value: 3 },
                    { label: '92-93%', value: 2 },
                    { label: '94-95%', value: 1 },
                    { label: '≥96%', value: 0 },
                ]
            },
            {
                group: 'Oxygen',
                rows: [
                    { label: 'YES', value: 3 },
                    { label: 'NO', value: 0 },
                ]
            },
            {
                group: 'Temperature',
                rows: [
                    { label: '<35°C', value: 3 },
                    { label: '35.1-36°C', value: 1 },
                    { label: '36.1-38°C', value: 0 },
                    { label: '38.1-39°C', value: 1 },
                    { label: '>39.1°C', value: 2 },
                ]
            },
            {
                group: 'Systolic BP',
                rows: [
                    { label: '<90 mmHg', value: 3 },
                    { label: '91-100 mmHg', value: 2 },
                    { label: '101-110 mmHg', value: 1 },
                    { label: '111-159 mmHg', value: 0 },
                    { label: '>160 mmHg', value: 3 },
                ]
            },
            {
                group: 'Pulse Rate\n(beats/min)',
                rows: [
                    { label: '<40', value: 3 },
                    { label: '41-50', value: 1 },
                    { label: '51-90', value: 0 },
                    { label: '91-110', value: 1 },
                    { label: '111-130', value: 2 },
                    { label: '≥131', value: 3 },
                ]
            },
            {
                group: 'LOC',
                rows: [
                    { label: 'ALERT', value: 0 },
                    { label: 'CVPU', value: 3 },
                ]
            },
        ];

        // selections[paramIndex][rowIndex][col] = true/false
        const sel = params.map(p => p.rows.map(() => Array(COLS).fill(false)));
        // hasAny3[col] = whether any param has score=3 selected
        const paramSel = params.map(() => Array(COLS).fill(null)); // selected row index per col

        const tbody = document.getElementById('news-body');

        params.forEach((param, pi) => {
            param.rows.forEach((row, ri) => {
                const tr = document.createElement('tr');
                tr.className = ri % 2 === 0 ? 'bg-white' : 'bg-gray-50/30';

                // Group label cell (spans all rows of group)
                if (ri === 0) {
                    const tdGroup = document.createElement('td');
                    tdGroup.rowSpan = param.rows.length;
                    tdGroup.className = 'border border-gray-200 px-3 py-2 text-xs font-bold text-gray-700 bg-gray-50 border-r-2 border-r-gray-300 align-middle text-center';
                    tdGroup.style.writingMode = 'vertical-rl';
                    tdGroup.style.transform = 'rotate(180deg)';
                    tdGroup.style.whiteSpace = 'nowrap';
                    tdGroup.style.fontSize = '10px';
                    tdGroup.textContent = param.group.replace('\n', ' ');
                    tr.appendChild(tdGroup);
                }

                // Value label
                const tdVal = document.createElement('td');
                tdVal.className = 'border border-gray-200 px-3 py-1.5 text-xs text-gray-600 text-right font-mono';
                tdVal.textContent = row.label;
                tr.appendChild(tdVal);

                // Points
                const tdPts = document.createElement('td');
                tdPts.className = `border border-gray-200 text-center py-1.5 font-mono font-bold text-xs ${row.value === 3 ? 'text-red-600' : row.value === 2 ? 'text-orange-500' : row.value === 1 ? 'text-yellow-600' : 'text-green-600'}`;
                tdPts.textContent = row.value;
                tr.appendChild(tdPts);

                // Score columns
                for (let c = 0; c < COLS; c++) {
                    const td = document.createElement('td');
                    td.className = 'border border-gray-200 p-0.5';
                    const btn = document.createElement('button');
                    btn.className = `score-btn w-full h-7 rounded text-xs font-mono border border-transparent`;
                    btn.dataset.pi = pi;
                    btn.dataset.ri = ri;
                    btn.dataset.col = c;
                    btn.dataset.val = row.value;
                    btn.addEventListener('click', function () { selectScore(pi, ri, c, row.value, btn); });
                    td.appendChild(btn);
                    tr.appendChild(td);
                }
                tbody.appendChild(tr);

                // Border between parameter groups
                if (ri === param.rows.length - 1 && pi < params.length - 1) {
                    tr.style.borderBottom = '2px solid #d1d5db';
                }
            });
        });

        function selectScore(pi, ri, col, val, btn) {
            const prev = paramSel[pi][col];
            // Clear all buttons for this param+col
            document.querySelectorAll(`[data-pi="${pi}"][data-col="${col}"]`).forEach(b => {
                b.className = 'score-btn w-full h-7 rounded text-xs font-mono border border-transparent';
                b.textContent = '';
            });

            if (prev === ri) {
                // Deselect
                paramSel[pi][col] = null;
            } else {
                paramSel[pi][col] = ri;
                const cls = val === 3 ? 'sel-3' : val === 2 ? 'sel-2' : val === 1 ? 'sel-1' : 'sel-0';
                btn.className = `score-btn w-full h-7 rounded text-xs font-mono border ${cls}`;
                btn.textContent = val;
            }
            updateTotals();
        }

        function updateTotals() {
            for (let c = 0; c < COLS; c++) {
                let total = 0; let complete = true; let anyThree = false;
                params.forEach((param, pi) => {
                    if (paramSel[pi][c] === null) { complete = false; }
                    else {
                        const v = param.rows[paramSel[pi][c]].value;
                        total += v;
                        if (v === 3) anyThree = true;
                    }
                });

                const tEl = document.getElementById(`tot-${c}`);
                const rEl = document.getElementById(`risk-${c}`);
                const anyFilled = params.some((_, pi) => paramSel[pi][c] !== null);

                if (anyFilled) {
                    tEl.textContent = total + (complete ? '' : '…');
                    if (complete || anyFilled) {
                        const { label, cls } = getRisk(total, anyThree);
                        rEl.textContent = label;
                        rEl.className = `border border-gray-200 text-center text-xs font-semibold py-1.5 ${cls}`;
                    }
                } else {
                    tEl.textContent = '—';
                    rEl.textContent = '—';
                    rEl.className = 'border border-gray-200 text-center text-xs font-semibold py-1.5';
                }
            }
        }

        function getRisk(score, anyThree) {
            if (anyThree) return { label: 'L-M', cls: 'risk-lm' };
            if (score === 0) return { label: 'VL', cls: 'risk-vl' };
            if (score <= 4) return { label: 'L', cls: 'risk-l' };
            if (score <= 6) return { label: 'M', cls: 'risk-m' };
            return { label: 'H', cls: 'risk-h' };
        }

        function clearAll() {
            if (!confirm('Clear all observations?')) return;
            params.forEach((_, pi) => { for (let c = 0; c < COLS; c++) paramSel[pi][c] = null; });
            document.querySelectorAll('.score-btn').forEach(b => {
                b.className = 'score-btn w-full h-7 rounded text-xs font-mono border border-transparent';
                b.textContent = '';
            });
            updateTotals();
        }

        function submitForm() {
            const any = params.some((_, pi) => paramSel[pi].some(v => v !== null));
            if (!any) { alert('Please enter at least one observation before submitting.'); return; }
            alert('NEWS assessment submitted. ✓');
        }
    </script>
</body>

</html>