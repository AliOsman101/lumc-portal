<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>LUMC | Patient Personal Profile</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        :root{
            --blue:#0b2e7a;
            --blue2:#1e40af;
            --blue3:#2563eb;

            --muted:#64748b;
            --text:#0f172a;
            --white:#ffffff;

            --line:#dbe3f0;
            --yellow:#facc15;

            --shadow: 0 28px 70px rgba(0,0,0,.22);
        }

        *{ box-sizing:border-box; }

        body{
            margin:0;
            background:
                radial-gradient(1200px 600px at 15% 10%, rgba(255,255,255,.15), transparent 60%),
                radial-gradient(900px 500px at 85% 20%, rgba(250,204,21,.10), transparent 55%),
                linear-gradient(135deg, var(--blue) 0%, var(--blue2) 55%, var(--blue3) 100%);
            font-family: ui-sans-serif, system-ui, -apple-system, Segoe UI, Roboto, Arial, sans-serif;
            color: var(--text);
        }

        /* Topbar */
        .topbar{
            background:#fff;
            box-shadow: 0 6px 20px rgba(0,0,0,.08);
        }
        .topbar .wrap{
            width: min(1200px, 92vw);
            margin: auto;
            height: 74px;
            display:flex;
            align-items:center;
            justify-content:space-between;
            gap: 16px;
        }
        .brand{
            display:flex; align-items:center; gap:12px;
            font-weight:900; letter-spacing:.6px;
            color: var(--blue);
        }
        .brand img{height:46px; width:46px; object-fit:contain;}
        .brand span{font-size:16px;}
        .top-logos img{height:42px; object-fit:contain;}

        .container{
            width: min(1200px, 92vw);
            margin: 26px auto 44px;
        }

        /* slim info bar */
        .infobar{
            background: rgba(255,255,255,.14);
            border: 1px solid rgba(255,255,255,.22);
            border-radius: 18px;
            padding: 14px 16px;
            color: rgba(255,255,255,.95);
            display:flex;
            align-items:center;
            justify-content:space-between;
            gap: 18px;
            box-shadow: 0 18px 40px rgba(0,0,0,.16);
            backdrop-filter: blur(8px);
            -webkit-backdrop-filter: blur(8px);
        }
        .infobar-left{
            display:flex;
            flex-direction: column;
            gap: 6px;
        }
        .infobar-topline{
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
        .infobar-title{
            font-weight: 950;
            font-size: 14px;
            letter-spacing:.3px;
            color: rgba(255,255,255,.96);
        }
        .infobar-sub{
            font-size: 12px;
            color: rgba(255,255,255,.85);
            line-height: 1.4;
            max-width: 760px;
        }

        .infobar-logos{
            display:flex;
            align-items:center;
            gap: 12px;
        }
        .infobar-logos img{
            height: 38px;
            width: auto;
            object-fit: contain;
            filter: drop-shadow(0 10px 18px rgba(0,0,0,.18));
            opacity: .95;
        }

        /* main white card */
        .panel{
            margin-top: 16px;
            background: rgba(255,255,255,.96);
            border-radius: 24px;
            box-shadow: var(--shadow);
            padding: 32px 44px 26px;
            position: relative;
            overflow:hidden;
        }
        .panel::before{
            content:"";
            position:absolute;
            left:-120px;
            top:-140px;
            width:320px;
            height:320px;
            border-radius:50%;
            background: radial-gradient(circle, rgba(37,99,235,.18), transparent 62%);
            pointer-events:none;
        }
        .panel::after{
            content:"";
            position:absolute;
            right:-140px;
            bottom:-160px;
            width:380px;
            height:380px;
            border-radius:50%;
            background: radial-gradient(circle, rgba(250,204,21,.10), transparent 62%);
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
        }
        .form-code{
            font-size: 12px;
            color: var(--muted);
            font-weight: 900;
            letter-spacing:.2px;
        }

        form{ position: relative; z-index: 2; }

        .section{
            margin-top: 18px;
            padding-top: 14px;
            border-top: 1px dashed rgba(15,23,42,.10);
        }
        .section:first-of-type{
            border-top:none;
            padding-top: 0;
        }
        .section-title{
            font-weight: 950;
            color: #1f2937;
            font-size: 13px;
            letter-spacing: .7px;
            text-transform: uppercase;
            margin: 0 0 10px;
        }

        .grid{
            display:grid;
            grid-template-columns: 1fr 1fr;
            gap: 14px 28px;
        }
        .grid-3{
            display:grid;
            grid-template-columns: 1fr 1fr 1fr;
            gap: 14px 18px;
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

        /* underline inputs */
        .input{
            display:flex;
            align-items:center;
            gap:12px;
            padding: 10px 0;
            border-bottom: 1px solid var(--line);
            transition: border-color .18s ease;
        }
        .input:focus-within{ border-bottom-color: var(--blue3); }

        .input input, .input select, .input textarea{
            border:none;
            outline:none;
            width:100%;
            font-size: 15px;
            background: transparent;
            color: #0f172a;
            padding: 6px 0;
            font-family: inherit;
        }
        .input textarea{
            min-height: 70px;
            resize: vertical;
        }
        .input input::placeholder, .input textarea::placeholder{ color: #94a3b8; }

        .row-2{
            display:grid;
            grid-template-columns: 1fr 1fr;
            gap: 14px 28px;
        }

        .actions{
            margin-top: 18px;
            display:flex;
            gap: 10px;
            flex-wrap: wrap;
            justify-content: flex-end;
        }

        .btn{
            border:none;
            border-radius: 12px;
            padding: 12px 16px;
            font-size: 13px;
            font-weight: 950;
            letter-spacing:.6px;
            text-transform: uppercase;
            cursor:pointer;
            transition: all .16s ease;
        }
        .btn-primary{
            background: linear-gradient(135deg, #22c55e 0%, #16a34a 100%);
            color:#fff;
            box-shadow: 0 10px 18px rgba(22,163,74,.18);
        }
        .btn-primary:hover{ transform: translateY(-1px); filter: brightness(.98); }
        .btn-secondary{
            background: #eef2ff;
            color: #1e40af;
            border: 1px solid rgba(30,64,175,.18);
        }
        .btn-secondary:hover{ filter: brightness(.99); transform: translateY(-1px); }

        .foot{
            margin-top: 16px;
            text-align:center;
            font-size: 12px;
            color: var(--muted);
        }

        @media (max-width: 980px){
            .infobar{ flex-direction: column; align-items:flex-start; }
            .infobar-logos{ align-self:flex-end; }
            .panel{ padding: 26px 22px 22px; }
            .grid, .row-2{ grid-template-columns: 1fr; gap: 10px; }
            .grid-3{ grid-template-columns: 1fr; }
            .panel-head{ flex-direction: column; align-items:flex-start; }
            .actions{ justify-content: stretch; }
            .actions .btn{ width: 100%; }
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
            <img src="{{ asset('images/BagongPilipinas.png') }}" alt="Bagong Pilipinas">
        </div>
    </div>
</header>

<main class="container">

    <!-- top info bar -->
    <div class="infobar">
        <div class="infobar-left">
            <div class="infobar-topline">
                <span class="chip">PATIENT PERSONAL PROFILE</span>
                <span class="infobar-title">Record & Vital Signs Form</span>
            </div>
            <div class="infobar-sub">
                Fill out accurate details (based on LUMC paper form). This can be connected to the patient account later.
            </div>
        </div>

        <div class="infobar-logos">
            <img src="{{ asset('images/ProvinceofLaUnion.png') }}" alt="Province of La Union">
            <img src="{{ asset('images/LaUnionAgkaysa.png') }}" alt="Agkaysa">
        </div>
    </div>

    <section class="panel">
        <div class="panel-head">
            <div>
                <h2>Patient’s Personal Profile</h2>
                <p>Basic profile + case summary + vital signs</p>
            </div>
            <div class="form-code">NUR-026-Ø</div>
        </div>

        <form method="POST" action="#">
            @csrf

            <!-- TOP META -->
            <div class="section">
                <p class="section-title">Visit Information</p>

                <div class="grid">
                    <div>
                        <span class="label">Date</span>
                        <div class="input">
                            <input type="date" name="visit_date">
                        </div>
                    </div>

                    <div>
                        <span class="label">Time</span>
                        <div class="input">
                            <input type="time" name="visit_time">
                        </div>
                    </div>

                    <div>
                        <span class="label">Services</span>
                        <div class="input">
                            <input name="service" placeholder="e.g., OPD, ER, Admission">
                        </div>
                    </div>

                    <div>
                        <span class="label">Hospital No.</span>
                        <div class="input">
                            <input name="hospital_no" placeholder="Enter hospital number">
                        </div>
                    </div>
                </div>
            </div>

            <!-- PERSONAL DETAILS -->
            <div class="section">
                <p class="section-title">Personal Details</p>

                <div class="grid-3">
                    <div>
                        <span class="label">Family Name</span>
                        <div class="input">
                            <input name="last_name" placeholder="Family name">
                        </div>
                    </div>

                    <div>
                        <span class="label">First Name</span>
                        <div class="input">
                            <input name="first_name" placeholder="First name">
                        </div>
                    </div>

                    <div>
                        <span class="label">Middle Name</span>
                        <div class="input">
                            <input name="middle_name" placeholder="Middle name">
                        </div>
                    </div>
                </div>

                <div class="grid" style="margin-top:10px;">
                    <div class="full">
                        <span class="label">Address</span>
                        <div class="input">
                            <input name="address" placeholder="Complete address">
                        </div>
                    </div>

                    <div>
                        <span class="label">Birthday</span>
                        <div class="input">
                            <input type="date" name="birthday">
                        </div>
                    </div>

                    <div>
                        <span class="label">Occupation</span>
                        <div class="input">
                            <input name="occupation" placeholder="Occupation">
                        </div>
                    </div>

                    <div>
                        <span class="label">Status</span>
                        <div class="input">
                            <select name="status">
                                <option value="" selected>Select</option>
                                <option>Single</option>
                                <option>Married</option>
                                <option>Widowed</option>
                                <option>Separated</option>
                            </select>
                        </div>
                    </div>

                    <div>
                        <span class="label">Sex</span>
                        <div class="input">
                            <select name="sex">
                                <option value="" selected>Select</option>
                                <option>Male</option>
                                <option>Female</option>
                                <option>Other</option>
                            </select>
                        </div>
                    </div>

                    <div>
                        <span class="label">Age</span>
                        <div class="input">
                            <input type="number" name="age" min="0" placeholder="Age">
                        </div>
                    </div>

                    <div>
                        <span class="label">Spouse</span>
                        <div class="input">
                            <input name="spouse" placeholder="Spouse full name">
                        </div>
                    </div>

                    <div>
                        <span class="label">Father</span>
                        <div class="input">
                            <input name="father" placeholder="Father full name">
                        </div>
                    </div>

                    <div>
                        <span class="label">Mother</span>
                        <div class="input">
                            <input name="mother" placeholder="Mother full name">
                        </div>
                    </div>
                </div>
            </div>

            <!-- CASE SUMMARY -->
            <div class="section">
                <p class="section-title">Patient’s Case Summary</p>

                <div class="grid">
                    <div class="full">
                        <span class="label">Vital Signs / Notes</span>
                        <div class="input">
                            <textarea name="case_summary" placeholder="Write short case summary, complaints, notes..."></textarea>
                        </div>
                    </div>
                </div>
            </div>

            <!-- VITAL SIGNS -->
            <div class="section">
                <p class="section-title">Vital Signs</p>

                <div class="grid-3">
                    <div>
                        <span class="label">Height</span>
                        <div class="input">
                            <input name="height" placeholder="e.g., 160 cm">
                        </div>
                    </div>

                    <div>
                        <span class="label">Weight</span>
                        <div class="input">
                            <input name="weight" placeholder="e.g., 64 kg">
                        </div>
                    </div>

                    <div>
                        <span class="label">Temperature</span>
                        <div class="input">
                            <input name="temperature" placeholder="e.g., 36.8 °C">
                        </div>
                    </div>
                </div>

                <div class="grid" style="margin-top:10px;">
                    <div>
                        <span class="label">Pulse</span>
                        <div class="input">
                            <input name="pulse" placeholder="e.g., 80 bpm">
                        </div>
                    </div>

                    <div>
                        <span class="label">BP</span>
                        <div class="input">
                            <input name="bp" placeholder="e.g., 120/80">
                        </div>
                    </div>

                    <div>
                        <span class="label">RR</span>
                        <div class="input">
                            <input name="rr" placeholder="e.g., 18 rpm">
                        </div>
                    </div>

                    <div>
                        <span class="label">Other Notes</span>
                        <div class="input">
                            <input name="other_notes" placeholder="Optional">
                        </div>
                    </div>
                </div>
            </div>

            <div class="actions">
                <button type="button" class="btn btn-secondary" onclick="history.back()">Back</button>
                <button type="submit" class="btn btn-primary">Save Profile</button>
            </div>

            <div class="foot">© {{ date('Y') }} LUMC Patient Portal</div>
        </form>
    </section>

</main>
</body>
</html>
