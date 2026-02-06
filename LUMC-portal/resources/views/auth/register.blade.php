<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>LUMC | Patient Registration</title>

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

        /* Page */
        .container{
            width: min(1200px, 92vw);
            margin: 26px auto 44px;
        }

        /* ✅ Header bar (TOP) */
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
            box-shadow: 0 18px 40px #1e40af(0,0,0,.16);
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

        /* ✅ BIG REGISTER BOX */
        .panel{
            margin-top: 16px;
            background: rgba(255,255,255,.96);
            border-radius: 24px;
            box-shadow: 0 28px 70px rgba(0,0,0,.22);
            padding: 34px 44px 28px;
            position: relative;
            overflow:hidden;
        }

        /* subtle decorative glow */
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
            font-size: 30px;
            font-weight: 950;
            color: var(--blue);
        }

        .panel-head p{
            margin:8px 0 0;
            color: var(--muted);
            font-size: 14px;
            max-width: 640px;
        }

        .panel-mini{
            text-align:right;
            font-size: 12px;
            color: var(--muted);
            font-weight: 800;
            letter-spacing:.2px;
        }

        /* Form */
        form{ position: relative; z-index: 2; }

        .grid{
            margin-top: 18px;
            display:grid;
            grid-template-columns: 1fr 1fr;
            gap: 14px 28px;
        }
        .full{ grid-column: 1 / -1; }

        .field{ margin-top: 10px; }

        .label{
            display:block;
            font-size:12px;
            font-weight:900;
            color: var(--muted);
            margin-bottom: 8px;
            letter-spacing:.2px;
        }

        /* underline inputs (same style as login) */
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
        .input:focus-within{
            border-bottom-color: #2563eb;
        }

        .input input, .input select{
            border:none;
            outline:none;
            width:100%;
            font-size: 15px;
            background: transparent;
            color: #0f172a;
            padding: 6px 0;
        }

        .input input::placeholder{ color: #94a3b8; }

        .input select{
            appearance: none;
            -webkit-appearance: none;
            -moz-appearance: none;
        }

/* .btn{
    margin-top: 20px;
    width:100%;
    border:none;
    border-radius: 12px;
    padding: 12px 14px;

    font-size: 13px;
    font-weight: 800;
    letter-spacing:.6px;
    text-transform: uppercase;

    background: #dc2626;
    opacity: .92;
    color:#fff;

    box-shadow: 0 8px 14px rgba(0,0,0,.12);
    transition: all .16s ease;
} */
.btn{
    margin-top: 20px;
    width:100%;
    border:none;
    border-radius: 14px;

    /* smaller + calmer */
    padding: 13px 14px;
    font-size: 13px;
    font-weight: 900;
    letter-spacing:.6px;
    text-transform: uppercase;
    cursor:pointer;

    /* softer medical red */
    /* background: linear-gradient(135deg, #ef4444 0%, #dc2626 100%);
    color:#fff; */
    background: linear-gradient(135deg, #5cc93a 0%, #5cc93a 100%);
    color:#fff;
    

    /* subtle shadow (not aggressive) */
    /* box-shadow: 0 10px 18px rgba(220,38,38,.16); */
    /* transition: all .18s ease; */
}

.btn:hover{
    filter: brightness(.97);
    transform: translateY(-1px);
}

.btn:active{
    transform: translateY(0);
    box-shadow: 0 6px 12px rgba(220,38,38,.20);
}

.btn:hover{
    opacity: 1;
}

.login-link{
    margin-top: 14px;
    text-align: center;
    font-size: 13px;
    color: var(--muted);
}

.login-link a{
    margin-left: 6px;
    font-weight: 900;
    color: var(--red);
    text-decoration: none;
}

.login-link a:hover{
    text-decoration: underline;
}

        /* .bottom-row{
            display:flex;
            align-items:center;
            justify-content:space-between;
            gap: 12px;
            margin-top: 14px;
            flex-wrap: wrap;
        }

        .bottom-row .text{
            font-size: 13px;
            color: var(--muted);
        }

        .bottom-row a{
            font-size: 13px;
            font-weight: 900;
            color: var(--red);
            text-decoration:none;
        }
        .bottom-row a:hover{ text-decoration:underline; } */

        .foot{
            margin-top: 16px;
            text-align:center;
            font-size: 12px;
            color: var(--muted);
        }

        @media (max-width: 980px){
            .regbar{
                flex-direction: column;
                align-items:flex-start;
            }
            .regbar-logos{ align-self:flex-end; }
            .panel{ padding: 26px 22px 22px; }
            .grid{ grid-template-columns: 1fr; gap: 10px; }
            .full{ grid-column: auto; }
            .panel-head{ flex-direction: column; align-items:flex-start; }
            .panel-mini{ text-align:left; }
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

    <!-- ✅ TOP BAR -->
    <div class="regbar">
        <div class="regbar-left">
            <div class="regbar-topline">
                <span class="chip">PATIENT REGISTRATION</span>
                <span class="regbar-title">Create your <span style="color:var(--yellow); font-weight:950;">LUMC Account</span></span>
            </div>

            <div class="regbar-sub">
                Fill out patient details and login credentials. You can update the fields later based on your requirements.
            </div>

            <div class="regbar-note">
                Secure • Private • Fast registration
            </div>
        </div>

        <div class="regbar-logos">
            <img src="{{ asset('images/ProvinceofLaUnion.png') }}" alt="Province of La Union">
            <img src="{{ asset('images/LaUnionAgkaysa.png') }}" alt="Agkaysa">
        </div>
    </div>

    <!-- ✅ BIG REGISTER BOX -->
    <section class="panel">
        <div class="panel-head">
            <div>
                <h2>Register</h2>
                <p>Create your patient portal account</p>
            </div>
            <div class="panel-mini">
                Please enter accurate information
            </div>
        </div>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="grid">
                <div class="field">
                    <span class="label">First Name</span>
                    <div class="input">
                        <input name="first_name" value="{{ old('first_name') }}" placeholder="Enter first name" required>
                    </div>
                    <x-input-error :messages="$errors->get('first_name')" class="mt-2" />
                </div>

                <div class="field">
                    <span class="label">Last Name</span>
                    <div class="input">
                        <input name="last_name" value="{{ old('last_name') }}" placeholder="Enter last name" required>
                    </div>
                    <x-input-error :messages="$errors->get('last_name')" class="mt-2" />
                </div>

                <div class="field">
                    <span class="label">Birthdate</span>
                    <div class="input">
                        <input type="date" name="birthdate" value="{{ old('birthdate') }}">
                    </div>
                    <x-input-error :messages="$errors->get('birthdate')" class="mt-2" />
                </div>

                <div class="field">
                    <span class="label">Sex</span>
                    <div class="input">
                        <select name="sex">
                            <option value="" selected>Select</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                            <option value="Other">Other</option>
                        </select>
                    </div>
                    <x-input-error :messages="$errors->get('sex')" class="mt-2" />
                </div>

                <div class="field full">
                    <span class="label">Contact Number</span>
                    <div class="input">
                        <input name="contact_number" value="{{ old('contact_number') }}" placeholder="09xxxxxxxxx">
                    </div>
                    <x-input-error :messages="$errors->get('contact_number')" class="mt-2" />
                </div>

                <div class="field full">
                    <span class="label">Address Line</span>
                    <div class="input">
                        <input name="address_line" value="{{ old('address_line') }}" placeholder="House No., Street">
                    </div>
                    <x-input-error :messages="$errors->get('address_line')" class="mt-2" />
                </div>

                <div class="field">
                    <span class="label">Barangay</span>
                    <div class="input">
                        <input name="barangay" value="{{ old('barangay') }}" placeholder="Barangay">
                    </div>
                    <x-input-error :messages="$errors->get('barangay')" class="mt-2" />
                </div>

                <div class="field">
                    <span class="label">City</span>
                    <div class="input">
                        <input name="city" value="{{ old('city') }}" placeholder="City">
                    </div>
                    <x-input-error :messages="$errors->get('city')" class="mt-2" />
                </div>

                <div class="field">
                    <span class="label">Province</span>
                    <div class="input">
                        <input name="province" value="{{ old('province') }}" placeholder="Province">
                    </div>
                    <x-input-error :messages="$errors->get('province')" class="mt-2" />
                </div>

                <div class="field">
                    <span class="label">Zip Code</span>
                    <div class="input">
                        <input name="zip_code" value="{{ old('zip_code') }}" placeholder="Zip">
                    </div>
                    <x-input-error :messages="$errors->get('zip_code')" class="mt-2" />
                </div>

                <div class="field full">
                    <span class="label">Email</span>
                    <div class="input">
                        <input type="email" name="email" value="{{ old('email') }}" placeholder="Enter email" required>
                    </div>
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <div class="field">
                    <span class="label">Password</span>
                    <div class="input">
                        <input type="password" name="password" placeholder="Create password" required>
                    </div>
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <div class="field">
                    <span class="label">Confirm Password</span>
                    <div class="input">
                        <input type="password" name="password_confirmation" placeholder="Confirm password" required>
                    </div>
                </div>
            </div>

            <button class="btn" type="submit">Create Account</button>

            <!-- <div class="bottom-row">
                <div class="text">Already have an account?</div>
                <a href="{{ route('login') }}">Sign in</a>
            </div> -->
            <div class="login-link">
    Already have an account?
    <a href="{{ route('login') }}">Sign in</a>
</div>


            <div class="foot">© {{ date('Y') }} LUMC Patient Portal</div>
        </form>
    </section>

</main>
</body>
</html>
