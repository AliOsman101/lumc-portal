<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LUMC | Physical Examination</title>

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
            font-family: Arial, Helvetica, sans-serif;
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

        .brand img{
            height:46px;
            width:46px;
            object-fit:contain;
        }

        .top-logos{
            display:flex;
            align-items:center;
            gap:10px;
        }

        .top-logos img{
            height:42px;
            object-fit:contain;
        }

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

        .grid-top{
            margin-top:16px;
            display:grid;
            grid-template-columns: repeat(3, 1fr);
            gap:12px 16px;
        }

        .field label{
            display:block;
            font-size:12px;
            font-weight:900;
            color:var(--muted);
            margin-bottom:6px;
        }

        .field input{
            width:100%;
            border:none;
            outline:none;
            padding:10px 12px;
            border-radius:12px;
            background:#f8fafc;
            border:1px solid #e5e7eb;
            font-size:14px;
        }

        .vitals{
            margin-top:18px;
            display:grid;
            grid-template-columns: repeat(6, 1fr);
            gap:12px;
        }

        .section-title{
            margin-top:20px;
            margin-bottom:10px;
            font-size:14px;
            font-weight:950;
            color:var(--blue);
            letter-spacing:.3px;
        }

        .exam-grid{
            display:grid;
            grid-template-columns: 220px 1fr;
            gap:10px 16px;
            align-items:start;
        }

        .exam-label{
            font-size:13px;
            font-weight:900;
            color:#334155;
            padding-top:10px;
        }

        .exam-box textarea{
            width:100%;
            min-height:54px;
            border:none;
            outline:none;
            padding:12px 14px;
            border-radius:14px;
            background:#f8fafc;
            border:1px solid #e5e7eb;
            font-size:14px;
            resize:vertical;
            font-family: Arial, Helvetica, sans-serif;
        }

        .wide-box{
            margin-top:14px;
        }

        .wide-box textarea,
        .wide-box input{
            width:100%;
            border:none;
            outline:none;
            padding:12px 14px;
            border-radius:14px;
            background:#f8fafc;
            border:1px solid #e5e7eb;
            font-size:14px;
            font-family: Arial, Helvetica, sans-serif;
        }

        .wide-box textarea{
            min-height:72px;
            resize:vertical;
        }

        .actions{
            margin-top:18px;
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
            .grid-top{ grid-template-columns:1fr; }
            .vitals{ grid-template-columns:1fr 1fr; }
            .exam-grid{ grid-template-columns:1fr; }
            .actions .btn,
            .actions .btn-secondary{ width:100%; }
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
            <span class="regbar-title"> • <span style="color:var(--yellow)">Physical Examination</span></span>
            <div class="regbar-sub">
                Digital form for admitting assessment and general physical examination.
            </div>
        </div>

        <div class="regbar-logos">
            <img src="{{ asset('images/LaUnionAgkaysa.png') }}" alt="Agkaysa">
        </div>
    </div>

    <section class="panel">
        <div class="panel-head">
            <div>
                <h2>Physical Examination</h2>
                <p>Digital version inspired by the LUMC paper form.</p>
            </div>
            <div class="badge">
                <span class="dot"></span>
                For hospital use
            </div>
        </div>

        <div class="grid-top">
            <div class="field">
                <label>Last Name</label>
                <input placeholder="Last name">
            </div>
            <div class="field">
                <label>Given Name</label>
                <input placeholder="Given name">
            </div>
            <div class="field">
                <label>Middle Name</label>
                <input placeholder="Middle name">
            </div>
            <div class="field">
                <label>Hospital Case No.</label>
                <input placeholder="Hospital case no.">
            </div>
            <div class="field">
                <label>Ward / Service</label>
                <input placeholder="Ward / service">
            </div>
            <div class="field">
                <label>Telephone No.</label>
                <input placeholder="Telephone no.">
            </div>
        </div>

        <div class="section-title">Vital Signs</div>

        <div class="vitals">
            <div class="field">
                <label>BP</label>
                <input placeholder="Blood pressure">
            </div>
            <div class="field">
                <label>CR</label>
                <input placeholder="Cardiac rate">
            </div>
            <div class="field">
                <label>RR</label>
                <input placeholder="Respiratory rate">
            </div>
            <div class="field">
                <label>PR</label>
                <input placeholder="Pulse rate">
            </div>
            <div class="field">
                <label>TEMP</label>
                <input placeholder="Temperature">
            </div>
            <div class="field">
                <label>O2 SAT</label>
                <input placeholder="Oxygen saturation">
            </div>
        </div>

        <div class="section-title">System Examination</div>

        <div class="exam-grid">
            <div class="exam-label">Skin</div>
            <div class="exam-box"><textarea placeholder="Findings for skin..."></textarea></div>

            <div class="exam-label">Head / ENT</div>
            <div class="exam-box"><textarea placeholder="Findings for head / ENT..."></textarea></div>

            <div class="exam-label">Lymph Nodes</div>
            <div class="exam-box"><textarea placeholder="Findings for lymph nodes..."></textarea></div>

            <div class="exam-label">Chest</div>
            <div class="exam-box"><textarea placeholder="Findings for chest..."></textarea></div>

            <div class="exam-label">Lungs</div>
            <div class="exam-box"><textarea placeholder="Findings for lungs..."></textarea></div>

            <div class="exam-label">Cardiovascular</div>
            <div class="exam-box"><textarea placeholder="Findings for cardiovascular..."></textarea></div>

            <div class="exam-label">Breast</div>
            <div class="exam-box"><textarea placeholder="Findings for breast..."></textarea></div>

            <div class="exam-label">Abdomen</div>
            <div class="exam-box"><textarea placeholder="Findings for abdomen..."></textarea></div>

            <div class="exam-label">Rectum</div>
            <div class="exam-box"><textarea placeholder="Findings for rectum..."></textarea></div>

            <div class="exam-label">Genitalia</div>
            <div class="exam-box"><textarea placeholder="Findings for genitalia..."></textarea></div>

            <div class="exam-label">Musculoskeletal</div>
            <div class="exam-box"><textarea placeholder="Findings for musculoskeletal..."></textarea></div>

            <div class="exam-label">Extremities</div>
            <div class="exam-box"><textarea placeholder="Findings for extremities..."></textarea></div>

            <div class="exam-label">Neurology</div>
            <div class="exam-box"><textarea placeholder="Findings for neurology..."></textarea></div>
        </div>

        <div class="section-title">Clinical Impression</div>

        <div class="wide-box">
            <label style="display:block; font-size:12px; font-weight:900; color:var(--muted); margin-bottom:6px;">Admitting Impression</label>
            <textarea placeholder="Write admitting impression..."></textarea>
        </div>

        <div class="wide-box">
            <label style="display:block; font-size:12px; font-weight:900; color:var(--muted); margin-bottom:6px;">Admitting Physician</label>
            <input placeholder="Physician name">
        </div>

        <div class="actions">
            <button type="button" class="btn btn-secondary" onclick="window.print()">Print</button>
            <button type="button" class="btn">Save</button>
        </div>
    </section>
</main>

</body>
</html>