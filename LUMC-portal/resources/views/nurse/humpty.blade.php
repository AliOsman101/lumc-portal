<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>LUMC | Humpty Dumpty Fall Assessment</title>

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
            height:74px;
            display:flex;
            align-items:center;
            justify-content:space-between;
            gap:16px;
        }
        .brand{
            display:flex;
            align-items:center;
            gap:12px;
            font-weight:900;
            letter-spacing:.6px;
            color:var(--blue);
        }
        .brand img{ height:46px; width:46px; object-fit:contain; }

        .top-logos{
            display:flex;
            align-items:center;
            gap:10px;
        }
        .top-logos img{ height:42px; object-fit:contain; }

        .container{
            width:min(1200px, 92vw);
            margin:26px auto 44px;
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
            gap:18px;
            backdrop-filter: blur(8px);
        }
        .chip{
            display:inline-flex;
            align-items:center;
            padding:6px 10px;
            border-radius:999px;
            font-weight:900;
            font-size:11px;
            letter-spacing:.6px;
            background: rgba(255,255,255,.14);
            border:1px solid rgba(255,255,255,.20);
        }
        .regbar-title{
            font-weight:950;
            font-size:14px;
            color:rgba(255,255,255,.96);
        }
        .regbar-sub{
            margin-top:6px;
            font-size:12px;
            color:rgba(255,255,255,.85);
            max-width:760px;
            line-height:1.5;
        }

        .regbar-logos img{
            height:38px;
            filter: drop-shadow(0 10px 18px rgba(0,0,0,.18));
        }

        .panel{
            margin-top:16px;
            background: rgba(255,255,255,.96);
            border-radius:24px;
            box-shadow: 0 28px 70px rgba(0,0,0,.22);
            padding:22px;
            overflow:hidden;
        }

        .panel-head{
            display:flex;
            justify-content:space-between;
            align-items:flex-end;
            gap:16px;
            padding-bottom:14px;
            border-bottom:1px solid rgba(15,23,42,.06);
        }
        .panel-head h2{
            margin:0;
            font-size:24px;
            font-weight:950;
            color:var(--blue);
        }
        .panel-head p{
            margin:6px 0 0;
            color:var(--muted);
            font-size:13px;
        }

        .badge{
            display:inline-flex;
            align-items:center;
            gap:8px;
            padding:8px 12px;
            border-radius:999px;
            background: rgba(220,38,38,.10);
            border:1px solid rgba(220,38,38,.18);
            color:var(--red);
            font-weight:900;
            font-size:12px;
        }
        .dot{
            width:8px;
            height:8px;
            border-radius:50%;
            background:var(--red);
        }

        .grid{
            margin-top:16px;
            display:grid;
            grid-template-columns: repeat(5, 1fr);
            gap:12px 16px;
        }

        .field label{
            display:block;
            font-size:12px;
            font-weight:900;
            color:var(--muted);
            margin-bottom:6px;
        }

        .field input, .field select{
            width:100%;
            border:none;
            outline:none;
            padding:10px 12px;
            border-radius:12px;
            background:#f8fafc;
            border:1px solid #e5e7eb;
            font-size:14px;
        }

        .table-wrap{
            margin-top:18px;
            overflow:auto;
            border:1px solid #e5e7eb;
            border-radius:18px;
            background:#fff;
        }

        table{
            width:100%;
            min-width:1100px;
            border-collapse:collapse;
            font-size:12px;
        }

        th, td{
            border:1px solid #e5e7eb;
            padding:10px 8px;
            text-align:left;
            vertical-align:top;
        }

        th{
            background:#f8fafc;
            color:var(--blue);
            font-weight:950;
        }

        .section-label{
            font-weight:900;
            color:#0f172a;
        }

        .summary{
            margin-top:18px;
            display:grid;
            grid-template-columns: repeat(3, 1fr);
            gap:12px;
        }

        .box{
            background:#f8fafc;
            border:1px solid #e5e7eb;
            border-radius:18px;
            padding:14px;
        }
        .box .k{
            font-size:12px;
            color:var(--muted);
            font-weight:900;
        }
        .box .v{
            margin-top:6px;
            font-size:18px;
            font-weight:950;
            color:var(--blue);
        }

        .actions{
            margin-top:16px;
            display:flex;
            justify-content:flex-end;
            gap:10px;
            flex-wrap:wrap;
        }

        .btn{
            border:none;
            border-radius:14px;
            padding:12px 16px;
            font-size:13px;
            font-weight:900;
            letter-spacing:.6px;
            text-transform:uppercase;
            cursor:pointer;
            color:#fff;
            background: linear-gradient(135deg, #ef4444 0%, #dc2626 100%);
        }

        .btn-secondary{
            color:var(--blue);
            background: rgba(37,99,235,.10);
            border:1px solid rgba(37,99,235,.18);
        }

        @media (max-width: 980px){
            .grid{ grid-template-columns:1fr; }
            .summary{ grid-template-columns:1fr; }
            .actions .btn, .actions .btn-secondary{ width:100%; }
        }

        @media print{
            body{ background:#fff; }
            .topbar, .regbar, .actions{ display:none !important; }
            .panel{ box-shadow:none; border:1px solid #e5e7eb; }
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
            <span class="chip">NURSE MODULE</span>
            <span class="regbar-title"> • <span style="color:var(--yellow)">Humpty Dumpty Fall Assessment</span></span>
            <div class="regbar-sub">
                Enhanced nursing fall assessment and prevention program for pediatric clients.
            </div>
        </div>

        <div class="regbar-logos">
            <img src="{{ asset('images/LaUnionAgkaysa.png') }}" alt="Agkaysa">
        </div>
    </div>

    <section class="panel">
        <div class="panel-head">
            <div>
                <h2>Humpty Dumpty Fall Assessment Scale</h2>
                <p>Digital version inspired by the LUMC paper chart.</p>
            </div>
            <div class="badge">
                <span class="dot"></span>
                For hospital use
            </div>
        </div>

        <div class="grid">
            <div class="field">
                <label>Last Name</label>
                <input placeholder="Last name">
            </div>
            <div class="field">
                <label>Given Name</label>
                <input placeholder="Given name">
            </div>
            <div class="field">
                <label>Age</label>
                <input placeholder="Age">
            </div>
            <div class="field">
                <label>Sex</label>
                <select>
                    <option>Select</option>
                    <option>Male</option>
                    <option>Female</option>
                </select>
            </div>
            <div class="field">
                <label>Ward / Hospital No.</label>
                <input placeholder="Ward / Hospital No.">
            </div>
        </div>

        <div class="table-wrap">
            <table>
                <tr>
                    <th>Risk Factor</th>
                    <th>Details</th>
                    <th>Score</th>
                    <th>Date 1</th>
                    <th>Date 2</th>
                    <th>Date 3</th>
                    <th>Date 4</th>
                </tr>
                <tr>
                    <td class="section-label">Age</td>
                    <td>Less than 3 years old / 3–7 / 7–13 / 13 years and above</td>
                    <td>4 / 3 / 2 / 1</td>
                    <td></td><td></td><td></td><td></td>
                </tr>
                <tr>
                    <td class="section-label">Gender</td>
                    <td>Male / Female</td>
                    <td>2 / 1</td>
                    <td></td><td></td><td></td><td></td>
                </tr>
                <tr>
                    <td class="section-label">Cognitive Impairment</td>
                    <td>Not aware of limitations / forgets limitations / oriented to own ability</td>
                    <td>3 / 2 / 1</td>
                    <td></td><td></td><td></td><td></td>
                </tr>
                <tr>
                    <td class="section-label">Environmental Factors</td>
                    <td>History of fall / infant-toddler in crib / patient uses furniture / lighting issues</td>
                    <td>4 / 3 / 2 / 1</td>
                    <td></td><td></td><td></td><td></td>
                </tr>
                <tr>
                    <td class="section-label">Response to Surgery / Sedation / Anesthesia</td>
                    <td>Within 24 hours / within 48 hours / more than 48 hours</td>
                    <td>3 / 2 / 1</td>
                    <td></td><td></td><td></td><td></td>
                </tr>
                <tr>
                    <td class="section-label">Medication Usage</td>
                    <td>Sedatives / barbiturates / antidepressants / laxatives / diuretics / other meds</td>
                    <td>3 / 2 / 1</td>
                    <td></td><td></td><td></td><td></td>
                </tr>
            </table>
        </div>

        <div class="summary">
            <div class="box">
                <div class="k">Score Interpretation</div>
                <div class="v">12+ = High Risk</div>
            </div>
            <div class="box">
                <div class="k">Moderate / Low</div>
                <div class="v">7–11 = Low Risk</div>
            </div>
            <div class="box">
                <div class="k">Nurse on Duty</div>
                <div class="v">________________</div>
            </div>
        </div>

        <div class="actions">
            <button type="button" class="btn btn-secondary" onclick="window.print()">Print</button>
            <button type="button" class="btn">Save</button>
        </div>
    </section>
</main>
</body>
</html>