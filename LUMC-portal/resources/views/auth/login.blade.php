<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>LUMC | Patient Portal Login</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        :root{
            --blue:#0b2e7a;
            --blue2:#1e40af;
            --blue3:#2563eb;

            --text:#0f172a;
            --muted:#64748b;
            --white:#ffffff;

            --card:#ffffff;
            --line:#e2e8f0;

            --shadow: 0 25px 60px rgba(0,0,0,.18);

            --green1:#22c55e;
            --green2:#16a34a;

            --red1:#ef4444;
            --red2:#dc2626;
        }

        *{ box-sizing:border-box; }

        body{
            margin:0;
            background:
                radial-gradient(1200px 600px at 15% 10%, rgba(255,255,255,.15), transparent 60%),
                radial-gradient(900px 500px at 85% 20%, rgba(239,68,68,.10), transparent 55%),
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
            width: min(1300px, 92vw);
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

        /* Main wrapper */
        .container{
            width: min(1300px, 92vw);
            margin: 34px auto 46px;
        }

        /* BIG GLASS PANEL */
        .panel{
            border-radius: 26px;
            overflow:hidden;
            display:grid;
            grid-template-columns: 1.35fr .65fr;
            min-height: 660px;

            background: rgba(255,255,255,.10);
            border: 1px solid rgba(255,255,255,.18);
            box-shadow: var(--shadow);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
        }

        /* LEFT DASH */
        .dash{
            padding: 34px 34px 28px;
            position: relative;
        }

        .dash-title{
            color: rgba(255,255,255,.96);
            font-size: 46px;
            font-weight: 950;
            letter-spacing: .3px;
            margin: 6px 0 10px;
            line-height: 1.1;
        }

        .dash-sub{
            color: rgba(255,255,255,.88);
            font-size: 14px;
            line-height: 1.65;
            max-width: 860px;
            margin: 0 0 18px;
        }

        .cards{
            display:grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 18px;
            margin-top: 10px;
        }

        .stat-card{
            border-radius: 20px;
            padding: 22px 22px 18px;
            color: #fff;
            box-shadow: 0 18px 35px rgba(0,0,0,.20);
            position: relative;
            overflow: hidden;
        }

        .stat-card::after{
            content:"";
            position:absolute;
            right:-70px;
            bottom:-70px;
            width:210px;
            height:210px;
            border-radius:50%;
            background: rgba(255,255,255,.12);
        }

        .stat-top{
            display:flex;
            align-items:center;
            justify-content:space-between;
            gap: 12px;
            margin-bottom: 14px;
        }

        .stat-label{
            font-weight: 900;
            letter-spacing: .6px;
            font-size: 14px;
            text-transform: uppercase;
            opacity: .95;
        }

        .stat-pill{
            font-size: 12px;
            font-weight: 900;
            padding: 8px 12px;
            border-radius: 999px;
            background: rgba(0,0,0,.18);
            border: 1px solid rgba(255,255,255,.22);
            letter-spacing: .3px;
            white-space: nowrap;
        }

        .stat-number{
            font-size: 42px;
            font-weight: 950;
            letter-spacing: .5px;
            margin: 2px 0 6px;
        }

        .stat-sub{
            font-size: 13px;
            opacity: .92;
            margin-bottom: 14px;
        }

        .stat-list{
            display:grid;
            gap: 8px;
            font-size: 13px;
            opacity: .96;
        }
        .stat-row{
            display:flex; justify-content:space-between;
            border-top: 1px solid rgba(255,255,255,.18);
            padding-top: 8px;
        }
        .stat-row:first-child{ border-top:none; padding-top:0; }

        /* Card colors */
        .c-blue{ background: linear-gradient(180deg, #3b82f6 0%, #2563eb 100%); }
        .c-green{ background: linear-gradient(180deg, #22c55e 0%, #16a34a 100%); }
        .c-red{ background: linear-gradient(180deg, #ef4444 0%, #dc2626 100%); }
        .c-purple{ background: linear-gradient(180deg, #6366f1 0%, #4f46e5 100%); }

        /* Bottom info strip */
        .strip{
            margin-top: 18px;
            display:grid;
            grid-template-columns: 1fr 1fr 1fr;
            gap: 18px;
        }
        .mini{
            border-radius: 18px;
            background: rgba(255,255,255,.92);
            padding: 16px 18px 14px;
            box-shadow: 0 18px 35px rgba(0,0,0,.12);
        }
        .mini-title{
            font-weight: 950;
            font-size: 13px;
            color: #1f2937;
            display:flex;
            align-items:center;
            justify-content:space-between;
            gap:10px;
        }
        .mini-badge{
            font-size: 11px;
            font-weight: 950;
            padding: 6px 10px;
            border-radius: 999px;
            background: #eef2ff;
            color: #1e40af;
        }
        .mini-num{
            font-size: 30px;
            font-weight: 950;
            margin: 8px 0 2px;
            color: #0f172a;
        }
        .mini-sub{
            font-size: 12px;
            color: var(--muted);
            line-height: 1.5;
        }
        .mini-sub strong{ color:#0f172a; }

        /* RIGHT LOGIN */
        .login{
            padding: 44px 46px;
            background: rgba(255,255,255,.96);
            border-left: 1px solid rgba(255,255,255,.18);
            display:flex;
            flex-direction: column;
            justify-content:center;
            position: relative;
        }

        /* ✅ Logos moved to WHITE side */
        .login-logos{
            position:absolute;
            top: 18px;
            right: 18px;
            display:flex;
            align-items:center;
            gap: 10px;
        }
        .logo-pill{
            display:flex;
            align-items:center;
            gap: 10px;
            padding: 10px 12px;
            border-radius: 999px;
            background: #ffffff;
            border: 1px solid #e5e7eb;
            box-shadow: 0 10px 25px rgba(15,23,42,.08);
            max-width: 220px;
        }
        .logo-pill img{
            height: 26px;
            width: 26px;
            object-fit: contain;
            flex: 0 0 auto;
        }
        .logo-pill span{
            font-size: 12px;
            font-weight: 950;
            color: #0f172a;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .login h2{
            margin:0;
            font-size: 28px;
            font-weight: 950;
            color: var(--blue);
        }
        .login p{
            margin: 10px 0 0;
            color: var(--muted);
            font-size: 14px;
        }

        .field{ margin-top: 22px; }

        .label{
            display:block;
            font-size:12px;
            font-weight:900;
            color: var(--muted);
            margin-bottom: 8px;
            letter-spacing:.2px;
        }

        /* Underline input style */
        .input{
            display:flex;
            align-items:center;
            gap:12px;
            padding: 10px 0;
            border-bottom: 1px solid var(--line);
        }
        .input:focus-within{ border-bottom-color: var(--blue3); }

        .ico{
            width:22px; height:22px;
            display:inline-flex; align-items:center; justify-content:center;
        }
        .ico svg{ width:20px; height:20px; fill:#94a3b8; }

        .input input{
            border:none; outline:none; width:100%;
            font-size: 15px;
            background: transparent;
            color: #0f172a;
            padding: 6px 0;
        }

        .row{
            display:flex;
            align-items:center;
            justify-content:space-between;
            gap:10px;
            margin-top: 18px;
        }

        .remember{
            display:flex;
            align-items:center;
            gap:10px;
            color: var(--muted);
            font-size: 13px;
        }

        .link{
            font-size: 13px;
            font-weight: 900;
            color: #dc2626;
            text-decoration:none;
        }
        .link:hover{ text-decoration:underline; }

        /* ✅ Login button GREEN (minimal, not danger) */
        .btn{
            margin-top: 22px;
            width:100%;
            border:none;
            border-radius: 12px;
            padding: 12px 16px;
            font-weight: 950;
            letter-spacing:.8px;
            text-transform: uppercase;
            cursor:pointer;
            background: linear-gradient(135deg, var(--blue) 0%, var(--blue2) 100%);
            color:#fff;
            transition:.15s ease;
        }
        .btn:hover{ filter: brightness(.98); transform: translateY(-1px); }
        .btn:active{ transform: translateY(0); }

        .foot{
            margin-top: 16px;
            text-align:center;
            font-size: 12px;
            color: var(--muted);
        }

        /* RESPONSIVE */
        @media (max-width: 1100px){
            .cards{ grid-template-columns: 1fr; }
            .strip{ grid-template-columns: 1fr; }
        }
        @media (max-width: 980px){
            .panel{ grid-template-columns: 1fr; }
            .login{
                border-left:none;
                border-top: 1px solid rgba(255,255,255,.18);
                padding-top: 64px; /* room for logos */
            }
            .dash-title{ font-size: 38px; }
            .login-logos{ top: 14px; right: 14px; }
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

@php
    // ✅ LUMC stats based on your research (static for now)
    $pop = 740000;
    $outpatients = 490581;
    $inpatients  = 137593;
    $totalServed = 628174;

    $coveragePct = $pop > 0 ? round(($totalServed / $pop) * 100, 1) : 0;

    $classCharity   = 48;
    $classPhilhealth= 45;
    $classPrivate   = 7;

    $budgetAnnual = 40000000;
    $budgetProv   = 35000000;
    $budgetEdf    = 5000000;
    $targetGen    = 100000000;
@endphp

<main class="container">
    <div class="panel">

        <!-- LEFT: DASH STATS -->
        <section class="dash">
            <div class="dash-title">LA UNION MEDICAL CENTER (LUMC)</div>

            <div class="dash-sub">
                Province of La Union estimated population: <strong>{{ number_format($pop) }}</strong>.
                Over the last <strong>10 years</strong>, LUMC served <strong>{{ number_format($totalServed) }}</strong> patients
                (<strong>{{ $coveragePct }}%</strong> of the population; more than 50%).
            </div>

            <div class="cards">
                <!-- OUT-PATIENTS -->
                <div class="stat-card c-blue">
                    <div class="stat-top">
                        <div class="stat-label">Outpatients</div>
                        <div class="stat-pill">10-year total</div>
                    </div>

                    <div class="stat-number">{{ number_format($outpatients) }}</div>
                    <div class="stat-sub">Total out-patients served</div>

                    <div class="stat-list">
                        <div class="stat-row"><span>Share of total served</span><strong>{{ round(($outpatients/$totalServed)*100, 1) }}%</strong></div>
                        <div class="stat-row"><span>Primary service type</span><strong>OPD</strong></div>
                    </div>
                </div>

                <!-- IN-PATIENTS -->
                <div class="stat-card c-green">
                    <div class="stat-top">
                        <div class="stat-label">Inpatients</div>
                        <div class="stat-pill">10-year total</div>
                    </div>

                    <div class="stat-number">{{ number_format($inpatients) }}</div>
                    <div class="stat-sub">Total in-patients served</div>

                    <div class="stat-list">
                        <div class="stat-row"><span>Share of total served</span><strong>{{ round(($inpatients/$totalServed)*100, 1) }}%</strong></div>
                        <div class="stat-row"><span>Primary service type</span><strong>Admission</strong></div>
                    </div>
                </div>

                <!-- TOTAL SERVED -->
                <div class="stat-card c-red">
                    <div class="stat-top">
                        <div class="stat-label">Total Patients Served</div>
                        <div class="stat-pill">10 years</div>
                    </div>

                    <div class="stat-number">{{ number_format($totalServed) }}</div>
                    <div class="stat-sub">Outpatients + Inpatients</div>

                    <div class="stat-list">
                        <div class="stat-row"><span>Population coverage</span><strong>{{ $coveragePct }}%</strong></div>
                        <div class="stat-row"><span>Note</span><strong>> 50% of province</strong></div>
                    </div>
                </div>
            </div>

            <div class="strip">
                <!-- PATIENT CLASSIFICATION -->
                <div class="mini">
                    <div class="mini-title">
                        Patient Classification
                        <span class="mini-badge">Last 10 years</span>
                    </div>
                    <div class="mini-num">{{ $classCharity }}% / {{ $classPhilhealth }}% / {{ $classPrivate }}%</div>
                    <div class="mini-sub">
                        <strong>Charity:</strong> {{ $classCharity }}% &nbsp; • &nbsp;
                        <strong>PhilHealth:</strong> {{ $classPhilhealth }}% &nbsp; • &nbsp;
                        <strong>Private:</strong> {{ $classPrivate }}%
                    </div>
                </div>

                <!-- ANNUAL BUDGET -->
                <div class="mini">
                    <div class="mini-title">
                        Annual Budget
                        <span class="mini-badge">₱ {{ number_format($budgetAnnual/1000000,0) }}M</span>
                    </div>
                    <div class="mini-num">₱{{ number_format($budgetAnnual) }}</div>
                    <div class="mini-sub">
                        Provincial assistance: <strong>₱{{ number_format($budgetProv) }}</strong><br>
                        Governor’s EDF: <strong>₱{{ number_format($budgetEdf) }}</strong>
                    </div>
                </div>

                <!-- TARGET GENERATION -->
                <div class="mini">
                    <div class="mini-title">
                        Sustainability Target
                        <span class="mini-badge">Goal</span>
                    </div>
                    <div class="mini-num">₱{{ number_format($targetGen) }}</div>
                    <div class="mini-sub">
                        Cost recovery & revenue enhancement program target to sustain operations.
                    </div>
                </div>
            </div>
        </section>

        <!-- RIGHT: LOGIN -->
        <section class="login">
            <!-- ✅ Logos moved here (white side) -->
            <div class="login-logos" aria-label="Partner logos">
                <div class="logo-pill">
                    <img src="{{ asset('images/ProvinceofLaUnion.png') }}" alt="Province of La Union">
                    <span>Province of La Union</span>
                </div>
                <div class="logo-pill">
                    <img src="{{ asset('images/LaUnionAgkaysa.png') }}" alt="Agkaysa">
                    <span>Agkaysa</span>
                </div>
            </div>

            <h2>Sign in</h2>
            <p>Use your patient portal account</p>

            <x-auth-session-status class="mb-4" :status="session('status')" />

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="field">
                    <span class="label">Email</span>
                    <div class="input">
                        <span class="ico" aria-hidden="true">
                            <svg viewBox="0 0 24 24"><path d="M12 12a4 4 0 1 0-4-4 4 4 0 0 0 4 4Zm0 2c-4.4 0-8 2-8 4.5V21h16v-2.5c0-2.5-3.6-4.5-8-4.5Z"/></svg>
                        </span>
                        <input type="email" name="email" value="{{ old('email') }}" placeholder="Enter your email" required autofocus>
                    </div>
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <div class="field">
                    <span class="label">Password</span>
                    <div class="input">
                        <span class="ico" aria-hidden="true">
                            <svg viewBox="0 0 24 24"><path d="M17 9h-1V7a4 4 0 0 0-8 0v2H7a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2v-8a2 2 0 0 0-2-2ZM10 7a2 2 0 0 1 4 0v2h-4Z"/></svg>
                        </span>
                        <input type="password" name="password" placeholder="Enter your password" required autocomplete="current-password">
                    </div>
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <div class="row">
                    <label class="remember">
                        <input type="checkbox" name="remember">
                        Remember me
                    </label>

                    @if (Route::has('password.request'))
                        <a class="link" href="{{ route('password.request') }}">Forgot password?</a>
                    @endif
                </div>

                <button class="btn" type="submit">Login</button>
                <div class="foot">© {{ date('Y') }} LUMC Patient Portal</div>
            </form>
        </section>

    </div>
</main>
</body>
</html>
