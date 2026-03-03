<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>LUMC PEWS Digital Flowsheet</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
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

            .shadow-xl {
                shadow: none;
                border: 1px solid #000;
            }

            .sticky-col {
                position: static;
                background: white !important;
            }
        }

        .sticky-col {
            position: sticky;
            left: 0;
            background-color: #f8fafc;
            z-index: 10;
            border-right: 2px solid #cbd5e1 !important;
        }

        input[type="time"].time-header::-webkit-calendar-picker-indicator {
            filter: invert(85%);
        }

        /* Ensure consistent table grid lines for the PEWS table */
        #pewsTable {
            border-collapse: collapse;
        }

        #pewsTable th,
        #pewsTable td {
            border: 1px solid rgba(203, 213, 225, 1);
        }

        input[type="number"]::-webkit-inner-spin-button {
            -webkit-appearance: none;
        }

        .param-label {
            @apply text-[10px] leading-tight text-slate-500 font-medium block mt-1;
        }
    </style>
</head>

<body class="bg-slate-200 p-4 md:p-6 font-sans">

    <div class="max-w-[1400px] mx-auto">
        <div class="flex justify-between items-center mb-4 no-print">
            <div>
                <h1 class="text-xl font-black text-slate-800 tracking-tight">PEDIATRIC EARLY WARNING SCORE FORM CLINICAL
                    DETERIORATION (PEWS)</h1>
                <p class="text-xs text-slate-600 font-bold uppercase tracking-wider">La Union Medical Center</p>
            </div>
            <div class="flex gap-2">
                <button id="clearAllBtn"
                    class="bg-slate-200 hover:bg-slate-300 text-slate-800 px-4 py-2 rounded-lg font-bold text-sm transition shadow">
                    Clear All
                </button>
                <button onclick="window.print()"
                    class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-lg font-bold text-sm transition shadow-lg">
                    Print / Export PDF
                </button>
            </div>
        </div>

        <div class="mb-4 bg-white rounded-xl shadow-sm border border-slate-200 p-4">
            <div class="grid grid-cols-2 md:grid-cols-6 gap-3">
                <div>
                    <label class="text-[10px] ml-2 font-bold text-slate-600">Last name</label>
                    <input id="patient-last" type="text" class="w-full mt-1 p-2 border rounded text-sm"
                        placeholder="Last name">
                </div>
                <div>
                    <label class="text-[10px] ml-2 font-bold text-slate-600">Given name</label>
                    <input id="patient-given" type="text" class="w-full mt-1 p-2 border rounded text-sm"
                        placeholder="Given name">
                </div>
                <div>
                    <label class="text-[10px] ml-2 font-bold text-slate-600">Ward</label>
                    <input id="patient-ward" type="text" class="w-full mt-1 p-2 border rounded text-sm"
                        placeholder="Ward">
                </div>
                <div>
                    <label class="text-[10px] ml-2 font-bold text-slate-600">Age</label>
                    <input id="patient-age" type="text" class="w-full mt-1 p-2 border rounded text-sm"
                        placeholder="Age">
                </div>
                <div>
                    <label class="text-[10px] ml-2 font-bold text-slate-600">Sex</label>
                    <select id="patient-sex" class="w-full mt-1 p-2 border rounded text-sm">
                        <option value="">--</option>
                        <option>Male</option>
                        <option>Female</option>
                        <option>Other</option>
                    </select>
                </div>
                <div>
                    <label class="text-[10px] ml-2 font-bold text-slate-600">Hospital #</label>
                    <input id="patient-hn" type="text" class="w-full mt-1 p-2 border rounded text-sm"
                        placeholder="Hospital number">
                </div>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow-xl border border-slate-300 overflow-hidden">
            <div class="overflow-x-auto">
                <table id="pewsTable" class="w-full border-collapse text-xs">
                    <thead>
                        <tr class="bg-slate-800 text-white divide-x divide-slate-700">
                            <th class="p-4 text-left w-72 uppercase font-black tracking-widest bg-slate-900">Parameters
                            </th>
                            @for ($i = 1; $i <= 12; $i++)
                                <th class="p-2 min-w-[90px]">
                                    <input type="text" placeholder="Date"
                                        class="w-full bg-transparent border-none text-center text-[9px] mb-1 focus:ring-0 placeholder-slate-400">
                                    <input type="time" class="time-header w-full bg-transparent border-none text-center text-[9px] font-bold
                                                   text-indigo-100 focus:ring-0">
                                </th>
                            @endfor
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-slate-200">
                        <tr class="param-row bg-white">
                            <td class="sticky-col p-3 font-bold text-slate-500 text-[10px]">DOCTOR IN CHARGE</td>
                            @for ($i = 0; $i < 12; $i++)
                                <td class="p-2 border-l border-slate-100 text-center">
                                    <input id="doctor-{{ $i }}" type="text" placeholder=" "
                                        class="doctor-input w-full text-center text-sm font-bold bg-transparent focus:ring-0 outline-none"
                                        autocomplete="off">
                                </td>
                            @endfor
                        </tr>
                        <tr class="param-row group hover:bg-slate-50">
                            <td class="sticky-col p-3">
                                <span class="font-black text-slate-700 block text-[11px]">BEHAVIOR</span>
                                <span class="param-label text-slate-700">0: Playful <br> 1: Sleeping <br> 2: Irritable
                                    <br> 3: Lethargic/Confused or reduced response to pain</span>
                            </td>

                            @for ($i = 0; $i < 12; $i++)
                                <td class="p-2 border-l border-slate-100"><input type="number" min="0" max="3" data-max="3"
                                        class="pews-input w-full text-center text-lg font-bold bg-transparent focus:ring-0 outline-none"
                                        placeholder="·" autocomplete="off"></td>
                            @endfor
                        </tr>

                        <tr class="param-row group hover:bg-slate-50">
                            <td class="sticky-col p-3">
                                <span class="font-black text-slate-700 block text-[11px]">CARDIOVASCULAR</span>
                                <span class="param-label">0: Pink/CRT 1-2s <br> 1: Pale/CRT 3s <br> 2: Gray/CRT 4s/HR+20
                                    <br> 3:
                                    Mottled/CRT 5s/Bradycardia</span>
                            </td>
                            @for ($i = 0; $i < 12; $i++)
                                <td class="p-2 border-l border-slate-100"><input type="number" min="0" max="3" data-max="3"
                                        class="pews-input w-full text-center text-lg font-bold bg-transparent focus:ring-0 outline-none"
                                        placeholder="·" autocomplete="off"></td>
                            @endfor
                        </tr>

                        <tr class="param-row group hover:bg-slate-50">
                            <td class="sticky-col p-3 border-b-2 border-slate-300">
                                <span class="font-black text-slate-700 block text-[11px]">RESPIRATORY</span>
                                <span class="param-label">0: Normal <br> 1: RR+10/30% FiO2 <br> 2: RR+20/Retractions/40%
                                    FiO2
                                    <br> 3: Distress/Grunting/50% FiO2</span>
                            </td>
                            @for ($i = 0; $i < 12; $i++)
                                <td class="p-2 border-l border-slate-100 border-b-2 border-slate-300"><input type="number"
                                        min="0" max="3" data-max="3"
                                        class="pews-input w-full text-center text-lg font-bold bg-transparent focus:ring-0 outline-none"
                                        placeholder="·" autocomplete="off"></td>
                            @endfor
                        </tr>

                        <tr class="param-row bg-slate-50/50">
                            <td class="sticky-col p-3 text-[10px] uppercase font-bold text-slate-600 italic">
                                Nebulization every 15 minutes? <br> (Yes=2, No=0)
                            </td>
                            @for ($i = 0; $i < 12; $i++)
                                <td class="p-2 border-l border-slate-100">
                                    <input type="number" inputmode="numeric" data-binary="02"
                                        class="pews-input w-full text-center font-bold bg-transparent focus:ring-0 outline-none"
                                        placeholder="0" autocomplete="off">
                                </td>
                            @endfor
                        </tr>

                        <tr class="param-row bg-slate-50/50">
                            <td
                                class="sticky-col p-3 text-[10px] font-bold uppercase text-slate-600 italic border-b-2 border-slate-400">
                                Persistent Vomiting Following Surgery <br> (Yes=1, No=0)</td>
                            @for ($i = 0; $i < 12; $i++)
                                <td class="p-2 border-l border-slate-100 border-b-2 border-slate-400"><input type="number"
                                        min="0" max="1" data-max="1"
                                        class="pews-input w-full text-center font-bold bg-transparent focus:ring-0 outline-none"
                                        placeholder="0" autocomplete="off"></td>
                            @endfor
                        </tr>

                        <tr class="bg-slate-100 font-black">
                            <td class="sticky-col p-4 bg-slate-200 text-slate-800">TOTAL SCORE</td>
                            @for ($i = 0; $i < 12; $i++)
                                <td id="total-{{ $i }}"
                                    class="total-cell p-4 border-l border-slate-300 text-center text-lg transition-all duration-300">
                                    0</td>
                            @endfor
                        </tr>

                        <tr class="bg-white">
                            <td class="sticky-col p-3 font-bold text-slate-500 text-[10px]">RISK CATEGORY</td>
                            @for ($i = 0; $i < 12; $i++)
                                <td id="risk-{{ $i }}"
                                    class="p-2 border-l border-slate-100 text-center uppercase font-black text-[9px] text-slate-400 italic">
                                    --</td>
                            @endfor
                        </tr>

                        <tr class="bg-white">
                            <td class="sticky-col p-3 font-bold text-slate-500 text-[10px]">INITIALS</td>
                            @for ($i = 0; $i < 12; $i++)
                                <td id="initials-{{ $i }}"
                                    class="p-2 border-l border-slate-100 text-center uppercase font-black text-[9px] text-slate-400 italic">
                                    --
                                </td>
                            @endfor
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="mt-6 bg-white rounded-xl shadow-xl border border-slate-300 p-4 text-xs">
            <h3 class="font-black text-slate-700 mb-3 uppercase tracking-wider">
                PEWS Risk Category Guide
            </h3>

            <table class="w-full border-collapse">
                <thead>
                    <tr class="bg-slate-800 text-white text-md uppercase font-bold tracking-wide">
                        <th class="p-2 text-left">Total Score</th>
                        <th class="p-2 text-left">Risk Category</th>
                        <th class="p-2 text-left">Clinical Meaning</th>
                        <th class="p-2 text-left">Required Action</th>
                        <th class="p-2 text-left">Initials</th>
                    </tr>
                </thead>
                <tbody class="divide-y text-md divide-slate-200">
                    <tr>
                        <td class="p-2 font-bold">0</td>
                        <td class="p-2">Stable</td>
                        <td class="p-2">No clinical deterioration</td>
                        <td class="p-2">Routine monitoring</td>
                        <td class="p-2 italic">—</td>
                    </tr>
                    <tr>
                        <td class="p-2 font-bold">1–2</td>
                        <td class="p-2 text-emerald-600 font-bold">Low Risk</td>
                        <td class="p-2">Mild changes noted</td>
                        <td class="p-2">Continue observation</td>
                        <td class="p-2 italic">—</td>
                    </tr>
                    <tr>
                        <td class="p-2 font-bold">3</td>
                        <td class="p-2 text-amber-600 font-bold">Moderate</td>
                        <td class="p-2">Early deterioration</td>
                        <td class="p-2">Inform charge nurse, increase monitoring</td>
                        <td class="p-2 font-bold">MN</td>
                    </tr>
                    <tr>
                        <td class="p-2 font-bold">4–5</td>
                        <td class="p-2 text-red-600 font-bold">High Risk</td>
                        <td class="p-2">Significant deterioration</td>
                        <td class="p-2">Notify physician immediately</td>
                        <td class="p-2 font-bold">PN</td>
                    </tr>
                    <tr>
                        <td class="p-2 font-bold">≥6</td>
                        <td class="p-2 text-red-700 font-bold underline">Critical</td>
                        <td class="p-2">Severe deterioration</td>
                        <td class="p-2">Activate Rapid Response / Code Team</td>
                        <td class="p-2 font-bold">RRT</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <script>
            // Enforce single-digit and per-row max constraints, update scores, and provide Clear All
            document.addEventListener('input', (e) => {
                if (e.target.classList.contains('pews-input')) {
                    enforceInputConstraints(e.target);
                    updateAllScores();
                }
            });

            document.getElementById('clearAllBtn')?.addEventListener('click', () => {
                document.querySelectorAll('.pews-input').forEach(i => i.value = '');
                updateAllScores();
            });

            function enforceInputConstraints(input) {

                // SPECIAL CASE: 0 or 2 only
                if (input.dataset.binary === "02") {
                    if (input.value === "") return;

                    let v = input.value.replace(/\D/g, '').slice(0, 1);

                    if (v !== "0" && v !== "2") {
                        input.value = "";
                        return;
                    }

                    input.value = v;
                    return;
                }

                // DEFAULT behavior (0–max)
                const max = parseInt(input.dataset.max);
                if (input.value === '') return;

                let v = input.value.replace(/\D/g, '').slice(0, 1);
                if (!v) { input.value = ''; return; }

                let n = parseInt(v, 10);
                if (!isNaN(max) && n > max) n = max;

                input.value = String(n);
            }

            function getInitials(name) {
                if (!name) return "--";
                // remove extra spaces and split by spaces or commas
                const parts = name.trim().replace(/\s+/g, ' ').split(/[, ]+/).filter(Boolean);
                // if multiple parts, take first letters of first two parts
                if (parts.length >= 2) {
                    return (parts[0][0] + parts[1][0]).toUpperCase();
                }
                // single token: sanitize and take first two letters
                const token = parts[0].replace(/[^A-Za-z]/g, '');
                if (token.length <= 2) return token.toUpperCase();
                return token.slice(0, 2).toUpperCase();
            }

            function updateAllScores() {
                const rows = document.querySelectorAll('.param-row');
                const numCols = 12;

                for (let col = 0; col < numCols; col++) {
                    let columnSum = 0;
                    let hasAny = false;
                    rows.forEach(row => {
                        const inputs = row.querySelectorAll('.pews-input');
                        const input = inputs[col];
                        if (!input) return;
                        const valStr = input.value.trim();
                        if (valStr !== '') {
                            hasAny = true;
                            columnSum += parseInt(valStr, 10) || 0;
                        }
                    });

                    const totalCell = document.getElementById(`total-${col}`);
                    const riskCell = document.getElementById(`risk-${col}`);

                    totalCell.textContent = columnSum;
                    if (!hasAny) {
                        totalCell.className = "total-cell p-4 border-l border-slate-300 text-center text-md transition-all duration-300 font-black text-slate-400";
                        riskCell.textContent = "--";
                        riskCell.className = "p-2 border-l border-slate-100 text-center uppercase font-black text-md text-slate-400 italic";
                    } else {
                        applyColorLogic(totalCell, riskCell, columnSum);

                        const initialsCell = document.getElementById(`initials-${col}`);
                        if (columnSum === 0) {
                            initialsCell.textContent = "--";
                            initialsCell.className = "p-2 border-l border-slate-100 text-center uppercase font-black text-slate-400 italic";
                        } else if (columnSum <= 2) {
                            initialsCell.textContent = "--";
                            initialsCell.className = "p-2 border-l border-slate-100 text-center uppercase font-black text-emerald-600";
                        } else if (columnSum === 3) {
                            initialsCell.textContent = "MN";
                            initialsCell.className = "p-2 border-l border-slate-100 text-center uppercase font-black text-amber-600";
                        } else if (columnSum <= 5) {
                            initialsCell.textContent = "PN";
                            initialsCell.className = "p-2 border-l border-slate-100 text-center uppercase font-black text-red-600";
                        } else {
                            initialsCell.textContent = "RRT";
                            initialsCell.className = "p-2 border-l border-slate-100 text-center uppercase font-black text-red-700 underline";
                        }
                    }
                }
            }

            function applyColorLogic(tCell, rCell, score) {
                tCell.className = "total-cell p-4 border-l border-slate-300 text-center text-xl transition-all duration-300 font-black ";
                if (score === 0) {
                    tCell.classList.add('text-slate-400');
                    rCell.textContent = "Stable";
                    rCell.className = "text-center uppercase font-black text-slate-400 italic";
                } else if (score <= 2) {
                    tCell.classList.add('bg-emerald-500', 'text-white');
                    rCell.textContent = "Low Risk";
                    rCell.className = "text-center uppercase font-black text-emerald-600";
                } else if (score === 3) {
                    tCell.classList.add('bg-amber-400', 'text-amber-950');
                    rCell.textContent = "Moderate";
                    rCell.className = "text-center uppercase font-black text-amber-600";
                } else {
                    tCell.classList.add('bg-red-600', 'text-white');
                    rCell.textContent = "CRITICAL";
                    rCell.className = "text-center uppercase font-black text-red-600 underline";
                }
            }



            document.querySelectorAll('.doctor-input').forEach(inp => {
                inp.addEventListener('input', () => updateAllScores());
            });

            // initial compute
            updateAllScores();

        </script>

</body>

</html>