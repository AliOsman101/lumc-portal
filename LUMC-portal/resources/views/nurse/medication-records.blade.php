<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>LUMC | Medication Records</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        :root{
            --blue:#0b2e7a; --blue2:#1e40af; --blue3:#2563eb;
            --red:#dc2626; --muted:#64748b; --white:#ffffff;
            --yellow:#facc15; --line:#dbe3f0; --ink:#0f172a;
        }
        *{ box-sizing:border-box; }
        body{
            margin:0;
            background: linear-gradient(135deg, #0b2e7a 0%, #1e40af 50%, #2563eb 100%);
            font-family: ui-sans-serif, system-ui, -apple-system, Segoe UI, Roboto, Arial, sans-serif;
            color: var(--ink);
        }
        .topbar{ background:#fff; box-shadow: 0 6px 20px rgba(0,0,0,.08); }
        .topbar .wrap{
            width: min(1200px, 92vw);
            margin:auto; height: 74px;
            display:flex; align-items:center; justify-content:space-between; gap:16px;
        }
        .brand{ display:flex; align-items:center; gap:12px; font-weight:900; letter-spacing:.6px; color: var(--blue); }
        .brand img{ height:46px; width:46px; object-fit:contain; }
        .top-logos{ display:flex; align-items:center; gap:10px; }
        .top-logos img{ height:42px; object-fit:contain; }

        .container{ width: min(1200px, 92vw); margin: 26px auto 44px; }

        .regbar{
            background: rgba(255,255,255,.14);
            border: 1px solid rgba(255,255,255,.22);
            border-radius: 18px;
            padding: 14px 16px;
            color: rgba(255,255,255,.95);
            display:flex; align-items:center; justify-content:space-between; gap: 18px;
            backdrop-filter: blur(8px);
        }
        .chip{
            display:inline-flex; align-items:center;
            padding: 6px 10px; border-radius: 999px;
            font-weight: 900; font-size: 11px; letter-spacing:.6px;
            background: rgba(255,255,255,.14);
            border: 1px solid rgba(255,255,255,.20);
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
            display:flex; align-items:flex-end; justify-content:space-between; gap: 16px;
            padding-bottom: 12px; border-bottom: 1px solid rgba(15,23,42,.06);
        }
        .panel-head h2{ margin:0; font-size: 26px; font-weight: 950; color: var(--blue); }
        .panel-head p{ margin:8px 0 0; color: var(--muted); font-size: 14px; }

        .msg{
            margin-top:14px; padding:12px 14px; border-radius:12px;
            font-weight:900;
        }
        .msg-ok{ background: rgba(34,197,94,.10); border: 1px solid rgba(34,197,94,.18); color:#166534; }
        .msg-err{ background: rgba(220,38,38,.08); border: 1px solid rgba(220,38,38,.18); color:#7f1d1d; }

        .grid2{
            margin-top: 16px;
            display:grid;
            grid-template-columns: 1fr 1fr;
            gap: 12px 18px;
        }
        .full{ grid-column: 1 / -1; }
        .label{ display:block; font-size:12px; font-weight:900; color: var(--muted); margin-bottom: 8px; }
        .input{
            padding: 10px 0;
            border-bottom: 1px solid var(--line);
        }
        .input input{
            width:100%; border:none; outline:none; background:transparent;
            font-size: 15px; padding: 6px 0; color:#0f172a;
        }
        .checks{ display:flex; gap: 12px; flex-wrap: wrap; padding: 10px 0 6px; border-bottom: 1px solid var(--line); }
        .check{ display:flex; align-items:center; gap:8px; font-size: 13px; color:#0f172a; font-weight:700; }
        .check input{ width:16px; height:16px; accent-color: var(--red); }

        /* table */
        .table-wrap{
            margin-top: 18px;
            border: 1px solid rgba(15,23,42,.10);
            border-radius: 14px;
            overflow: auto;
            background:#fff;
        }
        table{
            border-collapse: collapse;
            min-width: 1200px;
            width: 100%;
        }
        th, td{
            border: 1px solid rgba(15,23,42,.10);
            padding: 8px;
            font-size: 12px;
            text-align: center;
            white-space: nowrap;
        }
        th{
            background: rgba(37,99,235,.08);
            color: #0b2e7a;
            font-weight: 900;
        }
        .leftcol{
            text-align:left;
            min-width: 220px;
            position: sticky;
            left: 0;
            background:#fff;
            z-index: 2;
        }
        .shiftcol{
            min-width: 70px;
            position: sticky;
            left: 220px;
            background:#fff;
            z-index: 2;
        }
        .stickyhead{
            position: sticky;
            top: 0;
            z-index: 3;
        }
        .chk{
            width: 16px; height: 16px;
            accent-color: var(--blue3);
        }

        .actions{
            margin-top: 16px;
            display:flex; gap: 12px; flex-wrap: wrap;
            justify-content: flex-end;
        }
        .btn{
            border:none; border-radius: 14px;
            padding: 12px 16px;
            font-size: 13px; font-weight: 900;
            letter-spacing:.6px; text-transform: uppercase;
            cursor:pointer; color:#fff;
            background: linear-gradient(135deg, #ef4444 0%, #dc2626 100%);
        }
        .btn-secondary{
            color: var(--blue);
            background: rgba(37,99,235,.10);
            border: 1px solid rgba(37,99,235,.18);
        }

        @media print{
            body{ background:#fff; }
            .topbar, .regbar, .actions{ display:none !important; }
            .panel{ box-shadow:none; border:1px solid #e5e7eb; }
            .table-wrap{ overflow: visible; }
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
        <div>
            <div style="display:flex; gap:10px; align-items:center; flex-wrap:wrap;">
                <span class="chip">NURSE MODULE</span>
                <div style="font-weight:950; font-size:14px;">
                    <span>Medication </span><span style="color:var(--yellow);">Records</span>
                </div>
            </div>
            <div style="font-size:12px; color:rgba(255,255,255,.85); margin-top:6px;">
                Based on LUMC paper form — check per day + shift.
            </div>
        </div>

        <div style="display:flex; gap:12px; align-items:center;">
            <img src="{{ asset('images/LaUnionAgkaysa.png') }}" alt="Agkaysa" style="height:38px; filter: drop-shadow(0 10px 18px rgba(0,0,0,.18)); opacity:.95;">
        </div>
    </div>

    <section class="panel">
        <div class="panel-head">
            <div>
                <h2>Medication Records</h2>
                <p>Tip: scroll horizontally for Day 1–31.</p>
            </div>
        </div>

        <form method="POST" action="{{ route('nurse.medication.records.store') }}">
            @csrf

            @if(session('success'))
                <div class="msg msg-ok">✅ {{ session('success') }}</div>
            @endif

            @if ($errors->any())
                <div class="msg msg-err">Please check your inputs.</div>
            @endif

            <div class="grid2">
                <div>
                    <span class="label">Patient’s Name (Last)</span>
                    <div class="input"><input name="last_name" placeholder="Last name"></div>
                </div>
                <div>
                    <span class="label">Patient’s Name (Given)</span>
                    <div class="input"><input name="given_name" placeholder="Given name"></div>
                </div>
                <div>
                    <span class="label">Patient’s Name (Middle)</span>
                    <div class="input"><input name="middle_name" placeholder="Middle name"></div>
                </div>
                <div>
                    <span class="label">Hospital Case No.</span>
                    <div class="input"><input name="hospital_case_no" placeholder="e.g., HOSP-000123"></div>
                </div>

                <div class="full">
                    <span class="label">Permanent Address</span>
                    <div class="input"><input name="permanent_address" placeholder="House No., Street, Barangay, City, Province"></div>
                </div>

                <div>
                    <span class="label">Tel. No.</span>
                    <div class="input"><input name="tel_no" placeholder="09xxxxxxxxx"></div>
                </div>
                <div>
                    <span class="label">Ward / Service</span>
                    <div class="input"><input name="ward_service" placeholder="e.g., ER / OPD / Ward 2"></div>
                </div>

                <div>
                    <span class="label">Sex</span>
                    <div class="checks">
                        <label class="check"><input type="radio" name="sex" value="M"> M</label>
                        <label class="check"><input type="radio" name="sex" value="F"> F</label>
                    </div>
                </div>

                <div>
                    <span class="label">Civil Status</span>
                    <div class="checks">
                        <label class="check"><input type="radio" name="civil_status" value="S"> S</label>
                        <label class="check"><input type="radio" name="civil_status" value="M"> M</label>
                        <label class="check"><input type="radio" name="civil_status" value="D"> D</label>
                        <label class="check"><input type="radio" name="civil_status" value="W"> W</label>
                        <label class="check"><input type="radio" name="civil_status" value="SP"> SP</label>
                    </div>
                </div>

                <div class="full">
                    <span class="label">Month</span>
                    <div class="input"><input name="month" placeholder="e.g., Feb 2026"></div>
                </div>
            </div>

            @php
                $days = range(1, 31);
                $shifts = ['7-3', '3-11', '11-7'];
                // 5 meds rows (pwede dagdagan later)
                $meds = ['Medication #1','Medication #2','Medication #3','Medication #4','Medication #5'];
            @endphp

            <div style="margin-top:16px; font-size:12px; font-weight:900; color:var(--muted);">
                C — Circle all does not given, state reason in nurses note.
            </div>

            <div class="table-wrap">
                <table>
                    <thead>
                        <tr class="stickyhead">
                            <th class="leftcol">Medication</th>
                            <th class="shiftcol">Shift</th>
                            @foreach($days as $d)
                                <th>Day {{ $d }}</th>
                            @endforeach
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($meds as $mi => $mname)
                            @foreach($shifts as $si => $shift)
                                <tr>
                                    @if($si === 0)
                                        <td class="leftcol" rowspan="{{ count($shifts) }}">
                                            <input
                                                name="grid[{{ $mi }}][name]"
                                                placeholder="Medication name..."
                                                style="width:100%; border:none; outline:none; font-weight:900;"
                                            >
                                        </td>
                                    @endif

                                    <td class="shiftcol" style="font-weight:900;">{{ $shift }}</td>

                                    @foreach($days as $d)
                                        <td>
                                            <input class="chk" type="checkbox"
                                                name="grid[{{ $mi }}][shifts][{{ $shift }}][{{ $d }}]"
                                                value="1">
                                        </td>
                                    @endforeach
                                </tr>
                            @endforeach
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="actions">
                <button type="button" class="btn btn-secondary" onclick="window.print()">Print</button>
                <button type="submit" class="btn">Save Record</button>
            </div>
        </form>
    </section>
</main>

</body>
</html>