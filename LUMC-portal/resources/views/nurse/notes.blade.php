<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>LUMC | Nurse's Notes</title>

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

        /* Topbar */
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

        /* Page */
        .container{
            width: min(1200px, 92vw);
            margin: 26px auto 44px;
        }

        /* Header bar */
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
        .regbar-topline{
            display:flex;
            align-items:center;
            gap: 10px;
            flex-wrap: wrap;
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
            max-width: 620px;
        }
        .regbar-note{
            margin-top: 2px;
            font-size: 12px;
            color: rgba(255,255,255,.82);
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

        /* Panel */
        .panel{
            margin-top: 16px;
            background: rgba(255,255,255,.96);
            border-radius: 24px;
            box-shadow: 0 28px 70px rgba(0,0,0,.22);
            padding: 30px 40px 24px;
            position: relative;
            overflow:hidden;
        }
        .panel::before{
            content:"";
            position:absolute;
            left:-140px; top:-160px;
            width:360px; height:360px;
            border-radius:50%;
            background: radial-gradient(circle, rgba(37,99,235,.18), transparent 62%);
            pointer-events:none;
        }
        .panel::after{
            content:"";
            position:absolute;
            right:-160px; bottom:-180px;
            width:420px; height:420px;
            border-radius:50%;
            background: radial-gradient(circle, rgba(220,38,38,.10), transparent 62%);
            pointer-events:none;
        }

        .panel-head{
            position: relative;
            z-index: 2;
            display:flex;
            align-items:flex-end;
            justify-content:space-between;
            gap: 16px;
            padding-bottom: 16px;
            border-bottom: 1px solid rgba(15,23,42,.06);
        }
        .panel-head h2{
            margin:0;
            font-size: 28px;
            font-weight: 950;
            color: var(--blue);
        }
        .panel-head p{
            margin:8px 0 0;
            color: var(--muted);
            font-size: 14px;
            max-width: 720px;
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
        .dot{
            width:8px;height:8px;border-radius:50%;
            background: var(--red);
        }

        form{ position: relative; z-index: 2; }

        .grid{
            margin-top: 18px;
            display:grid;
            grid-template-columns: 1fr 1fr;
            gap: 14px 26px;
        }
        .full{ grid-column: 1 / -1; }

        .label{
            display:block;
            font-size:12px;
            font-weight:900;
            color: var(--muted);
            margin-bottom: 8px;
            letter-spacing:.2px;
        }

        .input{
            display:flex;
            align-items:center;
            gap:12px;
            padding: 10px 0;
            background: transparent;
            border: none;
            border-bottom: 1px solid var(--line);
            transition: border-color .18s ease;
        }
        .input:focus-within{ border-bottom-color: #2563eb; }

        .input input, .input select, .input textarea{
            border:none;
            outline:none;
            width:100%;
            font-size: 15px;
            background: transparent;
            color: #0f172a;
            padding: 6px 0;
        }

        .input textarea{
            min-height: 170px;
            resize: vertical;
            line-height: 1.6;
        }

        .checks{
            display:flex;
            gap: 12px;
            flex-wrap: wrap;
            padding: 10px 0 6px;
            border-bottom: 1px solid var(--line);
        }
        .check{
            display:flex;
            align-items:center;
            gap:8px;
            font-size: 13px;
            color: #0f172a;
            font-weight: 700;
        }
        .check input{ width: 16px; height: 16px; accent-color: var(--red); }

        .actions{
            margin-top: 18px;
            display:flex;
            gap: 12px;
            flex-wrap: wrap;
            justify-content: flex-end;
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
        .btn:hover{ filter: brightness(.97); transform: translateY(-1px); }
        .btn:active{ transform: translateY(0); }

        .btn-secondary{
            color: var(--blue);
            background: rgba(37,99,235,.10);
            border: 1px solid rgba(37,99,235,.18);
        }

        .foot{
            margin-top: 18px;
            text-align:center;
            font-size: 12px;
            color: var(--muted);
        }

        @media (max-width: 980px){
            .regbar{ flex-direction: column; align-items:flex-start; }
            .regbar-logos{ align-self:flex-end; }
            .panel{ padding: 24px 18px 20px; }
            .grid{ grid-template-columns: 1fr; gap: 10px; }
            .full{ grid-column: auto; }
            .panel-head{ flex-direction: column; align-items:flex-start; }
            .actions{ justify-content: stretch; }
            .btn, .btn-secondary{ width:100%; }
        }

        /* Print friendly */
        @media print{
            body{ background:#fff; }
            .topbar, .regbar, .actions, .foot{ display:none !important; }
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
            <div class="regbar-topline">
                <span class="chip">NURSE MODULE</span>
                <span class="regbar-title">Patient <span style="color:var(--yellow); font-weight:950;">Nurse’s Notes</span></span>
            </div>
            <div class="regbar-sub">
                Fill in patient info and write nursing notes. You can print this page for documentation.
            </div>
            <div class="regbar-note">
                Complete • Clear • Accurate
            </div>
        </div>

        <div class="regbar-logos">
            <img src="{{ asset('images/LaUnionAgkaysa.png') }}" alt="Agkaysa">
        </div>
    </div>

    <section class="panel">
        <div class="panel-head">
            <div>
                <h2>Nurse’s Notes</h2>
                <p>Based on LUMC paper form layout — digital version for faster encoding.</p>
            </div>
            <div class="badge">
                <span class="dot"></span>
                For hospital use
            </div>
        </div>

        {{-- For now demo only. Later: connect to DB + controller --}}
{{-- <form method="POST" action="{{ route('nurse.notes.store') }}">
    @csrf@if(session('success'))
    <div style="margin-top:14px; padding:12px 14px; border-radius:12px; background: rgba(34,197,94,.10); border: 1px solid rgba(34,197,94,.18); color:#166534; font-weight:900;">
        ✅ {{ session('success') }}
    </div>
@endif

@if ($errors->any())
    <div style="margin-top:14px; padding:12px 14px; border-radius:12px; background: rgba(220,38,38,.08); border: 1px solid rgba(220,38,38,.18); color:#7f1d1d; font-weight:900;">
        Please check your inputs.
    </div>
@endif --}}
<form method="POST" action="{{ route('nurse.notes.store') }}">
    @csrf

    @if(session('success'))
        <div style="margin-top:14px; padding:12px 14px; border-radius:12px; background: rgba(34,197,94,.10); border: 1px solid rgba(34,197,94,.18); color:#166534; font-weight:900;">
            ✅ {{ session('success') }}
        </div>
    @endif

    @if ($errors->any())
        <div style="margin-top:14px; padding:12px 14px; border-radius:12px; background: rgba(220,38,38,.08); border: 1px solid rgba(220,38,38,.18); color:#7f1d1d; font-weight:900;">
            Please check your inputs.
        </div>
    @endif
            <div class="grid">

                <div class="field">
                    <span class="label">Patient’s Name (Last)</span>
                    <div class="input">
                        <input name="last_name" placeholder="Last name">
                    </div>
                </div>

                <div class="field">
                    <span class="label">Patient’s Name (Given)</span>
                    <div class="input">
                        <input name="given_name" placeholder="Given name">
                    </div>
                </div>

                <div class="field">
                    <span class="label">Patient’s Name (Middle)</span>
                    <div class="input">
                        <input name="middle_name" placeholder="Middle name">
                    </div>
                </div>

                <div class="field">
                    <span class="label">Hospital Case No.</span>
                    <div class="input">
                        <input name="hospital_case_no" placeholder="e.g., HOSP-000123">
                    </div>
                </div>

                <div class="field full">
                    <span class="label">Permanent Address</span>
                    <div class="input">
                        <input name="permanent_address" placeholder="House No., Street, Barangay, City, Province">
                    </div>
                </div>

                <div class="field">
                    <span class="label">Tel. No.</span>
                    <div class="input">
                        <input name="tel_no" placeholder="09xxxxxxxxx">
                    </div>
                </div>

                <div class="field">
                    <span class="label">Ward / Service</span>
                    <div class="input">
                        <input name="ward_service" placeholder="e.g., ER / OPD / Ward 2">
                    </div>
                </div>

                <div class="field">
                    <span class="label">Sex</span>
                    <div class="checks">
                        <label class="check"><input type="radio" name="sex" value="M"> M</label>
                        <label class="check"><input type="radio" name="sex" value="F"> F</label>
                    </div>
                </div>

                <div class="field">
                    <span class="label">Civil Status</span>
                    <div class="checks">
                        <label class="check"><input type="radio" name="civil_status" value="S"> S</label>
                        <label class="check"><input type="radio" name="civil_status" value="M"> M</label>
                        <label class="check"><input type="radio" name="civil_status" value="D"> D</label>
                        <label class="check"><input type="radio" name="civil_status" value="W"> W</label>
                        <label class="check"><input type="radio" name="civil_status" value="SP"> SP</label>
                    </div>
                </div>

                <div class="field">
                    <span class="label">Date / Shift</span>
                    <div class="input">
                        <input name="date_shift" placeholder="e.g., Feb 21, 2026 / AM Shift">
                    </div>
                </div>

                <div class="field">
                    <span class="label">Signature</span>
                    <div class="input">
                        <input name="signature" placeholder="Nurse name / e-signature">
                    </div>
                </div>

                <div class="field full">
                    <span class="label">Notes</span>
                    <div class="input">
                        <textarea name="notes" placeholder="Write nurse’s notes here... (assessment, interventions, response, endorsements)"></textarea>
                    </div>
                </div>

            </div>

            <div class="actions">
                <button type="button" class="btn btn-secondary" onclick="window.print()">Print</button>
                <button type="submit" class="btn">Save Notes</button>
            </div>

            <div class="foot">© {{ date('Y') }} LUMC Patient Portal</div>
        </form>
    </section>

</main>
</body>
</html>