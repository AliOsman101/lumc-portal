<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>La Union Medical Center — Nursing Forms</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&family=JetBrains+Mono:wght@400;500&display=swap" rel="stylesheet">
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

        .form-page {
            display: none;
            animation: fadeIn .25s ease;
        }

        .form-page.active {
            display: block;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(6px)
            }

            to {
                opacity: 1;
                transform: translateY(0)
            }
        }

        .field-line {
            border: none;
            border-bottom: 1px solid #d1d5db;
            outline: none;
            background: transparent;
            width: 100%;
            padding: 2px 4px;
            font-size: 13px;
            font-family: inherit;
        }

        .field-line:focus {
            border-bottom-color: #6366f1;
            background: #f5f3ff20;
        }

        .cb-item {
            display: flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 6px;
            cursor: pointer;
            font-size: 13px;
        }

        .cb-item input {
            width: 14px;
            height: 14px;
            accent-color: #6366f1;
            cursor: pointer;
        }

        .section-title {
            font-size: 11px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: .5px;
            color: #6b7280;
            margin-bottom: 8px;
            margin-top: 14px;
        }

        .form-textarea {
            width: 100%;
            border: 1px solid #e5e7eb;
            border-radius: 6px;
            padding: 8px 10px;
            font-family: inherit;
            font-size: 13px;
            resize: vertical;
            min-height: 60px;
            outline: none;
            transition: border-color .15s;
        }

        .form-textarea:focus {
            border-color: #6366f1;
            box-shadow: 0 0 0 3px rgba(99, 102, 241, .1);
        }

        /* MAR table */
        .mar-cell {
            border: 1px solid #e5e7eb;
            padding: 2px;
            text-align: center;
        }

        .mar-input {
            width: 100%;
            border: none;
            background: transparent;
            text-align: center;
            font-size: 10px;
            font-family: 'JetBrains Mono', monospace;
            outline: none;
            padding: 2px 0;
        }

        .mar-input:focus {
            background: #eef2ff;
            border-radius: 2px;
        }

        /* TPR chart */
        .tpr-input {
            width: 100%;
            border: none;
            background: transparent;
            text-align: center;
            font-size: 10px;
            font-family: 'JetBrains Mono', monospace;
            outline: none;
        }

        .tpr-input:focus {
            background: #eef2ff;
            border-radius: 2px;
        }

        /* nav pill */
        .nav-pill {
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 11px;
            font-weight: 600;
            cursor: pointer;
            border: 1.5px solid #e5e7eb;
            color: #6b7280;
            transition: all .15s;
            white-space: nowrap;
        }

        .nav-pill.active {
            background: #6366f1;
            color: white;
            border-color: #6366f1;
        }

        .nav-pill:hover:not(.active) {
            background: #f5f3ff;
            border-color: #a5b4fc;
            color: #4f46e5;
        }
    </style>
</head>

