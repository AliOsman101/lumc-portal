<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>LUMC | Morse Fall Scale</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        :root{
            --blue:#0b2e7a;
            --blue2:#1e40af;
            --blue3:#2563eb;
            --red:#dc2626;
            --muted:#64748b;
            --white:#ffffff;
            --yellow:#facc15;
            --line:#dbe3f0;
            --ink:#0f172a;
            --paper:#ffffff;
        }

        *{ box-sizing:border-box; }
        body{
            margin:0;
            background: linear-gradient(135deg, #0b2e7a 0%, #1e40af 50%, #2563eb 100%);
            font-family: ui-sans-serif, system-ui, -apple-system, Segoe UI, Roboto, Arial, sans-serif;
            color: var(--ink);
        }

        .topbar{
            background:#fff;
            box-shadow: 0 6px 20px rgba(0,0,0,.08);
        }
        .topbar .wrap{
            width: min(1200px, 92vw);
            margin:auto;
            height: 74px;
            display:flex;
            align-items:center;
            justify-content:space-between;
            gap:16px;
        }
        .brand{
            display:flex; align-items:center; gap:12px;
            font-weight:900; letter-spacing:.6px;
            color: var(--blue);
        }
        .brand img{ height:46px; width:46px; object-fit:contain; }
        .brand span{ font-size:16px; }

        .top-logos{
            display:flex; align-items:center; gap:10px;
        }
        .top-logos img{ height:42px; object-fit:contain; }

        .container{
            width: min(1200px, 92vw);
            margin: 26px auto 44px;
        }

        .regbar{
            background: rgba(255,255,255,.14);
            border: 1px solid rgba(255,255,255,.22);
            border-radius: 18px;
            padding: 14px 16px;
            color: rgba(255,255,255,.95);
            display:flex;
            align-items:center;
            justify-content:space-between;
            gap: 18px;
            backdrop-filter: blur(8px);
            -webkit-backdrop-filter: blur(8px);
        }
        .regbar-left{
            display:flex;
            flex-direction: column;
            gap: 6px;
            min-width: 280px;
        }
        .chip{
            display:inline-flex;
            align-items:center;
            padding: 6px 10px;
            border-radius: 999px;
            font-weight: 900;
            font-size: 11px;
            letter-spacing:.6px;
            background: rgba(255,255,255,.14);
            border: 1px solid rgba(255,255,255,.20);
        }
        .regbar-title{
            font-weight: 950;
            font-size: 14px;
            letter-spacing:.3px;
            color: rgba(255,255,255,.96);
        }
        .regbar-sub{
            font-size: 12px;
            color: rgba(255,255,255,.85);
            line-height: 1.4;
            max-width: 720px;
        }
        .regbar-logos{
            display:flex;
            align-items:center;
            gap: 12px;
        }
        .regbar-logos img{
            height: 38px;
            width: auto;
            object-fit: contain;
            filter: drop-shadow(0 10px 18px rgba(0,0,0,.18));
            opacity: .95;
        }

        .panel{
            margin-top: 16px;
            background: rgba(255,255,255,.96);
            border-radius: 24px;
            box-shadow: 0 28px 70px rgba(0,0,0,.22);
            padding: 22px 22px 18px;
            position: relative;
            overflow:hidden;
        }

        .panel-head{
            display:flex;
            justify-content:space-between;
            align-items:flex-end;
            gap: 16px;
            padding-bottom: 14px;
            border-bottom: 1px solid rgba(15,23,42,.06);
        }
        .panel-head h2{
            margin:0;
            font-size: 24px;
            font-weight: 950;
            color: var(--blue);
        }
        .panel-head p{
            margin:6px 0 0;
            color: var(--muted);
            font-size: 13px;
        }

        .badge{
            display:inline-flex;
            align-items:center;
            gap:8px;
            padding: 8px 12px;
            border-radius: 999px;
            background: rgba(220,38,38,.10);
            border: 1px solid rgba(220,38,38,.18);
            color: var(--red);
            font-weight: 900;
            font-size: 12px;
        }
        .dot{ width:8px;height:8px;border-radius:50%; background: var(--red); }

        .grid{
            margin-top: 14px;
            display:grid;
            grid-template-columns: 1.2fr 1fr 1fr 1fr;
            gap: 10px 14px;
        }
        .field label{
            display:block;
            font-size: 12px;
            font-weight: 900;
            color: var(--muted);
            margin-bottom: 6px;
        }
        .field input, .field select{
            width:100%;
            border:none;
            outline:none;
            padding: 10px 10px;
            border-radius: 12px;
            background: #f8fafc;
            border: 1px solid #e5e7eb;
            font-size: 14px;
        }
        .span-2{ grid-column: span 2; }
        .span-4{ grid-column: span 4; }

        .content{
            margin-top: 14px;
            display:grid;
            grid-template-columns: 1.6fr 1fr;
            gap: 14px;
            align-items:start;
        }

        .card{
            background: var(--paper);
            border-radius: 18px;
            border: 1px solid rgba(15,23,42,.08);
            overflow:hidden;
        }
        .card .card-title{
            padding: 12px 14px;
            font-weight: 950;
            color: var(--blue);
            border-bottom: 1px solid rgba(15,23,42,.08);
            background: #f8fafc;
            font-size: 13px;
            letter-spacing: .3px;
        }
        .card .card-body{ padding: 14px; }

        .table{
            width:100%;
            border-collapse: collapse;
            font-size: 13px;
        }
        .table th, .table td{
            border: 1px solid #e5e7eb;
            padding: 10px 10px;
            vertical-align: top;
        }
        .table th{
            background: #f8fafc;
            text-align:left;
            font-size: 12px;
            color: var(--muted);
            font-weight: 950;
        }
        .item-title{
            font-weight: 950;
            color: #0f172a;
            margin-bottom: 6px;
        }
        .opt{
            display:flex;
            gap:10px;
            flex-wrap:wrap;
            font-size: 12px;
            color:#0f172a;
        }
        .opt label{
            display:inline-flex;
            align-items:center;
            gap:6px;
            padding: 6px 8px;
            border-radius: 999px;
            border: 1px solid #e5e7eb;
            background: #fff;
            cursor:pointer;
            user-select:none;
        }
        .opt input{ accent-color: var(--red); }

        .dates{
            display:grid;
            grid-template-columns: repeat(6, 1fr);
            gap: 6px;
        }
        .dates input{
            width:100%;
            border:none;
            outline:none;
            padding: 8px 8px;
            border-radius: 10px;
            background: #f8fafc;
            border: 1px solid #e5e7eb;
            font-size: 12px;
        }

        .side-list{
            font-size: 12px;
            color:#0f172a;
            line-height: 1.6;
        }
        .side-list h4{
            margin: 0 0 8px;
            font-size: 13px;
            color: var(--blue);
            font-weight: 950;
        }
        .side-list .sec{
            margin-top: 12px;
            padding-top: 10px;
            border-top: 1px dashed #e5e7eb;
        }
        .side-list ol{
            margin: 8px 0 0 18px;
        }

        .summary{
            display:grid;
            grid-template-columns: 1fr 1fr;
            gap: 10px;
            margin-top: 12px;
        }
        .summary .box{
            border: 1px solid #e5e7eb;
            background:#fff;
            border-radius: 16px;
            padding: 12px;
        }
        .summary .box .k{
            font-size: 12px;
            color: var(--muted);
            font-weight: 900;
        }
        .summary .box .v{
            margin-top: 6px;
            font-size: 18px;
            font-weight: 950;
            color: var(--blue);
        }
        .risk-pill{
            display:inline-flex;
            align-items:center;
            gap:8px;
            padding: 8px 10px;
            border-radius: 999px;
            font-weight: 950;
            font-size: 12px;
        }
        .risk-low{ background: rgba(34,197,94,.10); border: 1px solid rgba(34,197,94,.20); color:#166534; }
        .risk-med{ background: rgba(234,179,8,.14); border: 1px solid rgba(234,179,8,.25); color:#854d0e; }
        .risk-high{ background: rgba(220,38,38,.10); border: 1px solid rgba(220,38,38,.22); color:#7f1d1d; }

        .actions{
            margin-top: 14px;
            display:flex;
            gap: 10px;
            justify-content:flex-end;
            flex-wrap:wrap;
        }
        .btn{
            border:none;
            border-radius: 14px;
            padding: 12px 16px;
            font-size: 13px;
            font-weight: 900;
            letter-spacing:.6px;
            text-transform: uppercase;
            cursor:pointer;
            color:#fff;
            background: linear-gradient(135deg, #ef4444 0%, #dc2626 100%);
        }
        .btn-secondary{
            color: var(--blue);
            background: rgba(37,99,235,.10);
            border: 1px solid rgba(37,99,235,.18);
        }

        @media (max-width: 980px){
            .grid{ grid-template-columns: 1fr 1fr; }
            .span-2{ grid-column: span 2; }
            .span-4{ grid-column: span 2; }
            .content{ grid-template-columns: 1fr; }
            .dates{ grid-template-columns: repeat(3, 1fr); }
            .actions .btn, .actions .btn-secondary{ width:100%; }
        }

        @media print{
            body{ background:#fff; }
            .topbar, .regbar, .actions{ display:none !important; }
            .panel{ box-shadow:none; border: 1px solid #e5e7eb; }
        }
    </style>
</head>

<body>
<header class="topbar">
    <div class="wrap">
        <div class="brand">
            <img src="{{ asset('images/LUMC_LOGO.png') }}" alt="LUMC">
            <span>LA UNION MEDICAL CENTER</span>
        </div>

        <div class="top-logos">
            <img src="{{ asset('images/ProvinceofLaUnion.png') }}" alt="Province of La Union">
            <img src="{{ asset('images/BagongPilipinas.png') }}" alt="Bagong Pilipinas">
        </div>
    </div>
</header>

<main class="container">

    <div class="regbar">
        <div class="regbar-left">
            <div>
                <span class="chip">NURSE MODULE</span>
                <span class="regbar-title"> • <span style="color:var(--yellow)">Morse Fall Scale</span></span>
            </div>
            <div class="regbar-sub">
                Nursing Fall Assessment and Prevention Program (NFAPREP) — compute score + risk level.
            </div>
        </div>

        <div class="regbar-logos">
            <img src="{{ asset('images/LaUnionAgkaysa.png') }}" alt="Agkaysa">
        </div>
    </div>

    <section class="panel">
        <div class="panel-head">
            <div>
                <h2>Morse Fall Scale</h2>
                <p>Digital form (demo) — pwede i-print.</p>
            </div>
            <div class="badge">
                <span class="dot"></span>
                For hospital use
            </div>
        </div>

        <div class="grid">
            <div class="field span-2">
                <label>Name of Patient</label>
                <input placeholder="Patient name">
            </div>
            <div class="field">
                <label>Hospital No.</label>
                <input placeholder="Hospital No.">
            </div>
            <div class="field">
                <label>Ward</label>
                <input placeholder="Ward">
            </div>

            <div class="field">
                <label>Age</label>
                <input placeholder="Age">
            </div>
            <div class="field">
                <label>Gender</label>
                <select>
                    <option value="">Select</option>
                    <option>Male</option>
                    <option>Female</option>
                </select>
            </div>
            <div class="field">
                <label>Month</label>
                <input placeholder="Month">
            </div>
            <div class="field">
                <label>Year</label>
                <input placeholder="Year">
            </div>
        </div>

        <div class="content">
            <!-- LEFT: SCALE TABLE -->
            <div class="card">
                <div class="card-title">MORSE FALL SCALE — Items + Date Columns</div>
                <div class="card-body">

                    <table class="table">
                        <thead>
                            <tr>
                                <th style="width:44%;">Item</th>
                                <th style="width:28%;">Scale / Select</th>
                                <th>Date (optional)</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <div class="item-title">1. History of Fall (Immediate or within 3 months)</div>
                                </td>
                                <td>
                                    <div class="opt">
                                        <label><input type="radio" name="i1" value="0" checked> No (0)</label>
                                        <label><input type="radio" name="i1" value="25"> Yes (25)</label>
                                    </div>
                                </td>
                                <td>
                                    <div class="dates">
                                        <input placeholder="Date">
                                        <input placeholder="Date">
                                        <input placeholder="Date">
                                        <input placeholder="Date">
                                        <input placeholder="Date">
                                        <input placeholder="Date">
                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <div class="item-title">2. Secondary Diagnosis</div>
                                </td>
                                <td>
                                    <div class="opt">
                                        <label><input type="radio" name="i2" value="0" checked> No (0)</label>
                                        <label><input type="radio" name="i2" value="15"> Yes (15)</label>
                                    </div>
                                </td>
                                <td>
                                    <div class="dates">
                                        <input placeholder="Date">
                                        <input placeholder="Date">
                                        <input placeholder="Date">
                                        <input placeholder="Date">
                                        <input placeholder="Date">
                                        <input placeholder="Date">
                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <div class="item-title">3. Ambulatory Aid</div>
                                </td>
                                <td>
                                    <div class="opt">
                                        <label><input type="radio" name="i3" value="0" checked> Bed Rest / Nurse Assist (0)</label>
                                        <label><input type="radio" name="i3" value="15"> Crutches / Cane / Walker (15)</label>
                                        <label><input type="radio" name="i3" value="30"> Furniture (30)</label>
                                    </div>
                                </td>
                                <td>
                                    <div class="dates">
                                        <input placeholder="Date">
                                        <input placeholder="Date">
                                        <input placeholder="Date">
                                        <input placeholder="Date">
                                        <input placeholder="Date">
                                        <input placeholder="Date">
                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <div class="item-title">4. IV / Heparin Lock</div>
                                </td>
                                <td>
                                    <div class="opt">
                                        <label><input type="radio" name="i4" value="0" checked> No (0)</label>
                                        <label><input type="radio" name="i4" value="20"> Yes (20)</label>
                                    </div>
                                </td>
                                <td>
                                    <div class="dates">
                                        <input placeholder="Date">
                                        <input placeholder="Date">
                                        <input placeholder="Date">
                                        <input placeholder="Date">
                                        <input placeholder="Date">
                                        <input placeholder="Date">
                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <div class="item-title">5. Gait / Transferring</div>
                                </td>
                                <td>
                                    <div class="opt">
                                        <label><input type="radio" name="i5" value="0" checked> Normal (0)</label>
                                        <label><input type="radio" name="i5" value="10"> Weak (10)</label>
                                        <label><input type="radio" name="i5" value="20"> Impaired (20)</label>
                                    </div>
                                </td>
                                <td>
                                    <div class="dates">
                                        <input placeholder="Date">
                                        <input placeholder="Date">
                                        <input placeholder="Date">
                                        <input placeholder="Date">
                                        <input placeholder="Date">
                                        <input placeholder="Date">
                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <div class="item-title">6. Mental Status</div>
                                </td>
                                <td>
                                    <div class="opt">
                                        <label><input type="radio" name="i6" value="0" checked> Oriented to own ability (0)</label>
                                        <label><input type="radio" name="i6" value="15"> Forgets limitations (15)</label>
                                    </div>
                                </td>
                                <td>
                                    <div class="dates">
                                        <input placeholder="Date">
                                        <input placeholder="Date">
                                        <input placeholder="Date">
                                        <input placeholder="Date">
                                        <input placeholder="Date">
                                        <input placeholder="Date">
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                    <div class="summary">
                        <div class="box">
                            <div class="k">TOTAL SCORE</div>
                            <div class="v" id="totalScore">0</div>
                        </div>
                        <div class="box">
                            <div class="k">RISK ASSESSMENT</div>
                            <div class="v">
                                <span id="riskPill" class="risk-pill risk-low">No Risk (0)</span>
                            </div>
                        </div>
                    </div>

                    <div style="margin-top:10px; display:grid; grid-template-columns: 1fr 1fr; gap:10px;">
                        <div class="field">
                            <label>Nurse on Duty</label>
                            <input placeholder="Nurse name">
                        </div>
                        <div class="field">
                            <label>Date/Time</label>
                            <input placeholder="Date/Time">
                        </div>
                    </div>

                </div>
            </div>

            <!-- RIGHT: PREVENTION MEASURES -->
            <div class="card">
                <div class="card-title">FALL PREVENTION MEASURES</div>
                <div class="card-body side-list">

                    <div class="sec" style="border-top:none; padding-top:0; margin-top:0;">
                        <h4>LOW–MEDIUM RISK</h4>
                        <ol>
                            <li>Educate family and patient about fall assessment and prevention program.</li>
                            <li>Orient patient to surroundings and hospital routines (ward set-up, bathroom location).</li>
                            <li>Call light in easy reach.</li>
                            <li>Instruct patient to call for help/assistance or nurse before getting out of bed.</li>
                            <li>Lower position of bed, secure brakes, side rails raised as appropriate.</li>
                            <li>Ensure personal items are within reach.</li>
                            <li>Provide adequate lighting.</li>
                            <li>Instruct patient to sit first before standing.</li>
                            <li>Discuss toileting needs with the patient.</li>
                            <li>Evaluate medications for potential side effects and explain to patient.</li>
                            <li>Ensure pathways are clear and clutters removed.</li>
                            <li>Inform patient to wear a non-slip footwear.</li>
                            <li>Check functionality of transport device to be used.</li>
                            <li>Instruct and re-orient watchers coming in to the unit.</li>
                        </ol>
                    </div>

                    <div class="sec">
                        <h4>HIGH RISK</h4>
                        <ol>
                            <li>Collaborate with multi-disciplinary team members.</li>
                            <li>Post “HIGH RISK” tag at the room or bed of the patient.</li>
                            <li>Coordinate with nursing attendant to make comfort rounds every 2 hours.</li>
                            <li>Provide a commode at bedside if appropriate.</li>
                            <li>Urinal/bedpan should be within easy reach if appropriate.</li>
                            <li>Use night light as appropriate.</li>
                            <li>Do not leave patients unattended in diagnostic/treatment areas.</li>
                            <li>Institutional workers transport/transfer with presence of medical professional.</li>
                            <li>Consider placing patient in a highly visible area (near nurse station) for close observation.</li>
                            <li>Communicate patient’s HIGH RISK status every shift during endorsement.</li>
                            <li>Ensure presence of 24-hour watcher (1:1).</li>
                            <li>Provide frequent re-orientation to client and family (2x a day).</li>
                            <li>Apply restraints (with MD order) as necessary.</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>

        <div class="actions">
            <button type="button" class="btn btn-secondary" onclick="window.print()">Print</button>
            <button type="button" class="btn" onclick="alert('Demo only: saving to database next step 😅')">Save</button>
        </div>

    </section>

</main>

<script>
    function computeTotal(){
        const groups = ['i1','i2','i3','i4','i5','i6'];
        let total = 0;

        groups.forEach(g => {
            const picked = document.querySelector('input[name="'+g+'"]:checked');
            if (picked) total += parseInt(picked.value || '0', 10);
        });

        document.getElementById('totalScore').textContent = total;

        const pill = document.getElementById('riskPill');
        pill.className = 'risk-pill';

        // Legend (common Morse Fall Scale):
        // 0 = No risk, 1-24 Low, 25-50 Medium, 51+ High
        if (total === 0){
            pill.classList.add('risk-low');
            pill.textContent = 'No Risk (0)';
        } else if (total >= 1 && total <= 24){
            pill.classList.add('risk-low');
            pill.textContent = 'Low Risk (1–24)';
        } else if (total >= 25 && total <= 50){
            pill.classList.add('risk-med');
            pill.textContent = 'Medium Risk (25–50)';
        } else {
            pill.classList.add('risk-high');
            pill.textContent = 'High Risk (≥51)';
        }
    }

    document.addEventListener('change', (e) => {
        if (e.target && e.target.matches('input[type="radio"]')) computeTotal();
    });

    computeTotal();
</script>

</body>
</html>