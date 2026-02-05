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
            --red:#dc2626;
            --muted:#64748b;
            --white:#ffffff;
            --yellow:#facc15;
            --line:#dbe3f0;
        }

        *{ box-sizing:border-box; }

        body{
            margin:0;
            background: linear-gradient(135deg, #0b2e7a 0%, #1e40af 50%, #2563eb 100%);
            font-family: ui-sans-serif, system-ui, -apple-system, Segoe UI, Roboto, Arial, sans-serif;
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

        /* Main wrapper */
        .container{
            width: min(1200px, 92vw);
            margin: 38px auto;
        }

        /* ONE BIG CARD */
        .panel{
            background: rgba(255,255,255,.10); /* less visible border/box */
            border-radius: 24px;
            overflow:hidden;
            display:grid;
            grid-template-columns: 1.15fr .85fr;
            min-height: 560px;

            /* softer shadow (not too boxed) */
            box-shadow: 0 25px 60px rgba(0,0,0,.18);
            backdrop-filter: blur(6px);
        }

        /* LEFT BLUE PANEL */
        .hero{
            padding: 54px 52px;
            color: #fff;
            background: linear-gradient(145deg, #0b2e7a 0%, #1e3a8a 45%, #1e40af 100%);
            position: relative;
            overflow:hidden;
        }
        .hero::after{
            content:"";
            position:absolute;
            right:-160px;
            bottom:-160px;
            width:420px;height:420px;
            border-radius:50%;
            background: rgba(255,255,255,.10);
        }
        .hero::before{
            content:"";
            position:absolute;
            inset:0;
            background: radial-gradient(circle at top left, rgba(255,255,255,.12), transparent 60%);
        }

        .hero-pill{
            display:inline-flex;
            align-items:center;
            background: rgba(255,255,255,.15);
            padding:10px 16px;
            border-radius: 999px;
            font-weight:900;
            letter-spacing:.6px;
            font-size:12px;
            position:relative;
            z-index:2;
        }

        .hero-title{
            margin-top:18px;
            font-size: 56px;
            font-weight: 950;
            line-height:1.03;
            position:relative;
            z-index:2;
        }
        .hero-title span{ color: var(--yellow); }

        .hero-desc{
            margin-top:16px;
            max-width: 560px;
            color: rgba(255,255,255,.92);
            line-height:1.7;
            font-size: 16px;
            position:relative;
            z-index:2;
        }

        .hero-badges{
            margin-top: 26px;
            display:flex;
            gap: 14px;
            flex-wrap: wrap;
            position: relative;
            z-index: 2;
        }
        .badge{
            background: rgba(255,255,255,.10);
            border: 1px solid rgba(255,255,255,.18);
            padding: 12px 14px;
            border-radius: 12px;
            display:flex;
            align-items:center;
            gap:12px;
            min-width: 240px;
        }
        .badge img{height:34px; object-fit:contain;}
        .badge .txt{font-size:12px; opacity:.95; font-weight:800; letter-spacing:.3px;}

        /* RIGHT LOGIN PANEL */
        .card{
            padding: 54px 56px;
            background: rgba(255,255,255,.95); /* soft, not too boxed */
            display:flex;
            flex-direction: column;
            justify-content: center;
        }

        .card h2{
            margin:0;
            font-size: 30px;
            font-weight: 950;
            color: var(--blue);
        }
        .card p{
            margin:10px 0 0;
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

        /* ✅ INPUTS — NO BOX, NO BORDER, JUST CLEAN LINE */
        .input{
            display:flex;
            align-items:center;
            gap:12px;

            padding: 10px 0;        /* no padding box */
            background: transparent; /* no background box */
            border: none;            /* no border box */
            border-bottom: 1px solid var(--line); /* only underline */
            border-radius: 0;

            transition: border-color .18s ease;
        }
        .input:focus-within{
            border-bottom-color: #2563eb;
            box-shadow: none;
        }

        /* icon looks like normal inline */
        .icon{
            background: transparent;
            width:auto;
            height:auto;
            color: #64748b;
            font-size: 16px;
            line-height: 1;
            padding: 0;
        }

        .input input{
            border:none;
            outline:none;
            width:100%;
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
            color: var(--red);
            text-decoration:none;
        }
        .link:hover{ text-decoration:underline; }

        .btn{
            margin-top: 22px;
            width:100%;
            border:none;
            border-radius: 14px;
            padding: 15px 16px;
            font-weight: 950;
            letter-spacing:.8px;
            text-transform: uppercase;
            cursor:pointer;
            background: var(--red);
            color:#fff;
            transition:.15s ease;
        }
        .btn:hover{ filter: brightness(.95); transform: translateY(-1px); }
        .btn:active{ transform: translateY(0); }

        .foot{
            margin-top: 16px;
            text-align:center;
            font-size: 12px;
            color: var(--muted);
        }

        /* RESPONSIVE */
        @media (max-width: 980px){
            .panel{ grid-template-columns: 1fr; }
            .card{ border-top: 1px solid rgba(255,255,255,.35); }
            .hero-title{ font-size: 44px; }
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
    <div class="panel">
        <!-- LEFT -->
        <section class="hero">
            <div class="hero-pill">PATIENT PORTAL</div>

            <div class="hero-title">
                Login to your<br>
                <span>LUMC Account</span>
            </div>

            <div class="hero-desc">
                Access your records, appointments, and hospital services.
                Please sign in using your registered email and password.
            </div>

            <div class="hero-badges">
                <div class="badge">
                    <img src="{{ asset('images/ProvinceofLaUnion.png') }}" alt="Province">
                    <div class="txt">Province of La Union</div>
                </div>

                <div class="badge">
                    <img src="{{ asset('images/LaUnionAgkaysa.png') }}" alt="Agkaysa">
                    <div class="txt">Agkaysa</div>
                </div>
            </div>
        </section>

        <!-- RIGHT -->
        <section class="card">
            <h2>Sign in</h2>
            <p>Use your patient portal account</p>

            <x-auth-session-status class="mb-4" :status="session('status')" />

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="field">
                    <span class="label">Email</span>
                    <div class="input">
                        <div class="icon">👤</div>
                        <input type="email" name="email" value="{{ old('email') }}"
                               placeholder="Enter your email" required autofocus>
                    </div>
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <div class="field">
                    <span class="label">Password</span>
                    <div class="input">
                        <div class="icon">🔒</div>
                        <input type="password" name="password"
                               placeholder="Enter your password" required autocomplete="current-password">
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
