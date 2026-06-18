<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>LUMC | Patient Safety Checklist</title>

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

        .top-logos{ display:flex; align-items:center; gap:10px; }
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
        .regbar-left{ display:flex; flex-direction: column; gap: 6px; min-width: 280px; }
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
            max-width: 760px;
        }
        .regbar-logos{ display:flex; align-items:center; gap: 12px; }
        .regbar-logos img{
            height: 38px; width:auto; object-fit:contain;
            filter: drop-shadow(0 10px 18px rgba(0,0,0,.18));
            opacity:.95;
        }

        .panel{
            margin-top: 16px;
            background: rgba(255,255,255,.96);
            border-radius: 24px;
            box-shadow: 0 28px 70px rgba(0,0,0,.22);
            padding: 22px;
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
            grid-template-columns: 1fr 1fr 1fr;
            gap: 10px 14px;
        }
        .field label{
            display:block;
            font-size: 12px;
            font-weight: 900;
            color: var(--muted);
            margin-bottom: 6px;
        }
        .field input{
            width:100%;
            border:none;
            outline:none;
            padding: 10px 10px;
            border-radius: 12px;
            background: #f8fafc;
            border: 1px solid #e5e7eb;
            font-size: 14px;
        }

        .table{
            width:100%;
            border-collapse: collapse;
            margin-top: 14px;
            font-size: 13px;
            background:#fff;
            border-radius: 18px;
            overflow:hidden;
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

        .section{
            background:#f1f5f9;
            font-weight: 950;
            color: var(--blue);
        }

        .checks{
            display:flex;
            gap:10px;
            justify-content:center;
            align-items:center;
            flex-wrap:wrap;
        }
        .checks label{
            display:inline-flex;
            align-items:center;
            gap:6px;
            font-size: 12px;
            font-weight: 900;
            color:#0f172a;
            padding: 6px 8px;
            border-radius: 999px;
            border: 1px solid #e5e7eb;
            background:#fff;
            cursor:pointer;
            user-select:none;
        }
        .checks input{ accent-color: var(--red); }

        .small{
            width:100%;
            border:none;
            outline:none;
            padding: 8px 8px;
            border-radius: 10px;
            background: #f8fafc;
            border: 1px solid #e5e7eb;
            font-size: 12px;
        }

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
            .grid{ grid-template-columns: 1fr; }
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
                <span class="regbar-title"> • <span style="color:var(--yellow)">Patient Safety Checklist</span></span>
            </div>
            <div class="regbar-sub">
                Checklist for patient safety goals — mark YES/NO/NA, add remarks, and checked by.
            </div>
        </div>

        <div class="regbar-logos">
            <img src="{{ asset('images/LaUnionAgkaysa.png') }}" alt="Agkaysa">
        </div>
    </div>

    <section class="panel">
        <div class="panel-head">
            <div>
                <h2>Patient Safety Checklist</h2>
                <p>Digital form (demo) — pwede i-print.</p>
            </div>
            <div class="badge">
                <span class="dot"></span>
                For hospital use
            </div>
        </div>

        <div class="grid">
            <div class="field">
                <label>Area</label>
                <input placeholder="e.g., Ward / ER / OPD">
            </div>
            <div class="field">
                <label>Date</label>
                <input placeholder="e.g., Feb 24, 2026">
            </div>
            <div class="field">
                <label>Patient Name</label>
                <input placeholder="Patient name">
            </div>
        </div>

        <table class="table">
            <thead>
                <tr>
                    <th style="width:46%;">Patient Safety Goals</th>
                    <th style="width:16%; text-align:center;">YES / NO / NA</th>
                    <th style="width:22%;">Remarks</th>
                    <th style="width:16%;">Checked by</th>
                </tr>
            </thead>

            <tbody>
                <tr>
                    <td class="section" colspan="4">I. IDENTIFY PATIENT’S CORRECTLY</td>
                </tr>
                <tr>
                    <td>Patient identified / Patient identification bracelet (with Name, Address, DOB, Date of Admission, Attending Physician) / Bed Tag</td>
                    <td>
                        <div class="checks">
                            <label><input type="radio" name="i1" value="YES"> YES</label>
                            <label><input type="radio" name="i1" value="NO"> NO</label>
                            <label><input type="radio" name="i1" value="NA"> NA</label>
                        </div>
                    </td>
                    <td><input class="small" placeholder="Remarks"></td>
                    <td><input class="small" placeholder="Name/Initials"></td>
                </tr>
                <tr>
                    <td>Laboratory specimens properly labelled</td>
                    <td>
                        <div class="checks">
                            <label><input type="radio" name="i2" value="YES"> YES</label>
                            <label><input type="radio" name="i2" value="NO"> NO</label>
                            <label><input type="radio" name="i2" value="NA"> NA</label>
                        </div>
                    </td>
                    <td><input class="small" placeholder="Remarks"></td>
                    <td><input class="small" placeholder="Name/Initials"></td>
                </tr>
                <tr>
                    <td>Diagnostic results with correct patient’s data</td>
                    <td>
                        <div class="checks">
                            <label><input type="radio" name="i3" value="YES"> YES</label>
                            <label><input type="radio" name="i3" value="NO"> NO</label>
                            <label><input type="radio" name="i3" value="NA"> NA</label>
                        </div>
                    </td>
                    <td><input class="small" placeholder="Remarks"></td>
                    <td><input class="small" placeholder="Name/Initials"></td>
                </tr>
                <tr>
                    <td>Patient allergy properly documented</td>
                    <td>
                        <div class="checks">
                            <label><input type="radio" name="i4" value="YES"> YES</label>
                            <label><input type="radio" name="i4" value="NO"> NO</label>
                            <label><input type="radio" name="i4" value="NA"> NA</label>
                        </div>
                    </td>
                    <td><input class="small" placeholder="Remarks"></td>
                    <td><input class="small" placeholder="Name/Initials"></td>
                </tr>

                <tr>
                    <td class="section" colspan="4">II. PROPER AND EFFECTIVE COMMUNICATION</td>
                </tr>
                <tr>
                    <td>Observed right procedure in taking down verbal/telephone order of doctor</td>
                    <td>
                        <div class="checks">
                            <label><input type="radio" name="ii1" value="YES"> YES</label>
                            <label><input type="radio" name="ii1" value="NO"> NO</label>
                            <label><input type="radio" name="ii1" value="NA"> NA</label>
                        </div>
                    </td>
                    <td><input class="small" placeholder="Remarks"></td>
                    <td><input class="small" placeholder="Name/Initials"></td>
                </tr>
                <tr>
                    <td>Observed information privacy and confidentiality</td>
                    <td>
                        <div class="checks">
                            <label><input type="radio" name="ii2" value="YES"> YES</label>
                            <label><input type="radio" name="ii2" value="NO"> NO</label>
                            <label><input type="radio" name="ii2" value="NA"> NA</label>
                        </div>
                    </td>
                    <td><input class="small" placeholder="Remarks"></td>
                    <td><input class="small" placeholder="Name/Initials"></td>
                </tr>
                <tr>
                    <td>Plan of care explained to patient and family</td>
                    <td>
                        <div class="checks">
                            <label><input type="radio" name="ii3" value="YES"> YES</label>
                            <label><input type="radio" name="ii3" value="NO"> NO</label>
                            <label><input type="radio" name="ii3" value="NA"> NA</label>
                        </div>
                    </td>
                    <td><input class="small" placeholder="Remarks"></td>
                    <td><input class="small" placeholder="Name/Initials"></td>
                </tr>
                <tr>
                    <td>Physician’s orders documented clearly, timed, signed and carried out</td>
                    <td>
                        <div class="checks">
                            <label><input type="radio" name="ii4" value="YES"> YES</label>
                            <label><input type="radio" name="ii4" value="NO"> NO</label>
                            <label><input type="radio" name="ii4" value="NA"> NA</label>
                        </div>
                    </td>
                    <td><input class="small" placeholder="Remarks"></td>
                    <td><input class="small" placeholder="Name/Initials"></td>
                </tr>
                <tr>
                    <td>Uses standard abbreviations, acronym and symbols</td>
                    <td>
                        <div class="checks">
                            <label><input type="radio" name="ii5" value="YES"> YES</label>
                            <label><input type="radio" name="ii5" value="NO"> NO</label>
                            <label><input type="radio" name="ii5" value="NA"> NA</label>
                        </div>
                    </td>
                    <td><input class="small" placeholder="Remarks"></td>
                    <td><input class="small" placeholder="Name/Initials"></td>
                </tr>

                <tr>
                    <td class="section" colspan="4">III. SAFETY ON MEDICATIONS</td>
                </tr>
                <tr>
                    <td>Medication prescription complete</td>
                    <td>
                        <div class="checks">
                            <label><input type="radio" name="iii1" value="YES"> YES</label>
                            <label><input type="radio" name="iii1" value="NO"> NO</label>
                            <label><input type="radio" name="iii1" value="NA"> NA</label>
                        </div>
                    </td>
                    <td><input class="small" placeholder="Remarks"></td>
                    <td><input class="small" placeholder="Name/Initials"></td>
                </tr>
                <tr>
                    <td>Drug allergies identified</td>
                    <td>
                        <div class="checks">
                            <label><input type="radio" name="iii2" value="YES"> YES</label>
                            <label><input type="radio" name="iii2" value="NO"> NO</label>
                            <label><input type="radio" name="iii2" value="NA"> NA</label>
                        </div>
                    </td>
                    <td><input class="small" placeholder="Remarks"></td>
                    <td><input class="small" placeholder="Name/Initials"></td>
                </tr>
                <tr>
                    <td>Observed the medication rights (Right patient, drug, dose, route, time, documentation, education, assessment, refuse, evaluation)</td>
                    <td>
                        <div class="checks">
                            <label><input type="radio" name="iii3" value="YES"> YES</label>
                            <label><input type="radio" name="iii3" value="NO"> NO</label>
                            <label><input type="radio" name="iii3" value="NA"> NA</label>
                        </div>
                    </td>
                    <td><input class="small" placeholder="Remarks"></td>
                    <td><input class="small" placeholder="Name/Initials"></td>
                </tr>

                <tr>
                    <td class="section" colspan="4">IV. HOSPITAL FACILITY</td>
                </tr>
                <tr>
                    <td>Fall prevention: bed rail raised if patient is at risk of fall / adequate lighting in patient’s room</td>
                    <td>
                        <div class="checks">
                            <label><input type="radio" name="iv1" value="YES"> YES</label>
                            <label><input type="radio" name="iv1" value="NO"> NO</label>
                            <label><input type="radio" name="iv1" value="NA"> NA</label>
                        </div>
                    </td>
                    <td><input class="small" placeholder="Remarks"></td>
                    <td><input class="small" placeholder="Name/Initials"></td>
                </tr>
                <tr>
                    <td>Infection control: hand hygiene practiced / isolation precaution followed if necessary / proper disposal of infectious waste</td>
                    <td>
                        <div class="checks">
                            <label><input type="radio" name="iv2" value="YES"> YES</label>
                            <label><input type="radio" name="iv2" value="NO"> NO</label>
                            <label><input type="radio" name="iv2" value="NA"> NA</label>
                        </div>
                    </td>
                    <td><input class="small" placeholder="Remarks"></td>
                    <td><input class="small" placeholder="Name/Initials"></td>
                </tr>
            </tbody>
        </table>

        <div class="actions">
            <button type="button" class="btn btn-secondary" onclick="window.print()">Print</button>
            <button type="button" class="btn" onclick="alert('Demo only: saving to DB next step 😅')">Save</button>
        </div>
    </section>

</main>
</body>
</html>