<body class="bg-gray-50 min-h-screen">

    <!-- Top Bar -->
    <nav class="bg-white border-b border-gray-200 shadow-sm sticky top-0 z-50">
        <div class="max-w-5xl mx-auto px-5 h-14 flex items-center justify-between">
            <div class="flex items-center gap-3">
                <div class="w-8 h-8 bg-indigo-600 rounded-lg flex items-center justify-center">
                    <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                </div>
                <div>
                    <div class="text-sm font-bold">La Union Medical Center</div>
                    <div class="text-xs text-gray-400">Nursing Forms System · Nazareno, Agoo, La Union</div>
                </div>
            </div>
            <div class="flex items-center gap-2">
                <span id="form-badge" class="font-mono text-xs bg-indigo-50 text-indigo-600 px-2.5 py-1 rounded-full font-medium">Form 1 of 10</span>
            </div>
        </div>
    </nav>

    <!-- Scrollable Form Nav Pills -->
    <div class="bg-white border-b border-gray-200 sticky top-14 z-40 shadow-sm">
        <div class="max-w-5xl mx-auto px-5 py-2.5 overflow-x-auto">
            <div class="flex gap-2 min-w-max" id="nav-pills">
                <button class="nav-pill active" onclick="goTo(0)">NUR-022 Maternal Hx</button>
                <button class="nav-pill" onclick="goTo(1)">NUR-009 Doctor's Order</button>
                <button class="nav-pill" onclick="goTo(2)">NUR-055 Growth Charts</button>
                <button class="nav-pill" onclick="goTo(3)">NUR-044 Breastfeeding</button>
                <button class="nav-pill" onclick="goTo(4)">NUR Newborn Maturity</button>
                <button class="nav-pill" onclick="goTo(5)">NUR-019 Newborn Record</button>
                <button class="nav-pill" onclick="goTo(6)">NUR-007 TPR Record</button>
                <button class="nav-pill" onclick="goTo(7)">NUR-010 Nurse's Notes</button>
                <button class="nav-pill" onclick="goTo(8)">NUR-011 Medication Records</button>
                <button class="nav-pill" onclick="goTo(9)">NUR-013 Discharge Summary</button>
            </div>
        </div>
    </div>

    <div class="max-w-5xl mx-auto px-5 py-6 pb-32">

        <!-- ══════════════════════════════════════════════
       FORM 10 — NUR-013 Discharge Summary
  ══════════════════════════════════════════════ -->
        <div class="form-page" id="form-9">
            <div class="bg-white border border-gray-200 rounded-xl shadow-sm overflow-hidden">
                <div class="bg-indigo-600 px-6 py-4 flex items-center justify-between">
                    <div>
                        <div class="text-white font-bold text-base">Discharge Summary</div>
                        <div class="text-indigo-200 text-xs mt-0.5">NUR-013-Ø · La Union Medical Center</div>
                    </div>
                    <span class="bg-white/20 text-white text-xs font-mono px-2 py-1 rounded">10 / 10</span>
                </div>
                <div class="p-6 space-y-5">
                    <!-- Patient Info -->
                    <div class="grid grid-cols-3 gap-4">
                        <div><label class="section-title block">Last Name</label><input type="text" class="field-line" placeholder="Last name"></div>
                        <div><label class="section-title block">Given Name</label><input type="text" class="field-line" placeholder="Given name"></div>
                        <div><label class="section-title block">Middle Name</label><input type="text" class="field-line" placeholder="Middle name"></div>
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div><label class="section-title block">Permanent Address</label><input type="text" class="field-line" placeholder="Address"></div>
                        <div><label class="section-title block">Telephone No.</label><input type="text" class="field-line" placeholder="Tel. No."></div>
                    </div>
                    <div class="grid grid-cols-4 gap-4">
                        <div><label class="section-title block">Hosp. Case No.</label><input type="text" class="field-line"></div>
                        <div><label class="section-title block">Ward / Service</label><input type="text" class="field-line"></div>
                        <div>
                            <label class="section-title block">Sex</label>
                            <div class="flex gap-4 mt-1"><label class="cb-item"><input type="radio" name="sex-ds" value="M"> Male</label><label class="cb-item"><input type="radio" name="sex-ds" value="F"> Female</label></div>
                        </div>
                        <div>
                            <label class="section-title block">Civil Status</label>
                            <div class="flex flex-wrap gap-2 mt-1">
                                <label class="cb-item"><input type="radio" name="cs-ds" value="S"> S</label>
                                <label class="cb-item"><input type="radio" name="cs-ds" value="M"> M</label>
                                <label class="cb-item"><input type="radio" name="cs-ds" value="D"> D</label>
                                <label class="cb-item"><input type="radio" name="cs-ds" value="W"> W</label>
                                <label class="cb-item"><input type="radio" name="cs-ds" value="Sep"> Sep</label>
                            </div>
                        </div>
                    </div>
                    <hr class="border-gray-100">
                    <div class="text-center text-sm font-bold text-gray-700 uppercase tracking-widest">Discharge Summary</div>
                    <div class="grid grid-cols-2 gap-4">
                        <div><label class="section-title block">Date Admitted</label><input type="date" class="field-line"></div>
                        <div><label class="section-title block">Date Discharged</label><input type="date" class="field-line"></div>
                        <div><label class="section-title block">Attending Physician</label><input type="text" class="field-line" placeholder="Physician name"></div>
                        <div><label class="section-title block">Admitting Diagnosis</label><input type="text" class="field-line" placeholder="Admitting diagnosis"></div>
                        <div><label class="section-title block">Final Diagnosis</label><input type="text" class="field-line" placeholder="Final diagnosis"></div>
                        <div><label class="section-title block">Chief Complaints</label><input type="text" class="field-line" placeholder="Chief complaints"></div>
                    </div>
                    <div><label class="section-title block">Brief Clinical History and Pertinent P.E.</label><textarea class="form-textarea" rows="4" placeholder="Clinical history and physical examination findings…"></textarea></div>
                    <div><label class="section-title block">Laboratory Findings (including EKG, X-ray, and other diagnostic procedure)</label><textarea class="form-textarea" rows="4" placeholder="Lab findings, EKG, X-ray results…"></textarea></div>
                    <div><label class="section-title block">Course in the Ward (Include medications)</label><textarea class="form-textarea" rows="4" placeholder="Ward course and medications given…"></textarea></div>
                    <div><label class="section-title block">Disposition (Include home medication, special instruction and follow-up)</label><textarea class="form-textarea" rows="4" placeholder="Home medications, special instructions, follow-up schedule…"></textarea></div>
                </div>
            </div>
        </div>

        <!-- ══════════════════════════════════════════════
       FORM 9 — NUR-011 Medication Records
  ══════════════════════════════════════════════ -->
        <div class="form-page" id="form-8">
            <div class="bg-white border border-gray-200 rounded-xl shadow-sm overflow-hidden">
                <div class="bg-emerald-600 px-6 py-4 flex items-center justify-between">
                    <div>
                        <div class="text-white font-bold text-base">Medication Records</div>
                        <div class="text-emerald-200 text-xs mt-0.5">NUR-011-Ø · La Union Medical Center</div>
                    </div>
                    <span class="bg-white/20 text-white text-xs font-mono px-2 py-1 rounded">9 / 10</span>
                </div>
                <div class="p-6 space-y-5">
                    <div id="mar-patient" class="grid grid-cols-4 gap-4">
                        <div class="col-span-1"><label class="section-title block">Last Name</label><input type="text" class="field-line"></div>
                        <div class="col-span-1"><label class="section-title block">Given Name</label><input type="text" class="field-line"></div>
                        <div class="col-span-1"><label class="section-title block">Middle Name</label><input type="text" class="field-line"></div>
                        <div><label class="section-title block">Hosp. Case No.</label><input type="text" class="field-line"></div>
                        <div class="col-span-2"><label class="section-title block">Permanent Address</label><input type="text" class="field-line"></div>
                        <div><label class="section-title block">Tel. No.</label><input type="text" class="field-line"></div>
                        <div><label class="section-title block">Ward / Service</label><input type="text" class="field-line"></div>
                    </div>
                    <div class="text-xs text-amber-700 bg-amber-50 border border-amber-200 rounded-md px-4 py-2.5 font-medium">C — Circle all doses not given; state reason in nurse's note.</div>
                    <div class="overflow-x-auto">
                        <table class="border-collapse text-xs w-full" style="min-width:900px;" id="mar-table">
                            <thead>
                                <tr class="bg-gray-50">
                                    <th class="border border-gray-200 px-3 py-2 text-left font-bold text-gray-600 uppercase tracking-wide" style="min-width:140px;">Medication</th>
                                    <th class="border border-gray-200 px-2 py-2 text-center font-bold text-gray-600 uppercase tracking-wide w-12">Shift</th>
                                    <th class="border border-gray-200 text-center py-1 w-16"><input class="mar-input" type="text" placeholder="Date"></th>
                                    <th class="border border-gray-200 text-center py-1 w-16"><input class="mar-input" type="text" placeholder="Date"></th>
                                    <th class="border border-gray-200 text-center py-1 w-16"><input class="mar-input" type="text" placeholder="Date"></th>
                                    <th class="border border-gray-200 text-center py-1 w-16"><input class="mar-input" type="text" placeholder="Date"></th>
                                    <th class="border border-gray-200 text-center py-1 w-16"><input class="mar-input" type="text" placeholder="Date"></th>
                                    <th class="border border-gray-200 text-center py-1 w-16"><input class="mar-input" type="text" placeholder="Date"></th>
                                    <th class="border border-gray-200 text-center py-1 w-16"><input class="mar-input" type="text" placeholder="Date"></th>
                                    <th class="border border-gray-200 text-center py-1 w-16"><input class="mar-input" type="text" placeholder="Date"></th>
                                    <th class="border border-gray-200 text-center py-1 w-16"><input class="mar-input" type="text" placeholder="Date"></th>
                                    <th class="border border-gray-200 text-center py-1 w-16"><input class="mar-input" type="text" placeholder="Date"></th>
                                </tr>
                            </thead>
                            <tbody id="mar-body"></tbody>
                        </table>
                    </div>
                    <button onclick="addMedRow()" class="flex items-center gap-2 text-xs font-semibold text-emerald-600 border border-emerald-200 px-3 py-1.5 rounded-md hover:bg-emerald-50 transition">
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                            <path d="M12 5v14M5 12h14" />
                        </svg>Add Medication Row
                    </button>
                </div>
            </div>
        </div>

        <!-- ══════════════════════════════════════════════
       FORM 8 — NUR-010 Nurse's Notes
  ══════════════════════════════════════════════ -->
        <div class="form-page" id="form-7">
            <div class="bg-white border border-gray-200 rounded-xl shadow-sm overflow-hidden">
                <div class="bg-sky-600 px-6 py-4 flex items-center justify-between">
                    <div>
                        <div class="text-white font-bold text-base">Nurse's Notes</div>
                        <div class="text-sky-200 text-xs mt-0.5">NUR-010-Ø · La Union Medical Center</div>
                    </div>
                    <span class="bg-white/20 text-white text-xs font-mono px-2 py-1 rounded">8 / 10</span>
                </div>
                <div class="p-6 space-y-5">
                    <div class="grid grid-cols-4 gap-4">
                        <div><label class="section-title block">Last Name</label><input type="text" class="field-line"></div>
                        <div><label class="section-title block">Given Name</label><input type="text" class="field-line"></div>
                        <div><label class="section-title block">Middle Name</label><input type="text" class="field-line"></div>
                        <div><label class="section-title block">Hosp. Case No.</label><input type="text" class="field-line"></div>
                        <div class="col-span-2"><label class="section-title block">Permanent Address</label><input type="text" class="field-line"></div>
                        <div><label class="section-title block">Tel. No.</label><input type="text" class="field-line"></div>
                        <div><label class="section-title block">Ward / Service</label><input type="text" class="field-line"></div>
                    </div>
                    <div class="grid grid-cols-2 gap-4 text-sm">
                        <div>
                            <label class="section-title block">Sex</label>
                            <div class="flex gap-4 mt-1"><label class="cb-item"><input type="radio" name="sex-nn" value="M"> Male</label><label class="cb-item"><input type="radio" name="sex-nn" value="F"> Female</label></div>
                        </div>
                        <div>
                            <label class="section-title block">Civil Status</label>
                            <div class="flex flex-wrap gap-2 mt-1">
                                <label class="cb-item"><input type="radio" name="cs-nn"> S</label>
                                <label class="cb-item"><input type="radio" name="cs-nn"> M</label>
                                <label class="cb-item"><input type="radio" name="cs-nn"> D</label>
                                <label class="cb-item"><input type="radio" name="cs-nn"> W</label>
                                <label class="cb-item"><input type="radio" name="cs-nn"> Sep</label>
                            </div>
                        </div>
                    </div>
                    <div class="text-center text-sm font-bold text-gray-700 uppercase tracking-widest border-b border-gray-200 pb-3">Nurse's Notes</div>
                    <div id="nurse-notes-rows" class="space-y-3">
                        <div class="grid grid-cols-8 gap-2 items-start border border-gray-100 rounded-lg p-3 bg-gray-50">
                            <div class="col-span-1 space-y-2">
                                <div><label class="section-title block">Date</label><input type="date" class="field-line text-xs"></div>
                                <div><label class="section-title block">Shift</label>
                                    <select class="field-line text-xs bg-transparent">
                                        <option>7-3</option>
                                        <option>3-11</option>
                                        <option>11-7</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-span-6"><label class="section-title block">Notes</label><textarea class="form-textarea" rows="4" placeholder="Nursing notes…"></textarea></div>
                            <div class="col-span-1"><label class="section-title block">Signature</label><input type="text" class="field-line text-xs" placeholder="Sign"></div>
                        </div>
                    </div>
                    <button onclick="addNurseNoteRow()" class="flex items-center gap-2 text-xs font-semibold text-sky-600 border border-sky-200 px-3 py-1.5 rounded-md hover:bg-sky-50 transition">
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                            <path d="M12 5v14M5 12h14" />
                        </svg>Add Entry
                    </button>
                </div>
            </div>
        </div>

        <!-- ══════════════════════════════════════════════
       FORM 7 — NUR-007 TPR Record
  ══════════════════════════════════════════════ -->
        <div class="form-page" id="form-6">
            <div class="bg-white border border-gray-200 rounded-xl shadow-sm overflow-hidden">
                <div class="bg-rose-600 px-6 py-4 flex items-center justify-between">
                    <div>
                        <div class="text-white font-bold text-base">TPR Record — Graphic Record</div>
                        <div class="text-rose-200 text-xs mt-0.5">NUR-007-Ø · Hospital Form No. 10</div>
                    </div>
                    <span class="bg-white/20 text-white text-xs font-mono px-2 py-1 rounded">7 / 10</span>
                </div>
                <div class="p-6 space-y-6">

                    <!-- Patient Info -->
                    <div class="grid grid-cols-5 gap-4">
                        <div class="col-span-2"><label class="section-title block">Patient Name (Last, Given, Middle)</label><input type="text" class="field-line" placeholder="Full name"></div>
                        <div><label class="section-title block">Age</label><input type="number" class="field-line"></div>
                        <div><label class="section-title block">Sex</label><select class="field-line bg-transparent">
                                <option value="">Select</option>
                                <option>Male</option>
                                <option>Female</option>
                            </select></div>
                        <div><label class="section-title block">Ward</label><input type="text" class="field-line"></div>
                        <div><label class="section-title block">Bed No.</label><input type="text" class="field-line"></div>
                        <div class="col-span-2"><label class="section-title block">Hospital Case No.</label><input type="text" class="field-line"></div>
                    </div>

                    <!-- ── RESPIRATION ── -->
                    <div class="border border-blue-200 rounded-xl overflow-hidden">
                        <div class="bg-blue-50 px-4 py-2.5 flex items-center gap-2 border-b border-blue-100">
                            <span class="w-2.5 h-2.5 rounded-full bg-blue-500 flex-shrink-0"></span>
                            <span class="text-sm font-bold text-blue-800">Respiration</span>
                            <span class="text-xs text-blue-500 ml-1">(breaths/min)</span>
                        </div>
                        <div class="p-4 space-y-3">
                            <div class="overflow-x-auto">
                                <table class="border-collapse text-xs w-full" id="respi-table">
                                    <thead>
                                        <tr class="bg-gray-50">
                                            <td class="border border-gray-200 px-3 py-2 text-xs font-bold text-gray-500 uppercase w-28">Date</td>
                                            <td class="border border-gray-200 px-3 py-2 text-xs font-bold text-gray-500 uppercase w-24">Time</td>
                                            <td class="border border-gray-200 px-3 py-2 text-xs font-bold text-gray-500 uppercase w-24">Value (bpm)</td>
                                            <td class="border border-gray-200 px-3 py-2 text-xs font-bold text-gray-500 uppercase">Notes</td>
                                            <td class="border border-gray-200 px-2 py-2 w-8"></td>
                                        </tr>
                                    </thead>
                                    <tbody id="respi-body"></tbody>
                                </table>
                            </div>
                            <button onclick="addTPRRow('respi')" class="flex items-center gap-1.5 text-xs font-semibold text-blue-600 border border-blue-200 px-3 py-1.5 rounded-md hover:bg-blue-50 transition">
                                <svg class="w-3 h-3" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                                    <path d="M12 5v14M5 12h14" />
                                </svg>Add Entry
                            </button>
                            <div class="bg-gray-50 border border-gray-200 rounded-lg p-3">
                                <div class="text-xs font-semibold text-gray-500 mb-2 uppercase tracking-wide">Respiration Chart</div>
                                <canvas id="respi-chart" style="width:100%;height:200px;display:block;"></canvas>
                                <div class="text-xs text-gray-400 text-center mt-1">Enter values above to plot the graph</div>
                            </div>
                        </div>
                    </div>

                    <!-- ── PULSE ── -->
                    <div class="border border-rose-200 rounded-xl overflow-hidden">
                        <div class="bg-rose-50 px-4 py-2.5 flex items-center gap-2 border-b border-rose-100">
                            <span class="w-2.5 h-2.5 rounded-full bg-rose-500 flex-shrink-0"></span>
                            <span class="text-sm font-bold text-rose-800">Pulse Rate</span>
                            <span class="text-xs text-rose-500 ml-1">(beats/min)</span>
                        </div>
                        <div class="p-4 space-y-3">
                            <div class="overflow-x-auto">
                                <table class="border-collapse text-xs w-full" id="pulse-table">
                                    <thead>
                                        <tr class="bg-gray-50">
                                            <td class="border border-gray-200 px-3 py-2 text-xs font-bold text-gray-500 uppercase w-28">Date</td>
                                            <td class="border border-gray-200 px-3 py-2 text-xs font-bold text-gray-500 uppercase w-24">Time</td>
                                            <td class="border border-gray-200 px-3 py-2 text-xs font-bold text-gray-500 uppercase w-24">Value (bpm)</td>
                                            <td class="border border-gray-200 px-3 py-2 text-xs font-bold text-gray-500 uppercase">Notes</td>
                                            <td class="border border-gray-200 px-2 py-2 w-8"></td>
                                        </tr>
                                    </thead>
                                    <tbody id="pulse-body"></tbody>
                                </table>
                            </div>
                            <button onclick="addTPRRow('pulse')" class="flex items-center gap-1.5 text-xs font-semibold text-rose-600 border border-rose-200 px-3 py-1.5 rounded-md hover:bg-rose-50 transition">
                                <svg class="w-3 h-3" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                                    <path d="M12 5v14M5 12h14" />
                                </svg>Add Entry
                            </button>
                            <div class="bg-gray-50 border border-gray-200 rounded-lg p-3">
                                <div class="text-xs font-semibold text-gray-500 mb-2 uppercase tracking-wide">Pulse Chart</div>
                                <canvas id="pulse-chart" style="width:100%;height:200px;display:block;"></canvas>
                                <div class="text-xs text-gray-400 text-center mt-1">Enter values above to plot the graph</div>
                            </div>
                        </div>
                    </div>

                    <!-- ── TEMPERATURE ── -->
                    <div class="border border-amber-200 rounded-xl overflow-hidden">
                        <div class="bg-amber-50 px-4 py-2.5 flex items-center gap-2 border-b border-amber-100">
                            <span class="w-2.5 h-2.5 rounded-full bg-amber-500 flex-shrink-0"></span>
                            <span class="text-sm font-bold text-amber-800">Temperature</span>
                            <span class="text-xs text-amber-500 ml-1">(°C)</span>
                        </div>
                        <div class="p-4 space-y-3">
                            <div class="overflow-x-auto">
                                <table class="border-collapse text-xs w-full" id="temp-table">
                                    <thead>
                                        <tr class="bg-gray-50">
                                            <td class="border border-gray-200 px-3 py-2 text-xs font-bold text-gray-500 uppercase w-28">Date</td>
                                            <td class="border border-gray-200 px-3 py-2 text-xs font-bold text-gray-500 uppercase w-24">Time</td>
                                            <td class="border border-gray-200 px-3 py-2 text-xs font-bold text-gray-500 uppercase w-24">Value (°C)</td>
                                            <td class="border border-gray-200 px-3 py-2 text-xs font-bold text-gray-500 uppercase">Notes</td>
                                            <td class="border border-gray-200 px-2 py-2 w-8"></td>
                                        </tr>
                                    </thead>
                                    <tbody id="temp-body"></tbody>
                                </table>
                            </div>
                            <button onclick="addTPRRow('temp')" class="flex items-center gap-1.5 text-xs font-semibold text-amber-600 border border-amber-200 px-3 py-1.5 rounded-md hover:bg-amber-50 transition">
                                <svg class="w-3 h-3" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                                    <path d="M12 5v14M5 12h14" />
                                </svg>Add Entry
                            </button>
                            <div class="bg-gray-50 border border-gray-200 rounded-lg p-3">
                                <div class="text-xs font-semibold text-gray-500 mb-2 uppercase tracking-wide">Temperature Chart</div>
                                <canvas id="temp-chart" style="width:100%;height:200px;display:block;"></canvas>
                                <div class="text-xs text-gray-400 text-center mt-1">Enter values above to plot the graph</div>
                            </div>
                        </div>
                    </div>

                    <!-- ── URINE & STOOL ── -->
                    <div class="grid grid-cols-2 gap-4">
                        <div class="border border-gray-200 rounded-xl overflow-hidden">
                            <div class="bg-gray-50 px-4 py-2.5 border-b border-gray-100 flex items-center gap-2">
                                <span class="w-2.5 h-2.5 rounded-full bg-gray-400"></span>
                                <span class="text-sm font-bold text-gray-700">Urine Output</span>
                            </div>
                            <div class="p-3" id="urine-entries">
                                <table class="border-collapse text-xs w-full">
                                    <thead>
                                        <tr class="bg-gray-50">
                                            <td class="border border-gray-200 px-2 py-1.5 font-bold text-gray-500 uppercase">Date</td>
                                            <td class="border border-gray-200 px-2 py-1.5 font-bold text-gray-500 uppercase">Time</td>
                                            <td class="border border-gray-200 px-2 py-1.5 font-bold text-gray-500 uppercase">Amount</td>
                                        </tr>
                                    </thead>
                                    <tbody id="urine-body"></tbody>
                                </table>
                                <button onclick="addOutputRow('urine')" class="mt-2 text-xs text-gray-500 border border-gray-200 px-2 py-1 rounded hover:bg-gray-50 transition">+ Add</button>
                            </div>
                        </div>
                        <div class="border border-gray-200 rounded-xl overflow-hidden">
                            <div class="bg-gray-50 px-4 py-2.5 border-b border-gray-100 flex items-center gap-2">
                                <span class="w-2.5 h-2.5 rounded-full bg-gray-500"></span>
                                <span class="text-sm font-bold text-gray-700">Stool</span>
                            </div>
                            <div class="p-3">
                                <table class="border-collapse text-xs w-full">
                                    <thead>
                                        <tr class="bg-gray-50">
                                            <td class="border border-gray-200 px-2 py-1.5 font-bold text-gray-500 uppercase">Date</td>
                                            <td class="border border-gray-200 px-2 py-1.5 font-bold text-gray-500 uppercase">Time</td>
                                            <td class="border border-gray-200 px-2 py-1.5 font-bold text-gray-500 uppercase">Amount</td>
                                        </tr>
                                    </thead>
                                    <tbody id="stool-body"></tbody>
                                </table>
                                <button onclick="addOutputRow('stool')" class="mt-2 text-xs text-gray-500 border border-gray-200 px-2 py-1 rounded hover:bg-gray-50 transition">+ Add</button>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <!-- ══════════════════════════════════════════════
       FORM 6 — NUR-019 Newborn Record
  ══════════════════════════════════════════════ -->
        <div class="form-page" id="form-5">
            <div class="bg-white border border-gray-200 rounded-xl shadow-sm overflow-hidden">
                <div class="bg-pink-500 px-6 py-4 flex items-center justify-between">
                    <div>
                        <div class="text-white font-bold text-base">Newborn Record</div>
                        <div class="text-pink-200 text-xs mt-0.5">NUR-019-Ø · La Union Medical Center</div>
                    </div>
                    <span class="bg-white/20 text-white text-xs font-mono px-2 py-1 rounded">6 / 10</span>
                </div>
                <div class="p-6 space-y-5">
                    <div class="grid grid-cols-4 gap-4">
                        <div><label class="section-title block">Last Name</label><input type="text" class="field-line"></div>
                        <div><label class="section-title block">Given Name</label><input type="text" class="field-line"></div>
                        <div><label class="section-title block">Middle Name</label><input type="text" class="field-line"></div>
                        <div><label class="section-title block">Hosp. Case No.</label><input type="text" class="field-line"></div>
                        <div class="col-span-2"><label class="section-title block">Permanent Address</label><input type="text" class="field-line"></div>
                        <div><label class="section-title block">Tel. No.</label><input type="text" class="field-line"></div>
                        <div><label class="section-title block">Ward / Service</label><input type="text" class="field-line"></div>
                    </div>
                    <div class="text-center text-sm font-bold text-gray-700 uppercase tracking-widest border-b border-gray-200 pb-3">Newborn Record — Physical Examination</div>
                    <div class="grid grid-cols-2 gap-6">
                        <div class="space-y-3">
                            <div class="grid grid-cols-2 gap-3">
                                <div><label class="section-title block">Date</label><input type="date" class="field-line"></div>
                                <div><label class="section-title block">Apgar Score at Birth</label><input type="text" class="field-line"></div>
                                <div><label class="section-title block">Apgar Score 5 Min. After</label><input type="text" class="field-line"></div>
                                <div><label class="section-title block">Apgar Score 10 Min. After</label><input type="text" class="field-line"></div>
                            </div>
                            <div><label class="section-title block">General Condition</label><input type="text" class="field-line"></div>
                            <div><label class="section-title block">General Muscular Tonus</label><input type="text" class="field-line"></div>
                            <div class="section-title mt-3">Skin</div>
                            <div class="grid grid-cols-2 gap-3">
                                <div><label class="section-title block">Color</label><input type="text" class="field-line"></div>
                                <div><label class="section-title block">Turgor</label><input type="text" class="field-line"></div>
                                <div><label class="section-title block">Rash</label><input type="text" class="field-line"></div>
                                <div><label class="section-title block">Desquamation</label><input type="text" class="field-line"></div>
                            </div>
                            <div class="section-title mt-2">Head</div>
                            <div class="grid grid-cols-2 gap-3">
                                <div><label class="section-title block">Molding</label><input type="text" class="field-line"></div>
                                <div><label class="section-title block">Scalp</label><input type="text" class="field-line"></div>
                                <div><label class="section-title block">Fontanels</label><input type="text" class="field-line"></div>
                                <div><label class="section-title block">Suture</label><input type="text" class="field-line"></div>
                            </div>
                            <div><label class="section-title block">Face</label><input type="text" class="field-line"></div>
                            <div class="section-title mt-2">Eyes</div>
                            <div class="grid grid-cols-2 gap-3">
                                <div><label class="section-title block">Conjunction</label><input type="text" class="field-line"></div>
                                <div><label class="section-title block">Sclera</label><input type="text" class="field-line"></div>
                                <div><label class="section-title block">Pupils</label><input type="text" class="field-line"></div>
                                <div><label class="section-title block">Discharge</label><input type="text" class="field-line"></div>
                            </div>
                            <div><label class="section-title block">Ears</label><input type="text" class="field-line"></div>
                            <div><label class="section-title block">Nose</label><input type="text" class="field-line"></div>
                            <div class="section-title mt-2">Mouth</div>
                            <div class="grid grid-cols-3 gap-3">
                                <div><label class="section-title block">Lip</label><input type="text" class="field-line"></div>
                                <div><label class="section-title block">Tongue</label><input type="text" class="field-line"></div>
                                <div><label class="section-title block">Palate</label><input type="text" class="field-line"></div>
                            </div>
                            <div class="section-title mt-2">Neck</div>
                            <div class="grid grid-cols-2 gap-3">
                                <div><label class="section-title block">Sternocleidomastoid</label><input type="text" class="field-line"></div>
                                <div><label class="section-title block">Fistula</label><input type="text" class="field-line"></div>
                            </div>
                            <div><label class="section-title block">Other Findings</label><input type="text" class="field-line"></div>
                            <div class="section-title mt-2">Chest</div>
                            <div class="grid grid-cols-3 gap-3">
                                <div><label class="section-title block">Shape</label><input type="text" class="field-line"></div>
                                <div><label class="section-title block">Respiration</label><input type="text" class="field-line"></div>
                                <div><label class="section-title block">Clavicles</label><input type="text" class="field-line"></div>
                                <div><label class="section-title block">Breast</label><input type="text" class="field-line"></div>
                                <div><label class="section-title block">Heart</label><input type="text" class="field-line"></div>
                                <div><label class="section-title block">Lungs</label><input type="text" class="field-line"></div>
                            </div>
                        </div>
                        <div class="space-y-3">
                            <div class="grid grid-cols-2 gap-3">
                                <div><label class="section-title block">Hour After Birth</label><input type="text" class="field-line"></div>
                                <div><label class="section-title block">Head Circumference</label><input type="text" class="field-line" placeholder="cm"></div>
                                <div><label class="section-title block">Chest Circumference</label><input type="text" class="field-line" placeholder="cm"></div>
                                <div><label class="section-title block">Abdomen Circumference</label><input type="text" class="field-line" placeholder="cm"></div>
                                <div><label class="section-title block">Birth Weight</label><input type="text" class="field-line" placeholder="kg"></div>
                                <div><label class="section-title block">Birth Length</label><input type="text" class="field-line" placeholder="cm"></div>
                            </div>
                            <div class="grid grid-cols-2 gap-3 mt-2">
                                <div><label class="section-title block">Abdomen</label><input type="text" class="field-line"></div>
                                <div><label class="section-title block">Spleen</label><input type="text" class="field-line"></div>
                                <div><label class="section-title block">Kidneys</label><input type="text" class="field-line"></div>
                                <div><label class="section-title block">Liver</label><input type="text" class="field-line"></div>
                                <div><label class="section-title block">Umbilical Cord</label><input type="text" class="field-line"></div>
                                <div><label class="section-title block">Inguinal Hernia</label><input type="text" class="field-line"></div>
                                <div><label class="section-title block">Diastasis Recti</label><input type="text" class="field-line"></div>
                            </div>
                            <div><label class="section-title block">Other Findings</label><input type="text" class="field-line"></div>
                            <div class="section-title mt-2">Genitals</div>
                            <div class="grid grid-cols-3 gap-3">
                                <div><label class="section-title block">Male: Testes (Tr.)</label><input type="text" class="field-line"></div>
                                <div><label class="section-title block">L.</label><input type="text" class="field-line"></div>
                                <div><label class="section-title block">Abnormalities</label><input type="text" class="field-line"></div>
                            </div>
                            <div><label class="section-title block">Vaginal Bleeding</label><input type="text" class="field-line"></div>
                            <div><label class="section-title block">Abnormalities</label><input type="text" class="field-line"></div>
                            <div><label class="section-title block">Extremities</label><input type="text" class="field-line"></div>
                            <div class="grid grid-cols-2 gap-3">
                                <div><label class="section-title block">Clubfoot</label><input type="text" class="field-line"></div>
                                <div><label class="section-title block">Hip Dislocation</label><input type="text" class="field-line"></div>
                                <div><label class="section-title block">Femoral Pulse</label><input type="text" class="field-line"></div>
                                <div><label class="section-title block">Spine</label><input type="text" class="field-line"></div>
                            </div>
                            <div><label class="section-title block">Anus</label><input type="text" class="field-line"></div>
                            <div><label class="section-title block">Impression</label><textarea class="form-textarea" rows="2"></textarea></div>
                            <div><label class="section-title block">Pediatrician, M.D.</label><input type="text" class="field-line" placeholder="Pediatrician name"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- ══════════════════════════════════════════════
       FORM 5 — Newborn Maturity Rating
  ══════════════════════════════════════════════ -->
        <div class="form-page" id="form-4">
            <div class="bg-white border border-gray-200 rounded-xl shadow-sm overflow-hidden">
                <div class="bg-fuchsia-600 px-6 py-4 flex items-center justify-between">
                    <div>
                        <div class="text-white font-bold text-base">Newborn Maturity Rating & Classification</div>
                        <div class="text-fuchsia-200 text-xs mt-0.5">Estimation of Gestational Age by Maturity Rating</div>
                    </div>
                    <span class="bg-white/20 text-white text-xs font-mono px-2 py-1 rounded">5 / 10</span>
                </div>
                <div class="p-6 space-y-5">
                    <div class="text-xs text-gray-500 bg-gray-50 border border-gray-200 rounded-md p-3 font-medium">Symbols: <strong class="text-gray-800">X</strong> — 1st Exam &nbsp;|&nbsp; <strong class="text-gray-800">O</strong> — 2nd Exam</div>
                    <!-- Neuromuscular Maturity -->
                    <div>
                        <div class="text-sm font-bold text-gray-700 mb-3">Neuromuscular Maturity</div>
                        <div class="overflow-x-auto">
                            <table class="border-collapse text-xs w-full" style="min-width:500px;">
                                <thead>
                                    <tr class="bg-gray-50">
                                        <th class="border border-gray-200 px-3 py-2 text-left font-bold text-gray-600">Sign</th>
                                        <th class="border border-gray-200 px-3 py-2 text-center font-bold text-gray-600">0</th>
                                        <th class="border border-gray-200 px-3 py-2 text-center font-bold text-gray-600">1</th>
                                        <th class="border border-gray-200 px-3 py-2 text-center font-bold text-gray-600">2</th>
                                        <th class="border border-gray-200 px-3 py-2 text-center font-bold text-gray-600">3</th>
                                        <th class="border border-gray-200 px-3 py-2 text-center font-bold text-gray-600">4</th>
                                        <th class="border border-gray-200 px-3 py-2 text-center font-bold text-gray-600">5</th>
                                        <th class="border border-gray-200 px-3 py-2 text-center font-bold text-indigo-600 w-20">Score</th>
                                    </tr>
                                </thead>
                                <tbody id="neuro-body"></tbody>
                            </table>
                        </div>
                    </div>
                    <!-- Physical Maturity -->
                    <div>
                        <div class="text-sm font-bold text-gray-700 mb-3">Physical Maturity</div>
                        <div class="overflow-x-auto">
                            <table class="border-collapse text-xs w-full" style="min-width:500px;">
                                <thead>
                                    <tr class="bg-gray-50">
                                        <th class="border border-gray-200 px-3 py-2 text-left font-bold text-gray-600">Sign</th>
                                        <th class="border border-gray-200 px-3 py-2 text-center font-bold text-gray-600">0</th>
                                        <th class="border border-gray-200 px-3 py-2 text-center font-bold text-gray-600">1</th>
                                        <th class="border border-gray-200 px-3 py-2 text-center font-bold text-gray-600">2</th>
                                        <th class="border border-gray-200 px-3 py-2 text-center font-bold text-gray-600">3</th>
                                        <th class="border border-gray-200 px-3 py-2 text-center font-bold text-gray-600">4</th>
                                        <th class="border border-gray-200 px-3 py-2 text-center font-bold text-gray-600">5</th>
                                        <th class="border border-gray-200 px-3 py-2 text-center font-bold text-indigo-600 w-20">Score</th>
                                    </tr>
                                </thead>
                                <tbody id="phys-body"></tbody>
                            </table>
                        </div>
                    </div>
                    <!-- Scoring Section -->
                    <div class="grid grid-cols-2 gap-6">
                        <div class="space-y-3">
                            <div class="text-sm font-bold text-gray-700">Maturity Rating</div>
                            <div class="overflow-x-auto">
                                <table class="border-collapse text-xs">
                                    <thead>
                                        <tr class="bg-gray-50">
                                            <th class="border border-gray-200 px-4 py-2 font-bold text-gray-600">Score</th>
                                            <th class="border border-gray-200 px-4 py-2 font-bold text-gray-600">Weeks</th>
                                        </tr>
                                    </thead>
                                    <tbody id="maturity-rating-body"></tbody>
                                </table>
                            </div>
                        </div>
                        <div class="space-y-4">
                            <div class="text-sm font-bold text-gray-700">Scoring Section</div>
                            <div class="grid grid-cols-2 gap-4 text-xs">
                                <div class="space-y-2 border border-gray-200 rounded-lg p-3">
                                    <div class="font-bold text-gray-600 uppercase tracking-wide">1st Exam (X)</div>
                                    <div><label class="section-title block">Gestational Age (Weeks)</label><input type="text" class="field-line"></div>
                                    <div><label class="section-title block">Date of Exam</label><input type="date" class="field-line"></div>
                                    <div><label class="section-title block">Hour</label><input type="text" class="field-line" placeholder="am/pm"></div>
                                    <div><label class="section-title block">Age at Exam (Hours)</label><input type="number" class="field-line"></div>
                                    <div><label class="section-title block">Signature of Examiner (M.D./R.N.)</label><input type="text" class="field-line"></div>
                                </div>
                                <div class="space-y-2 border border-gray-200 rounded-lg p-3">
                                    <div class="font-bold text-gray-600 uppercase tracking-wide">2nd Exam (O)</div>
                                    <div><label class="section-title block">Gestational Age (Weeks)</label><input type="text" class="field-line"></div>
                                    <div><label class="section-title block">Date of Exam</label><input type="date" class="field-line"></div>
                                    <div><label class="section-title block">Hour</label><input type="text" class="field-line" placeholder="am/pm"></div>
                                    <div><label class="section-title block">Age at Exam (Hours)</label><input type="number" class="field-line"></div>
                                    <div><label class="section-title block">Signature of Examiner (M.D./R.N.)</label><input type="text" class="field-line"></div>
                                </div>
                            </div>
                            <div class="grid grid-cols-2 gap-3">
                                <div><label class="section-title block">Gestation by Dates (wks)</label><input type="text" class="field-line"></div>
                                <div><label class="section-title block">Birth Date</label><input type="date" class="field-line"></div>
                                <div><label class="section-title block">APGAR 1 min</label><input type="text" class="field-line"></div>
                                <div><label class="section-title block">APGAR 5 min</label><input type="text" class="field-line"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- ══════════════════════════════════════════════
       FORM 4 — NUR-044 Breastfeeding Observation
  ══════════════════════════════════════════════ -->
        <div class="form-page" id="form-3">
            <div class="bg-white border border-gray-200 rounded-xl shadow-sm overflow-hidden">
                <div class="bg-amber-500 px-6 py-4 flex items-center justify-between">
                    <div>
                        <div class="text-white font-bold text-base">Breastfeeding Observation Job Aid</div>
                        <div class="text-amber-100 text-xs mt-0.5">NUR-044-Ø · La Union Medical Center</div>
                    </div>
                    <span class="bg-white/20 text-white text-xs font-mono px-2 py-1 rounded">4 / 10</span>
                </div>
                <div class="p-6 space-y-5">
                    <div class="grid grid-cols-4 gap-4">
                        <div class="col-span-2"><label class="section-title block">Mother's Name</label><input type="text" class="field-line"></div>
                        <div><label class="section-title block">Date</label><input type="date" class="field-line"></div>
                        <div></div>
                        <div class="col-span-2"><label class="section-title block">Baby's Name</label><input type="text" class="field-line"></div>
                        <div><label class="section-title block">Baby's Age</label><input type="text" class="field-line" placeholder="e.g. 2 days"></div>
                    </div>
                    <div class="grid grid-cols-2 gap-6">
                        <div>
                            <div class="text-sm font-bold text-green-700 mb-3 flex items-center gap-2"><span class="w-2 h-2 bg-green-500 rounded-full"></span>Signs that Breastfeeding is Going Well</div>
                            <div id="bf-good"></div>
                        </div>
                        <div>
                            <div class="text-sm font-bold text-red-700 mb-3 flex items-center gap-2"><span class="w-2 h-2 bg-red-500 rounded-full"></span>Signs of Possible Difficulty</div>
                            <div id="bf-diff"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- ══════════════════════════════════════════════
       FORM 3 — NUR-055 Growth Charts
  ══════════════════════════════════════════════ -->
        <div class="form-page" id="form-2">
            <div class="bg-white border border-gray-200 rounded-xl shadow-sm overflow-hidden">
                <div class="bg-teal-600 px-6 py-4 flex items-center justify-between">
                    <div>
                        <div class="text-white font-bold text-base">WHO Growth Charts — Girls (Birth to 2 Years)</div>
                        <div class="text-teal-200 text-xs mt-0.5">NUR-055-Ø · Z-Score Reference</div>
                    </div>
                    <span class="bg-white/20 text-white text-xs font-mono px-2 py-1 rounded">3 / 10</span>
                </div>
                <div class="p-6 space-y-6">
                    <div class="grid grid-cols-3 gap-4">
                        <div><label class="section-title block">Patient Name</label><input type="text" class="field-line"></div>
                        <div><label class="section-title block">Date of Birth</label><input type="date" class="field-line"></div>
                        <div><label class="section-title block">Hospital Case No.</label><input type="text" class="field-line"></div>
                    </div>
                    <!-- Weight for Age -->
                    <div>
                        <div class="text-sm font-bold text-gray-700 mb-2">Weight-for-Age GIRLS — Birth to 2 years (z-scores)</div>
                        <div class="bg-gray-50 border border-gray-200 rounded-lg p-4 overflow-x-auto">
                            <svg viewBox="0 0 700 280" class="w-full" style="min-width:500px;" id="weight-chart"></svg>
                        </div>
                    </div>
                    <!-- Length for Age -->
                    <div>
                        <div class="text-sm font-bold text-gray-700 mb-2">Length-for-Age GIRLS — Birth to 2 years (z-scores)</div>
                        <div class="bg-gray-50 border border-gray-200 rounded-lg p-4 overflow-x-auto">
                            <svg viewBox="0 0 700 280" class="w-full" style="min-width:500px;" id="length-chart"></svg>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- ══════════════════════════════════════════════
       FORM 2 — NUR-009 Doctor's Order Compliance
  ══════════════════════════════════════════════ -->
        <div class="form-page" id="form-1">
            <div class="bg-white border border-gray-200 rounded-xl shadow-sm overflow-hidden">
                <div class="bg-slate-700 px-6 py-4 flex items-center justify-between">
                    <div>
                        <div class="text-white font-bold text-base">Doctor's Order Compliance Sheet</div>
                        <div class="text-slate-300 text-xs mt-0.5">NUR-009-1 · Authentication All Orders</div>
                    </div>
                    <span class="bg-white/20 text-white text-xs font-mono px-2 py-1 rounded">2 / 10</span>
                </div>
                <div class="p-6 space-y-5">
                    <div class="grid grid-cols-4 gap-4">
                        <div><label class="section-title block">Last Name</label><input type="text" class="field-line"></div>
                        <div><label class="section-title block">Given Name</label><input type="text" class="field-line"></div>
                        <div><label class="section-title block">Middle Name</label><input type="text" class="field-line"></div>
                        <div><label class="section-title block">Hosp. Case No.</label><input type="text" class="field-line"></div>
                        <div class="col-span-2"><label class="section-title block">Permanent Address</label><input type="text" class="field-line"></div>
                        <div><label class="section-title block">Tel. No.</label><input type="text" class="field-line"></div>
                        <div><label class="section-title block">Ward / Service</label><input type="text" class="field-line"></div>
                    </div>
                    <div class="bg-gray-50 border border-gray-200 rounded-md p-3 flex flex-wrap gap-4 text-xs font-semibold text-gray-600">
                        <span><strong class="text-gray-800">C</strong> — Carried</span>
                        <span><strong class="text-gray-800">A</strong> — Administrative</span>
                        <span><strong class="text-gray-800">R</strong> — Requested</span>
                        <span><strong class="text-gray-800">E</strong> — Endorsed</span>
                        <span><strong class="text-gray-800">D</strong> — Discontinued</span>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="border-collapse text-xs w-full">
                            <thead>
                                <tr class="bg-gray-50">
                                    <th class="border border-gray-200 px-3 py-2 text-left font-bold text-gray-600 w-24">Date / Time</th>
                                    <th class="border border-gray-200 px-3 py-2 text-left font-bold text-gray-600">Doctor's Order</th>
                                    <th class="border border-gray-200 px-3 py-2 text-center font-bold text-gray-600 w-16">Status</th>
                                    <th class="border border-gray-200 px-3 py-2 text-center font-bold text-gray-600 w-28">Time / Posted / Signature</th>
                                </tr>
                            </thead>
                            <tbody id="order-body"></tbody>
                        </table>
                    </div>
                    <button onclick="addOrderRow()" class="flex items-center gap-2 text-xs font-semibold text-slate-600 border border-slate-200 px-3 py-1.5 rounded-md hover:bg-slate-50 transition">
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                            <path d="M12 5v14M5 12h14" />
                        </svg>Add Order
                    </button>
                </div>
            </div>
        </div>

        <!-- ══════════════════════════════════════════════
       FORM 1 — NUR-022 Maternal History
  ══════════════════════════════════════════════ -->
        <div class="form-page active" id="form-0">
            <div class="bg-white border border-gray-200 rounded-xl shadow-sm overflow-hidden">
                <div class="bg-violet-600 px-6 py-4 flex items-center justify-between">
                    <div>
                        <div class="text-white font-bold text-base">Maternal History (NICU Admission)</div>
                        <div class="text-violet-200 text-xs mt-0.5">NUR-022-Ø · La Union Medical Center</div>
                    </div>
                    <span class="bg-white/20 text-white text-xs font-mono px-2 py-1 rounded">1 / 10</span>
                </div>
                <div class="p-6 space-y-5">
                    <div class="grid grid-cols-3 gap-4">
                        <div class="col-span-2"><label class="section-title block">Name of Baby</label><input type="text" class="field-line"></div>
                        <div><label class="section-title block">Age of Baby</label><input type="text" class="field-line" placeholder="e.g. 1 day"></div>
                        <div class="col-span-2"><label class="section-title block">Name of Mother</label><input type="text" class="field-line"></div>
                        <div><label class="section-title block">Age of Mother</label><input type="number" class="field-line"></div>
                        <div class="col-span-3"><label class="section-title block">Address</label><input type="text" class="field-line"></div>
                    </div>
                    <hr class="border-gray-100">
                    <div class="grid grid-cols-2 gap-6">
                        <div class="space-y-4">
                            <div class="grid grid-cols-2 gap-4">
                                <div><label class="section-title block">Gravida</label><input type="number" class="field-line" min="1"></div>
                                <div><label class="section-title block">Para</label><input type="number" class="field-line" min="0"></div>
                            </div>
                            <div><label class="section-title block">Maternal History (Hx)</label><textarea class="form-textarea" rows="3"></textarea></div>
                            <div>
                                <label class="section-title block">Prenatal Checkup</label>
                                <div class="mt-2 space-y-2">
                                    <label class="cb-item"><input type="checkbox"> LUMC</label>
                                    <label class="cb-item"><input type="checkbox"> Health Center</label>
                                    <label class="cb-item"><input type="checkbox"> Private Clinic</label>
                                    <label class="cb-item"><input type="checkbox"> None</label>
                                </div>
                            </div>
                            <div><label class="section-title block">How many times (prenatal visits)</label><input type="number" class="field-line" min="0"></div>
                            <div><label class="section-title block">Maternal Signs / Symptoms</label><textarea class="form-textarea" rows="2"></textarea></div>
                            <div>
                                <label class="section-title block">Multivitamins</label>
                                <div class="flex gap-4 mt-1">
                                    <label class="cb-item"><input type="radio" name="mv"> Yes</label>
                                    <label class="cb-item"><input type="radio" name="mv"> No</label>
                                </div>
                            </div>
                            <div>
                                <label class="section-title block">Ultrasound</label>
                                <div class="flex gap-4 mt-1">
                                    <label class="cb-item"><input type="radio" name="us"> Yes</label>
                                    <label class="cb-item"><input type="radio" name="us"> No</label>
                                </div>
                            </div>
                        </div>
                        <div class="space-y-4">
                            <div>
                                <label class="section-title block">AOG: Preterm Labor?</label>
                                <div class="flex gap-4 mt-1">
                                    <label class="cb-item"><input type="radio" name="ptl"> Yes</label>
                                    <label class="cb-item"><input type="radio" name="ptl"> No</label>
                                </div>
                            </div>
                            <div><label class="section-title block">If Yes — Steroids Given</label><input type="text" class="field-line" placeholder="Steroid type and dose"></div>
                            <div><label class="section-title block">AOG (Weeks)</label><input type="number" class="field-line" placeholder="Gestational age in weeks"></div>
                            <div><label class="section-title block">Type of Delivery</label>
                                <div class="mt-1 space-y-1">
                                    <label class="cb-item"><input type="radio" name="deliv"> Normal Spontaneous Delivery (NSD)</label>
                                    <label class="cb-item"><input type="radio" name="deliv"> Cesarean Section (CS)</label>
                                    <label class="cb-item"><input type="radio" name="deliv"> Forceps / Vacuum Assisted</label>
                                </div>
                            </div>
                            <div><label class="section-title block">Complications During Delivery</label><textarea class="form-textarea" rows="2"></textarea></div>
                            <div><label class="section-title block">Attending Physician / Midwife</label><input type="text" class="field-line"></div>
                            <div><label class="section-title block">Place of Delivery</label><input type="text" class="field-line"></div>
                            <div><label class="section-title block">Remarks / Additional History</label><textarea class="form-textarea" rows="3"></textarea></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Fixed Bottom Nav -->
    <div class="fixed bottom-0 left-0 right-0 z-50 bg-white border-t border-gray-200 shadow-lg">
        <div class="max-w-5xl mx-auto px-5 py-3 flex items-center justify-between">
            <button id="btn-prev" onclick="navigate(-1)" class="flex items-center gap-2 px-5 py-2.5 rounded-lg border-2 border-gray-200 text-sm font-semibold text-gray-600 hover:bg-gray-50 hover:border-gray-300 transition disabled:opacity-30 disabled:cursor-not-allowed" disabled>
                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                    <path d="M15 18l-6-6 6-6" />
                </svg>
                Previous
            </button>

            <div class="flex flex-col items-center">
                <div class="text-xs font-bold text-gray-800" id="form-title-bottom">Maternal History (NUR-022)</div>
                <div class="flex gap-1.5 mt-1.5">
                    <div id="progress-dots" class="flex gap-1.5"></div>
                </div>
            </div>

            <button id="btn-next" onclick="navigate(1)" class="flex items-center gap-2 px-5 py-2.5 rounded-lg border-2 border-indigo-500 bg-indigo-500 text-sm font-semibold text-white hover:bg-indigo-600 hover:border-indigo-600 transition">
                Next
                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                    <path d="M9 18l6-6-6-6" />
                </svg>
            </button>
        </div>
    </div>

    <script>
        // ─── State ───────────────────────────────────────────
        let current = 0;
        const TOTAL = 10;
        const formTitles = [
            'Maternal History (NUR-022)',
            "Doctor's Order Compliance (NUR-009)",
            'Growth Charts (NUR-055)',
            'Breastfeeding Observation (NUR-044)',
            'Newborn Maturity Rating',
            'Newborn Record (NUR-019)',
            'TPR Record (NUR-007)',
            "Nurse's Notes (NUR-010)",
            'Medication Records (NUR-011)',
            'Discharge Summary (NUR-013)'
        ];

        // ─── Navigation ───────────────────────────────────────
        function goTo(idx) {
            document.getElementById(`form-${current}`).classList.remove('active');
            document.querySelectorAll('.nav-pill')[current].classList.remove('active');
            current = idx;
            document.getElementById(`form-${current}`).classList.add('active');
            document.querySelectorAll('.nav-pill')[current].classList.add('active');
            document.getElementById('form-badge').textContent = `Form ${current+1} of ${TOTAL}`;
            document.getElementById('form-title-bottom').textContent = formTitles[current];
            document.getElementById('btn-prev').disabled = current === 0;
            document.getElementById('btn-next').textContent = current === TOTAL - 1 ? 'Submit' : 'Next';
            document.getElementById('btn-next').innerHTML = current === TOTAL - 1 ?
                '<svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path d="M5 12l5 5L20 7"/></svg> Submit' :
                'Next <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path d="M9 18l6-6-6-6"/></svg>';
            updateDots();
            // scroll nav pill into view
            document.querySelectorAll('.nav-pill')[current].scrollIntoView({
                behavior: 'smooth',
                block: 'nearest',
                inline: 'center'
            });
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
            // Redraw TPR charts when their form becomes visible
            if (current === 6) setTimeout(() => ['respi', 'pulse', 'temp'].forEach(k => drawTPRChart(k)), 50);
        }

        function navigate(dir) {
            const next = current + dir;
            if (next < 0 || next >= TOTAL) return;
            if (next === TOTAL) {
                alert('All forms completed! Ready to submit. ✓');
                return;
            }
            goTo(next);
        }

        function updateDots() {
            const el = document.getElementById('progress-dots');
            el.innerHTML = '';
            for (let i = 0; i < TOTAL; i++) {
                const d = document.createElement('div');
                d.className = `rounded-full cursor-pointer transition-all ${i===current?'w-5 h-2 bg-indigo-600':'w-2 h-2 '+(i<current?'bg-indigo-300':'bg-gray-300')}`;
                d.onclick = () => goTo(i);
                el.appendChild(d);
            }
        }

        // ─── MAR Table ────────────────────────────────────────
        const MAR_MEDS = ['VIT K 1MG IM', 'ERYTHROMYCIN EYE OINTMENT TO OU', 'HEP B 0.5ML IM', 'BCG 0.05 CC ID', ''];

        function buildMAR() {
            const tb = document.getElementById('mar-body');
            MAR_MEDS.forEach(med => addMedRowWith(tb, med));
        }

        function addMedRowWith(tb, medName) {
            ['7-3', '3-11', '11-7'].forEach((sh, si) => {
                const tr = document.createElement('tr');
                if (si === 0) tr.style.borderTop = '2px solid #e5e7eb';
                tr.className = si % 2 === 0 ? 'bg-white' : 'bg-gray-50/30';
                if (si === 0) {
                    const td = document.createElement('td');
                    td.rowSpan = 3;
                    td.className = 'border border-gray-200 px-2 py-2 align-middle font-semibold text-xs text-gray-700 bg-gray-50 border-r-2 border-r-gray-300';
                    td.innerHTML = `<input type="text" class="mar-input text-left font-semibold" placeholder="Medication name" value="${medName}" style="text-align:left;font-weight:600;">`;
                    tr.appendChild(td);
                }
                const ts = document.createElement('td');
                ts.className = `border border-gray-200 text-center text-xs font-semibold px-2 py-1 ${sh==='7-3'?'bg-blue-50 text-blue-700':sh==='3-11'?'bg-purple-50 text-purple-700':'bg-teal-50 text-teal-700'}`;
                ts.textContent = sh;
                tr.appendChild(ts);
                for (let d = 0; d < 10; d++) {
                    const td = document.createElement('td');
                    td.className = 'border border-gray-200 p-0.5';
                    td.innerHTML = `<input class="mar-input" type="text">`;
                    tr.appendChild(td);
                }
                tb.appendChild(tr);
            });
        }

        function addMedRow() {
            addMedRowWith(document.getElementById('mar-body'), '');
        }

        // ─── Nurse Notes ─────────────────────────────────────
        function addNurseNoteRow() {
            const row = document.createElement('div');
            row.className = 'grid grid-cols-8 gap-2 items-start border border-gray-100 rounded-lg p-3 bg-gray-50';
            row.innerHTML = `<div class="col-span-1 space-y-2"><div><label class="section-title block">Date</label><input type="date" class="field-line text-xs"></div><div><label class="section-title block">Shift</label><select class="field-line text-xs bg-transparent"><option>7-3</option><option>3-11</option><option>11-7</option></select></div></div><div class="col-span-6"><label class="section-title block">Notes</label><textarea class="form-textarea" rows="4" placeholder="Nursing notes…"></textarea></div><div class="col-span-1"><label class="section-title block">Signature</label><input type="text" class="field-line text-xs" placeholder="Sign"></div>`;
            document.getElementById('nurse-notes-rows').appendChild(row);
        }

        // ─── TPR ─────────────────────────────────────────────
        // ─── TPR: separate tables + live charts ──────────────
        // ─── TPR: separate tables + live charts ──────────────
        const tprConfig = {
            respi: {
                label: 'Respiration',
                unit: 'bpm',
                color: '#3b82f6',
                bg: 'rgba(59,130,246,0.1)',
                min: 0,
                max: 60,
                normal: [12, 20],
                step: 10
            },
            pulse: {
                label: 'Pulse Rate',
                unit: 'bpm',
                color: '#ef4444',
                bg: 'rgba(239,68,68,0.1)',
                min: 30,
                max: 200,
                normal: [60, 100],
                step: 20
            },
            temp: {
                label: 'Temperature',
                unit: '°C',
                color: '#f59e0b',
                bg: 'rgba(245,158,11,0.1)',
                min: 34,
                max: 42,
                normal: [36.5, 37.5],
                step: 1
            },
        };

        function drawTPRChart(key) {
            const cfg = tprConfig[key];
            const canvas = document.getElementById(key + '-chart');
            if (!canvas) return;
            const ctx = canvas.getContext('2d');
            const W = canvas.offsetWidth || 600;
            const H = 200;
            canvas.width = W * window.devicePixelRatio;
            canvas.height = H * window.devicePixelRatio;
            canvas.style.width = W + 'px';
            canvas.style.height = H + 'px';
            ctx.scale(window.devicePixelRatio, window.devicePixelRatio);

            const PAD = {
                top: 16,
                right: 20,
                bottom: 36,
                left: 48
            };
            const cW = W - PAD.left - PAD.right;
            const cH = H - PAD.top - PAD.bottom;
            const range = cfg.max - cfg.min;

            // collect data
            const tbody = document.getElementById(key + '-body');
            const points = [];
            Array.from(tbody.rows).forEach(row => {
                const dateEl = row.querySelector('input[type=date]');
                const valEl = row.querySelector('.tpr-value-input');
                if (!dateEl || !valEl) return;
                const d = dateEl.value;
                const v = parseFloat(valEl.value);
                if (d && !isNaN(v)) {
                    const parts = d.split('-');
                    points.push({
                        label: parts[1] + '/' + parts[2],
                        value: v
                    });
                }
            });

            // clear
            ctx.clearRect(0, 0, W, H);

            // background
            ctx.fillStyle = '#f9fafb';
            ctx.fillRect(PAD.left, PAD.top, cW, cH);

            // grid lines + Y labels
            ctx.strokeStyle = '#e5e7eb';
            ctx.lineWidth = 1;
            ctx.fillStyle = '#9ca3af';
            ctx.font = '10px Plus Jakarta Sans, sans-serif';
            ctx.textAlign = 'right';
            for (let v = cfg.min; v <= cfg.max; v += cfg.step) {
                const y = PAD.top + cH - ((v - cfg.min) / range) * cH;
                ctx.beginPath();
                ctx.moveTo(PAD.left, y);
                ctx.lineTo(PAD.left + cW, y);
                ctx.stroke();
                ctx.fillText(v, PAD.left - 5, y + 3);
            }

            // axes
            ctx.strokeStyle = '#d1d5db';
            ctx.lineWidth = 1.5;
            ctx.beginPath();
            ctx.moveTo(PAD.left, PAD.top);
            ctx.lineTo(PAD.left, PAD.top + cH);
            ctx.moveTo(PAD.left, PAD.top + cH);
            ctx.lineTo(PAD.left + cW, PAD.top + cH);
            ctx.stroke();

            if (points.length === 0) {
                ctx.fillStyle = '#d1d5db';
                ctx.font = '12px Plus Jakarta Sans, sans-serif';
                ctx.textAlign = 'center';
                ctx.fillText('Enter date + value above to plot the graph', PAD.left + cW / 2, PAD.top + cH / 2);
                return;
            }

            // X labels
            ctx.fillStyle = '#6b7280';
            ctx.font = '10px Plus Jakarta Sans, sans-serif';
            ctx.textAlign = 'center';
            const xStep = points.length > 1 ? cW / (points.length - 1) : cW;
            points.forEach((pt, i) => {
                const x = PAD.left + (points.length > 1 ? i * xStep : cW / 2);
                ctx.fillText(pt.label, x, PAD.top + cH + 14);
            });

            // filled area
            if (points.length > 1) {
                ctx.beginPath();
                points.forEach((pt, i) => {
                    const x = PAD.left + i * xStep;
                    const y = PAD.top + cH - ((Math.min(Math.max(pt.value, cfg.min), cfg.max) - cfg.min) / range) * cH;
                    i === 0 ? ctx.moveTo(x, y) : ctx.lineTo(x, y);
                });
                ctx.lineTo(PAD.left + (points.length - 1) * xStep, PAD.top + cH);
                ctx.lineTo(PAD.left, PAD.top + cH);
                ctx.closePath();
                ctx.fillStyle = cfg.bg;
                ctx.fill();
            }

            // line
            ctx.beginPath();
            ctx.strokeStyle = cfg.color;
            ctx.lineWidth = 2.5;
            ctx.lineJoin = 'round';
            points.forEach((pt, i) => {
                const x = PAD.left + (points.length > 1 ? i * xStep : cW / 2);
                const y = PAD.top + cH - ((Math.min(Math.max(pt.value, cfg.min), cfg.max) - cfg.min) / range) * cH;
                i === 0 ? ctx.moveTo(x, y) : ctx.lineTo(x, y);
            });
            ctx.stroke();

            // dots + value labels
            points.forEach((pt, i) => {
                const x = PAD.left + (points.length > 1 ? i * xStep : cW / 2);
                const y = PAD.top + cH - ((Math.min(Math.max(pt.value, cfg.min), cfg.max) - cfg.min) / range) * cH;
                // dot
                ctx.beginPath();
                ctx.arc(x, y, 5, 0, Math.PI * 2);
                ctx.fillStyle = '#fff';
                ctx.fill();
                ctx.strokeStyle = cfg.color;
                ctx.lineWidth = 2.5;
                ctx.stroke();
                // value label
                ctx.fillStyle = cfg.color;
                ctx.font = 'bold 10px Plus Jakarta Sans, sans-serif';
                ctx.textAlign = 'center';
                ctx.fillText(pt.value + (key === 'temp' ? '°' : ''), x, y - 9);
            });
        }

        function addTPRRow(key) {
            const tbody = document.getElementById(key + '-body');
            const rowIdx = tbody.rows.length;
            const tr = document.createElement('tr');
            tr.className = rowIdx % 2 === 0 ? 'bg-white' : 'bg-gray-50/40';
            tr.innerHTML = `
    <td class="border border-gray-200 p-1"><input type="date" class="w-full text-xs px-2 py-1.5 border border-gray-200 rounded focus:outline-none focus:border-indigo-400" onchange="drawTPRChart('${key}')"></td>
    <td class="border border-gray-200 p-1"><input type="time" class="w-full text-xs px-2 py-1.5 border border-gray-200 rounded focus:outline-none focus:border-indigo-400 font-mono"></td>
    <td class="border border-gray-200 p-1"><input type="number" step="0.1" class="tpr-value-input w-full text-xs px-2 py-1.5 border border-gray-200 rounded focus:outline-none focus:border-indigo-400 font-mono font-bold" placeholder="${key==='temp'?'36.5':'—'}" oninput="drawTPRChart('${key}')"></td>
    <td class="border border-gray-200 p-1"><input type="text" class="w-full text-xs px-2 py-1.5 border-0 focus:outline-none focus:bg-gray-50 rounded" placeholder="Notes"></td>
    <td class="border border-gray-200 p-1 text-center"><button onclick="deleteTPRRow(this,'${key}')" class="text-red-400 hover:text-red-600 text-sm font-bold leading-none">✕</button></td>
  `;
            tbody.appendChild(tr);
            drawTPRChart(key);
        }

        function deleteTPRRow(btn, key) {
            btn.closest('tr').remove();
            drawTPRChart(key);
        }

        function addOutputRow(type) {
            const tb = document.getElementById(type + '-body');
            const tr = document.createElement('tr');
            tr.className = tb.rows.length % 2 === 0 ? 'bg-white' : 'bg-gray-50/40';
            tr.innerHTML = `<td class="border border-gray-200 p-1"><input type="date" class="w-full text-xs border-0 focus:outline-none px-1"></td><td class="border border-gray-200 p-1"><input type="time" class="w-full text-xs border-0 focus:outline-none px-1 font-mono"></td><td class="border border-gray-200 p-1"><input type="text" class="w-full text-xs border-0 focus:outline-none px-1 font-mono" placeholder="amount/char"></td>`;
            tb.appendChild(tr);
        }

        // Redraw on window resize
        window.addEventListener('resize', () => {
            ['respi', 'pulse', 'temp'].forEach(k => drawTPRChart(k));
        });

        // ─── Breastfeeding ────────────────────────────────────
        const bfGood = {
            'General — Mother': ['Mother looks healthy', 'Mother relaxed and comfortable', 'Signs of bonding between mother and baby'],
            'General — Baby': ['Baby looks healthy', 'Baby calm and relaxed', 'Baby reaches or roots for breast if hungry'],
            'Breast': ['Breast looks healthy', 'No pain or discomfort', 'Breast well supported with fingers away from nipple'],
            "Baby's Position": ["Baby's head and body in line", "Baby held close to mother's body", "Baby's whole body supported", "Baby approaches breast, nose to nipple"],
            "Baby's Attachment": ['More areola seen above baby\'s top lip', 'Baby\'s mouth open wide', 'Lower lip turned outwards', 'Baby\'s chin touches breast'],
            'Suckling': ['Slow, deep sucks with pauses', 'Cheeks round when suckling', 'Baby releases breast when finished', 'Mother notices signs of oxytocin reflex'],
        };
        const bfDiff = {
            'Mother': ['Mother looks ill or depressed', 'Mother looks tense and uncomfortable', 'No mother / baby eye contact'],
            'Baby': ['Baby looks sleepy or ill', 'Baby is restless or crying', 'Baby does not reach or root'],
            'Breast': ['Breasts look red, swollen, or sore', 'Breast or nipple painful', 'Breast held with fingers on areola'],
            "Baby's Position": ["Baby's neck and head twisted to feed", "Baby not held close", "Baby supported by head and neck only", "Baby approaches breast, lower lip / chin to nipple"],
            "Baby's Attachment": ['More areola seen below bottom lip', 'Baby\'s mouth not open wide', 'Lips pointing forward or turned in', 'Baby\'s chin not touching breast'],
            'Suckling': ['Rapid shallow sucks', 'Cheeks pulled in when suckling', 'Mother takes baby off the breast', 'No signs of oxytocin reflex method'],
        };

        function buildBF() {
            ['bf-good', 'bf-diff'].forEach((id, isDiff) => {
                const container = document.getElementById(id);
                const data = isDiff ? bfDiff : bfGood;
                Object.entries(data).forEach(([section, items]) => {
                    const div = document.createElement('div');
                    div.innerHTML = `<div class="text-xs font-bold text-gray-600 mb-1.5 mt-3 italic">${section}</div>`;
                    items.forEach(item => {
                        const label = document.createElement('label');
                        label.className = 'cb-item text-xs';
                        label.innerHTML = `<input type="checkbox" style="accent-color:${isDiff?'#ef4444':'#22c55e'}"> ${item}`;
                        div.appendChild(label);
                    });
                    container.appendChild(div);
                });
            });
        }

        // ─── Growth Charts SVG ───────────────────────────────
        function drawChart(id, label, yMin, yMax, yStep, curves) {
            const svg = document.getElementById(id);
            if (!svg) return;
            const W = 700,
                H = 280,
                padL = 50,
                padR = 30,
                padT = 20,
                padB = 30;
            const cW = W - padL - padR,
                cH = H - padT - padB;
            const months = 24;
            const xS = cW / months;
            const yRange = yMax - yMin;
            const yS = cH / yRange;
            let html = `<rect x="${padL}" y="${padT}" width="${cW}" height="${cH}" fill="#f9fafb" rx="2"/>`;
            // grid
            for (let m = 0; m <= months; m += 2) {
                const x = padL + m * xS;
                html += `<line x1="${x}" y1="${padT}" x2="${x}" y2="${padT+cH}" stroke="#e5e7eb" stroke-width="0.5"/>`;
            }
            for (let y = yMin; y <= yMax; y += yStep) {
                const yy = padT + cH - (y - yMin) * yS;
                html += `<line x1="${padL}" y1="${yy}" x2="${padL+cW}" y2="${yy}" stroke="#e5e7eb" stroke-width="0.5"/><text x="${padL-4}" y="${yy+3}" text-anchor="end" font-size="9" fill="#9ca3af">${y}</text>`;
            }
            // axis labels
            for (let m = 0; m <= months; m += 3) {
                const x = padL + m * xS;
                html += `<text x="${x}" y="${padT+cH+12}" text-anchor="middle" font-size="9" fill="#9ca3af">${m}</text>`;
            }
            html += `<text x="${padL+cW/2}" y="${H-2}" text-anchor="middle" font-size="9" fill="#6b7280">Age (completed months)</text>`;
            html += `<text x="${padL-35}" y="${padT+cH/2}" text-anchor="middle" font-size="9" fill="#6b7280" transform="rotate(-90,${padL-35},${padT+cH/2})">${label}</text>`;
            // curves
            const colors = ['#22c55e', '#84cc16', '#94a3b8', '#f59e0b', '#ef4444'];
            const zLabels = ['+3', '+2', '0', '-2', '-3'];
            curves.forEach((pts, ci) => {
                const d = pts.map((v, m) => `${m===0?'M':'L'}${padL+m*xS},${padT+cH-(v-yMin)*yS}`).join(' ');
                html += `<path d="${d}" fill="none" stroke="${colors[ci]}" stroke-width="${ci===2?2:1.5}" stroke-dasharray="${ci===2?'':''}"/>`;
                html += `<text x="${padL+cW+4}" y="${padT+cH-(pts[months]-yMin)*yS+3}" font-size="9" fill="${colors[ci]}" font-weight="bold">${zLabels[ci]}</text>`;
            });
            svg.innerHTML = html;
        }

        // ─── Newborn Maturity Tables ──────────────────────────
        function buildMaturity() {
            const neuroSigns = [
                ['Posture', 'flexed', '—', 'slight flex', '—', 'full flex', '—'],
                ['Square Window (wrist)', '90°', '60°', '45°', '30°', '0°', '—'],
                ['Arm Recoil', '180°', '140-180°', '110-140°', '90-110°', '<90°', '—'],
                ['Popliteal Angle', '160°', '140°', '120°', '100°', '90°', '<90°'],
                ['Scarf Sign', '—', '—', '—', '—', '—', '—'],
                ['Heel to Ear', '—', '—', '—', '—', '—', '—'],
            ];
            const physSigns = [
                ['Skin', 'gelatinous/red/translucent', 'smooth pink visible veins', 'superficial peeling &/or rash few veins', 'cracking pale areas rare veins', 'parchment deep cracking no vessels', 'leathery cracked wrinkled'],
                ['Lanugo', 'sparse', 'abundant', 'thinning', 'bald areas', 'mostly bald', '—'],
                ['Plantar Surface', '>50mm no crease', 'faint red marks', 'anterior transverse crease only', 'creases ant. 2/3', 'creases over entire sole', '—'],
                ['Breast', 'barely perceptible', 'flat areola no bud', 'stippled areola 1-2mm bud', 'raised areola 3-4mm bud', 'full areola 5-10mm bud', '—'],
                ['Eye/Ear', 'lids open; pinna flat; stays folded', 'sl. curved pinna; soft; slow recoil', 'well-curved pinna; soft but ready recoil', 'formed & firm; instant recoil', 'thick cartilage; ear stiff', '—'],
                ['Genitals M', 'scrotum empty; faint rugae', 'testes in upper canal; rare rugae', 'testes descending; few rugae', 'testes down; good rugae', 'testes pendulous; deep rugae', '—'],
                ['Genitals F', 'prominent clitoris; small labia minora', 'prominent clitoris; labia minora enlarging', 'majora & minora equally prominent', 'majora large; minora small', 'majora cover clitoris & minora', '—'],
            ];

            function buildTable(tbId, signs) {
                const tb = document.getElementById(tbId);
                signs.forEach(([sign, ...vals]) => {
                    const tr = document.createElement('tr');
                    tr.className = 'hover:bg-gray-50';
                    const td0 = document.createElement('td');
                    td0.className = 'border border-gray-200 px-3 py-2 font-semibold text-gray-700';
                    td0.textContent = sign;
                    tr.appendChild(td0);
                    vals.forEach(v => {
                        const td = document.createElement('td');
                        td.className = 'border border-gray-200 px-2 py-2 text-center text-gray-500';
                        td.textContent = v;
                        tr.appendChild(td);
                    });
                    const tds = document.createElement('td');
                    tds.className = 'border border-gray-200 p-1 bg-indigo-50';
                    tds.innerHTML = `<input type="number" min="0" max="5" class="w-full text-center text-xs border-none bg-transparent outline-none focus:bg-white font-bold text-indigo-700" placeholder="—">`;
                    tr.appendChild(tds);
                    tb.appendChild(tr);
                });
            }
            buildTable('neuro-body', neuroSigns);
            buildTable('phys-body', physSigns);
        }

        // ─── Doctor's Orders ──────────────────────────────────
        const defaultOrders = [
            'Admit to NICU', 'Secure consent', 'Thorough drying with warm and dry cloth',
            'Place on uninterrupted skin-to-skin contact with mother in prone position & cover with warm blanket & bonnet',
            'Clamp umbilical cord when pulsation stops',
            'Do not separate the mother and the baby until after the first breastfeeding',
            'Room-in with the mother unless contraindicated', 'EXCLUSIVE BREASTFEEDING', 'Check breastfeeding status',
            'After completion of the first breastfeeding, perform the Routine Newborn Care and administer:',
            '> Erythromycin eye ointment OU', '>Vit K 1mg IM @ left vastus lateralis',
            '>Hepatitis B vaccine 0.5ml deep IM @ right vastus lateralis',
            '>BCG vaccine intradermal on right deltoid', 'Thermoregulate at 36.5-37.5°C',
            'Bathe after 24 hours', 'For newborn screening after 24 hours', 'For hearing screening after 24 hours',
            'Monitor for respiratory distress (poor suck & activity)', 'Monitor vital signs', 'Refer accordingly',
        ];

        function buildOrders() {
            const tb = document.getElementById('order-body');
            defaultOrders.forEach((order, i) => {
                const tr = document.createElement('tr');
                tr.className = i % 2 === 0 ? 'bg-white' : 'bg-gray-50/30';
                tr.innerHTML = `<td class="border border-gray-200 p-1"><input type="datetime-local" class="mar-input text-xs"></td><td class="border border-gray-200 px-3 py-2 text-xs text-gray-700">${order}</td><td class="border border-gray-200 p-1 text-center"><select class="mar-input text-center"><option value="">—</option><option>C</option><option>A</option><option>R</option><option>E</option><option>D</option></select></td><td class="border border-gray-200 p-1"><input class="mar-input" type="text" placeholder="Sign"></td>`;
                tb.appendChild(tr);
            });
        }

        function addOrderRow() {
            const tb = document.getElementById('order-body');
            const tr = document.createElement('tr');
            tr.innerHTML = `<td class="border border-gray-200 p-1"><input type="datetime-local" class="mar-input text-xs"></td><td class="border border-gray-200 p-1"><input class="mar-input text-left" type="text" placeholder="Doctor's order…" style="text-align:left"></td><td class="border border-gray-200 p-1 text-center"><select class="mar-input text-center"><option value="">—</option><option>C</option><option>A</option><option>R</option><option>E</option><option>D</option></select></td><td class="border border-gray-200 p-1"><input class="mar-input" type="text" placeholder="Sign"></td>`;
            tb.appendChild(tr);
        }

        // ─── Maturity Rating Table ────────────────────────────
        function buildMaturityRatingTable() {
            const tb = document.getElementById('maturity-rating-body');
            [
                [10, 28],
                [15, 30],
                [20, 32],
                [25, 34],
                [30, 36],
                [35, 38],
                [40, 40],
                [45, 42],
                [50, 44]
            ].forEach(([s, w]) => {
                const tr = document.createElement('tr');
                tr.innerHTML = `<td class="border border-gray-200 px-4 py-1.5 text-center font-mono">${s}</td><td class="border border-gray-200 px-4 py-1.5 text-center font-mono">${w}</td>`;
                tb.appendChild(tr);
            });
        }


        buildMAR();
        ['respi', 'pulse', 'temp'].forEach(k => addTPRRow(k));
        buildBF();
        buildMaturity();
        buildOrders();
        buildMaturityRatingTable();
        updateDots();

        // WHO weight-for-age Girls approximated z-score curves (0-24m)
        const wCurves = [
            [4.3, 5.1, 5.8, 6.4, 6.9, 7.3, 8.4, 9.3, 10.2, 11.1, 11.8, 12.5, 13.1, 13.7, 14.2, 14.7, 15.2, 15.6, 16, 16.4, 16.8, 17.2, 17.5, 17.9], // +3
            [3.7, 4.4, 5.1, 5.7, 6.2, 6.7, 7.6, 8.5, 9.3, 10.1, 10.8, 11.5, 12.1, 12.6, 13.1, 13.6, 14.1, 14.5, 14.9, 15.3, 15.7, 16.1, 16.4, 16.8], // +2
            [2.9, 3.4, 3.9, 4.4, 4.9, 5.4, 6.1, 6.8, 7.5, 8.2, 8.8, 9.4, 9.9, 10.4, 10.9, 11.4, 11.8, 12.2, 12.6, 13, 13.4, 13.8, 14.1, 14.5], // 0
            [2.3, 2.7, 3.2, 3.6, 4, 4.4, 5, 5.6, 6.2, 6.8, 7.4, 7.9, 8.4, 8.9, 9.3, 9.7, 10.1, 10.5, 10.9, 11.3, 11.6, 12, 12.3, 12.6], // -2
            [2, 2.4, 2.8, 3.1, 3.5, 3.9, 4.4, 5, 5.6, 6.1, 6.6, 7.1, 7.5, 8, 8.4, 8.8, 9.1, 9.5, 9.8, 10.2, 10.5, 10.8, 11.1, 11.4], // -3
        ];
        const lCurves = [
            [53.2, 57.4, 61.1, 64.4, 67.3, 70, 73.7, 76.9, 80.2, 83.1, 85.9, 88.5, 91, 93.4, 95.7, 97.9, 100.1, 102.2, 104.3, 106.4, 108.4, 110.4, 112.4, 114.4],
            [51.1, 55.3, 59, 62.2, 65.2, 68, 71.6, 74.8, 78, 80.9, 83.7, 86.3, 88.8, 91.2, 93.5, 95.6, 97.7, 99.9, 101.9, 103.9, 105.9, 107.8, 109.8, 111.7],
            [47.3, 51.7, 55.6, 59.1, 62.1, 65, 68.7, 71.9, 75.1, 78, 80.8, 83.4, 86, 88.4, 90.7, 92.9, 95, 97.1, 99.2, 101.2, 103.2, 105.1, 107, 108.9],
            [43.6, 47.9, 51.8, 55.3, 58.4, 61.4, 65, 68.2, 71.4, 74.4, 77.2, 79.8, 82.3, 84.7, 87, 89.1, 91.2, 93.3, 95.3, 97.3, 99.2, 101.1, 103, 104.8],
            [41.7, 46, 50, 53.5, 56.6, 59.6, 63.3, 66.5, 69.8, 72.7, 75.6, 78.3, 80.8, 83.2, 85.5, 87.6, 89.7, 91.8, 93.8, 95.8, 97.7, 99.6, 101.5, 103.3],
        ];
        drawChart('weight-chart', 'Weight (kg)', 0, 18, 2, wCurves);
        drawChart('length-chart', 'Length (cm)', 40, 120, 10, lCurves);
    </script>
</body>

</html>