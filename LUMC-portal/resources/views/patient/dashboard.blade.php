<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>LUMC | Doctor Dashboard</title>

  @vite(['resources/css/app.css', 'resources/js/app.js'])

  <style>
    :root{
      --bg:#f6f7fb;
      --card:#ffffff;
      --line:#e8edf5;

      --text:#0f172a;
      --muted:#64748b;

      --blue:#0b2e7a;
      --blue2:#1e40af;
      --blue3:#2563eb;

      --green:#22c55e;
      --red:#ef4444;
      --yellow:#facc15;

      --shadow: 0 18px 40px rgba(15,23,42,.08);
      --shadow2: 0 10px 22px rgba(15,23,42,.06);

      --radius:18px;
    }

    *{ box-sizing:border-box; }
    body{
      margin:0;
      background: var(--bg);
      font-family: ui-sans-serif, system-ui, -apple-system, Segoe UI, Roboto, Arial, sans-serif;
      color: var(--text);
    }

    /* Layout */
    .app{
      display:grid;
      grid-template-columns: 92px 1fr;
      min-height: 100vh;
    }

    /* Sidebar */
    .side{
      background: #fff;
      border-right: 1px solid var(--line);
      padding: 18px 14px;
      display:flex;
      flex-direction: column;
      align-items:center;
      gap: 16px;
      position: sticky;
      top:0;
      height:100vh;
    }

    .logo{
      width: 44px; height: 44px;
      border-radius: 14px;
      display:flex; align-items:center; justify-content:center;
      background: rgba(37,99,235,.10);
      border: 1px solid rgba(37,99,235,.18);
      overflow:hidden;
    }
    .logo img{ width: 30px; height: 30px; object-fit:contain; }

    .nav{
      width: 100%;
      display:grid;
      gap: 10px;
      margin-top: 6px;
    }
    .nav a{
      width: 100%;
      height: 44px;
      border-radius: 14px;
      display:flex;
      align-items:center;
      justify-content:center;
      text-decoration:none;
      color: #64748b;
      border: 1px solid transparent;
      background: transparent;
      transition: .15s ease;
    }
    .nav a:hover{
      background: rgba(15,23,42,.04);
      border-color: rgba(15,23,42,.06);
      color: var(--text);
    }
    .nav a.active{
      background: rgba(37,99,235,.10);
      border-color: rgba(37,99,235,.18);
      color: var(--blue2);
    }
    .ico{ width: 22px; height: 22px; fill: currentColor; }

    .side-bottom{
      margin-top:auto;
      width:100%;
      display:grid;
      gap: 10px;
    }

    /* Main */
    .main{
      padding: 22px 22px 34px;
    }

    /* Topbar */
    .topbar{
      display:flex;
      align-items:center;
      justify-content:space-between;
      gap: 14px;
      margin-bottom: 18px;
    }

    .leftTop{
      display:flex;
      align-items:center;
      gap: 14px;
      flex: 1;
    }

    .brand{
      display:flex;
      align-items:center;
      gap: 10px;
      font-weight: 950;
      letter-spacing:.4px;
      color: var(--blue);
      white-space: nowrap;
    }
    .brand img{ height: 34px; width: 34px; object-fit:contain; }
    .brand span{ font-size: 14px; }

    .search{
      flex: 1;
      max-width: 520px;
      display:flex;
      align-items:center;
      gap: 10px;
      padding: 12px 14px;
      border-radius: 999px;
      background: #fff;
      border: 1px solid var(--line);
      box-shadow: var(--shadow2);
    }
    .search svg{ width: 18px; height: 18px; fill:#94a3b8; }
    .search input{
      border:none; outline:none;
      width:100%;
      font-size: 13px;
      color: var(--text);
    }

    .rightTop{
      display:flex;
      align-items:center;
      gap: 10px;
    }

    .pillBtn{
      border:none;
      cursor:pointer;
      padding: 10px 12px;
      border-radius: 999px;
      background: #fff;
      border: 1px solid var(--line);
      box-shadow: var(--shadow2);
      font-weight: 900;
      font-size: 12px;
      color: var(--text);
      display:flex;
      align-items:center;
      gap: 8px;
    }
    .pillBtn svg{ width: 16px; height: 16px; fill:#64748b; }
    .pillBtn:hover{ filter: brightness(.98); }

    .circleBtn{
      width: 40px; height: 40px;
      border-radius: 999px;
      border: 1px solid var(--line);
      background: #fff;
      box-shadow: var(--shadow2);
      display:flex; align-items:center; justify-content:center;
      cursor:pointer;
    }
    .circleBtn svg{ width: 18px; height: 18px; fill:#64748b; }

    .avatar{
      width: 42px; height: 42px;
      border-radius: 999px;
      border: 2px solid rgba(37,99,235,.20);
      overflow:hidden;
      background: rgba(37,99,235,.06);
    }
    .avatar img{ width:100%; height:100%; object-fit:cover; display:block; }

    /* Grid */
    .grid{
      display:grid;
      grid-template-columns: 1.15fr .85fr;
      gap: 18px;
    }

    .row3{
      display:grid;
      grid-template-columns: repeat(3, 1fr);
      gap: 14px;
      margin-bottom: 14px;
    }

    .card{
      background: var(--card);
      border: 1px solid var(--line);
      border-radius: var(--radius);
      box-shadow: var(--shadow2);
      padding: 14px 14px;
    }

    .metricTop{
      display:flex;
      justify-content:space-between;
      align-items:flex-start;
      gap: 10px;
    }
    .metricTitle{
      font-size: 12px;
      font-weight: 900;
      color: var(--muted);
    }
    .metricValue{
      font-size: 26px;
      font-weight: 950;
      margin-top: 8px;
      letter-spacing:.2px;
    }
    .metricDelta{
      margin-top: 8px;
      display:inline-flex;
      align-items:center;
      gap: 6px;
      font-size: 12px;
      font-weight: 900;
      padding: 6px 10px;
      border-radius: 999px;
      border: 1px solid transparent;
    }
    .deltaUp{
      color: #166534;
      background: rgba(34,197,94,.10);
      border-color: rgba(34,197,94,.18);
    }
    .deltaDown{
      color: #991b1b;
      background: rgba(239,68,68,.10);
      border-color: rgba(239,68,68,.18);
    }

    /* Schedule table */
    .headRow{
      display:flex;
      align-items:center;
      justify-content:space-between;
      gap: 12px;
      margin-bottom: 10px;
    }
    .headRow h3{
      margin:0;
      font-size: 14px;
      font-weight: 950;
      color: var(--text);
    }
    .dropdown{
      border: 1px solid var(--line);
      background: #fff;
      border-radius: 999px;
      padding: 8px 10px;
      font-size: 12px;
      font-weight: 900;
      color: var(--muted);
    }

    table{
      width:100%;
      border-collapse: collapse;
      font-size: 13px;
    }
    th, td{
      text-align:left;
      padding: 10px 8px;
      border-bottom: 1px solid rgba(15,23,42,.06);
      vertical-align: middle;
    }
    th{
      color: var(--muted);
      font-size: 12px;
      font-weight: 900;
    }
    .docCell{
      display:flex;
      align-items:center;
      gap: 10px;
    }
    .miniAvatar{
      width: 28px; height: 28px;
      border-radius: 999px;
      background: rgba(37,99,235,.10);
      border: 1px solid rgba(37,99,235,.18);
    }
    .subTxt{
      display:block;
      font-size: 11px;
      color: var(--muted);
      margin-top: 2px;
    }

    /* Queue donut */
    .queueWrap{
      display:grid;
      grid-template-columns: 220px 1fr;
      gap: 14px;
      align-items:center;
      margin-top: 12px;
    }
    .donut{
      width: 190px; height: 190px;
      border-radius: 999px;
      background:
        conic-gradient(
          var(--blue3) 0 55%,
          rgba(37,99,235,.35) 55% 74%,
          rgba(37,99,235,.12) 74% 100%
        );
      position: relative;
      margin: 6px auto;
    }
    .donut::after{
      content:"";
      position:absolute;
      inset: 26px;
      border-radius: 999px;
      background: #fff;
      border: 1px solid var(--line);
    }
    .donutCenter{
      position:absolute;
      inset:0;
      display:flex;
      flex-direction: column;
      align-items:center;
      justify-content:center;
      z-index: 2;
      text-align:center;
    }
    .donutCenter .big{
      font-weight: 950;
      font-size: 20px;
    }
    .donutCenter .small{
      font-size: 12px;
      color: var(--muted);
      font-weight: 900;
      margin-top: 2px;
    }

    .legend{
      display:grid;
      gap: 10px;
    }
    .leg{
      display:flex;
      align-items:center;
      justify-content:space-between;
      gap: 10px;
      font-size: 12px;
      color: var(--muted);
      font-weight: 900;
    }
    .dot{
      width: 10px; height: 10px;
      border-radius: 999px;
      display:inline-block;
      margin-right: 8px;
    }
    .lLeft{ display:flex; align-items:center; }

    /* Right assistant */
    .assistant{
      height: 100%;
      display:flex;
      flex-direction: column;
      gap: 12px;
    }
    .aiBox{
      border-radius: var(--radius);
      border: 1px solid rgba(37,99,235,.18);
      background:
        radial-gradient(700px 340px at 30% 20%, rgba(37,99,235,.10), transparent 60%),
        #fff;
      padding: 16px;
      box-shadow: var(--shadow2);
    }
    .aiTitle{
      font-weight: 950;
      font-size: 14px;
      display:flex;
      align-items:center;
      justify-content:space-between;
      gap: 10px;
    }
    .aiTitle span{ color: var(--muted); font-size: 12px; font-weight: 900; }
    .aiHero{
      margin-top: 12px;
      border-radius: 16px;
      border: 1px dashed rgba(37,99,235,.25);
      padding: 14px;
      color: var(--muted);
      font-weight: 900;
      font-size: 13px;
      line-height: 1.5;
      min-height: 120px;
      display:flex;
      align-items:center;
      justify-content:center;
      text-align:center;
    }
    .notice{
      margin-top: 12px;
      background: rgba(37,99,235,.06);
      border: 1px solid rgba(37,99,235,.16);
      border-radius: 16px;
      padding: 12px;
      display:grid;
      gap: 8px;
    }
    .notice strong{ font-size: 12px; }
    .notice a{
      font-size: 12px;
      font-weight: 950;
      color: var(--blue2);
      text-decoration:none;
    }
    .notice a:hover{ text-decoration: underline; }

    /* Bottom cards */
    .bottom{
      margin-top: 14px;
      display:grid;
      grid-template-columns: 1fr .55fr;
      gap: 18px;
    }
    .bigNum{
      font-size: 34px;
      font-weight: 950;
      margin-top: 10px;
    }
    .muted{ color: var(--muted); font-weight: 900; font-size: 12px; }

    .barFake{
      margin-top: 12px;
      height: 170px;
      border-radius: 16px;
      border: 1px solid rgba(15,23,42,.06);
      background:
        linear-gradient(180deg, rgba(37,99,235,.08), transparent),
        repeating-linear-gradient(
          to right,
          rgba(15,23,42,.06) 0 18px,
          transparent 18px 38px
        );
      position: relative;
      overflow:hidden;
    }
    .barFake::after{
      content:"";
      position:absolute;
      left: 58%;
      bottom: 16px;
      width: 16%;
      height: 70%;
      border-radius: 12px;
      background: rgba(37,99,235,.35);
      border: 1px solid rgba(37,99,235,.30);
    }

    .patientBox{
      display:grid;
      gap: 10px;
      margin-top: 12px;
    }
    .split{
      display:flex;
      align-items:center;
      justify-content:space-between;
      gap: 10px;
      font-size: 12px;
      font-weight: 900;
      color: var(--muted);
    }
    .progress{
      height: 14px;
      border-radius: 999px;
      background: rgba(15,23,42,.06);
      overflow:hidden;
      border: 1px solid rgba(15,23,42,.06);
    }
    .progress > div{
      height: 100%;
      width: 70%;
      background: rgba(15,23,42,.82);
      border-radius: 999px;
    }

    /* Responsive */
    @media (max-width: 1100px){
      .grid{ grid-template-columns: 1fr; }
      .bottom{ grid-template-columns: 1fr; }
      .queueWrap{ grid-template-columns: 1fr; }
      .donut{ margin: 0; }
      .row3{ grid-template-columns: 1fr; }
      .app{ grid-template-columns: 78px 1fr; }
    }
  </style>
</head>

<body>
@php
  // ✅ SAMPLE DATA (palitan later from DB)
  $kpi = [
    'today_appointments' => 456,
    'total_patients' => 862,
    'doctors' => 212,
    'today_delta' => 20,
    'patients_delta' => -12,
    'doctors_delta' => 5,
  ];

  $schedule = [
    ['time'=>'10:00 AM', 'doctor'=>'Dr. Doria', 'patient'=>'Juan Dela Cruz', 'note'=>'Consultation'],
    ['time'=>'10:30 AM', 'doctor'=>'Dr. Ramos', 'patient'=>'Maria Santos', 'note'=>'Follow-up'],
    ['time'=>'11:00 AM', 'doctor'=>'Dr. Salonga', 'patient'=>'Pedro Reyes', 'note'=>'Check-up'],
    ['time'=>'11:30 AM', 'doctor'=>'Dr. Lim', 'patient'=>'Ana Garcia', 'note'=>'Consultation'],
  ];

  $queue = [
    'completed' => 428,
    'in_consultation' => 12,
    'waiting' => 434,
    'total' => 428+12+434
  ];

  $lumc = [
    'population' => 740000,
    'served_10y' => 628174,
    'outpatients_10y' => 490581,
    'inpatients_10y' => 137593,
    'charity' => 48,
    'philhealth' => 45,
    'private' => 7,
    'budget' => 40000000,
    'prov_assist' => 35000000,
    'edf' => 5000000,
    'target' => 100000000,
  ];
@endphp

<div class="app">

  <!-- SIDEBAR -->
  <aside class="side">
    <div class="logo">
      <img src="{{ asset('images/LUMC_LOGO.png') }}" alt="LUMC">
    </div>

    <nav class="nav">
      <a class="active" href="#">
        <svg class="ico" viewBox="0 0 24 24"><path d="M12 3l9 8h-3v10h-5v-6H11v6H6V11H3l9-8z"/></svg>
      </a>
      <a href="#"><svg class="ico" viewBox="0 0 24 24"><path d="M7 2h2v2h6V2h2v2h3v18H2V4h5V2Zm13 6H4v12h16V8Z"/></svg></a>
      <a href="#"><svg class="ico" viewBox="0 0 24 24"><path d="M12 12a4 4 0 1 0-4-4 4 4 0 0 0 4 4Zm0 2c-4.4 0-8 2-8 4.5V21h16v-2.5c0-2.5-3.6-4.5-8-4.5Z"/></svg></a>
      <a href="#"><svg class="ico" viewBox="0 0 24 24"><path d="M20 7h-4l-2-2H10L8 7H4v14h16V7Zm-8 3a5 5 0 1 1 0 10 5 5 0 0 1 0-10Z"/></svg></a>
      <a href="#"><svg class="ico" viewBox="0 0 24 24"><path d="M3 3h18v4H3V3Zm0 6h18v12H3V9Zm4 3v2h6v-2H7Z"/></svg></a>
      <a href="#"><svg class="ico" viewBox="0 0 24 24"><path d="M19 3H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V5a2 2 0 0 0-2-2Zm-7 14H8v-2h4v2Zm4-4H8V7h8v6Z"/></svg></a>
    </nav>

    <div class="side-bottom">
      <a class="nav" href="#" style="width:100%;">
        <span style="display:none;"></span>
      </a>
      <a class="nav" href="#" style="width:100%;">
        <span style="display:none;"></span>
      </a>

      <a class="nav" href="#" style="width:100%;">
        <span style="display:none;"></span>
      </a>

      <a class="nav" href="#" style="width:100%;">
        <span style="display:none;"></span>
      </a>
    </div>
  </aside>

  <!-- MAIN -->
  <main class="main">

    <!-- TOPBAR -->
    <div class="topbar">
      <div class="leftTop">
        <div class="brand">
          <img src="{{ asset('images/LUMC_LOGO.png') }}" alt="LUMC">
          <span>LA UNION MEDICAL CENTER</span>
        </div>

        <div class="search">
          <svg viewBox="0 0 24 24"><path d="M10 2a8 8 0 1 0 5.3 14l4.7 4.7 1.4-1.4-4.7-4.7A8 8 0 0 0 10 2Zm0 2a6 6 0 1 1 0 12 6 6 0 0 1 0-12Z"/></svg>
          <input placeholder="Search patient / appointment / invoice..." />
        </div>
      </div>

      <div class="rightTop">
        <button class="pillBtn" type="button">
          <svg viewBox="0 0 24 24"><path d="M11 11V3h2v8h8v2h-8v8h-2v-8H3v-2h8Z"/></svg>
          Appointment
        </button>
        <button class="pillBtn" type="button">
          <svg viewBox="0 0 24 24"><path d="M12 12a4 4 0 1 0-4-4 4 4 0 0 0 4 4Zm0 2c-4.4 0-8 2-8 4.5V21h16v-2.5c0-2.5-3.6-4.5-8-4.5Z"/></svg>
          Patient
        </button>
        <button class="pillBtn" type="button">
          <svg viewBox="0 0 24 24"><path d="M3 3h18v4H3V3Zm0 6h18v12H3V9Zm4 3v2h6v-2H7Z"/></svg>
          Invoice
        </button>
        <button class="pillBtn" type="button">
          <svg viewBox="0 0 24 24"><path d="M6 2h12v20l-3-2-3 2-3-2-3 2V2Zm3 6h6v2H9V8Zm0 4h6v2H9v-2Z"/></svg>
          Prescription
        </button>

        <button class="circleBtn" type="button" title="Notifications">
          <svg viewBox="0 0 24 24"><path d="M12 22a2 2 0 0 0 2-2h-4a2 2 0 0 0 2 2Zm6-6V11a6 6 0 0 0-5-5.9V4a1 1 0 1 0-2 0v1.1A6 6 0 0 0 6 11v5l-2 2v1h16v-1l-2-2Z"/></svg>
        </button>
        <button class="circleBtn" type="button" title="Settings">
          <svg viewBox="0 0 24 24"><path d="M19.4 13a7.6 7.6 0 0 0 0-2l2-1.5-2-3.5-2.3 1a7.2 7.2 0 0 0-1.7-1L15 2h-4l-.4 3a7.2 7.2 0 0 0-1.7 1L6.6 6 4.6 9.5l2 1.5a7.6 7.6 0 0 0 0 2l-2 1.5 2 3.5 2.3-1a7.2 7.2 0 0 0 1.7 1L11 22h4l.4-3a7.2 7.2 0 0 0 1.7-1l2.3 1 2-3.5-2-1.5ZM13 12a1 1 0 1 1-2 0 1 1 0 0 1 2 0Z"/></svg>
        </button>

        <div class="avatar" title="Profile">
          <img src="{{ asset('images/LUMC_LOGO.png') }}" alt="User">
        </div>
      </div>
    </div>

    <!-- KPI ROW -->
    <div class="row3">
      <div class="card">
        <div class="metricTop">
          <div>
            <div class="metricTitle">Today's Appointments</div>
            <div class="metricValue">{{ number_format($kpi['today_appointments']) }}</div>
            <div class="metricDelta deltaUp">+{{ $kpi['today_delta'] }}% <span style="font-weight:900; color:#64748b;">vs last week</span></div>
          </div>
          <div class="circleBtn" style="box-shadow:none;">
            <svg viewBox="0 0 24 24"><path d="M7 2h2v2h6V2h2v2h3v18H2V4h5V2Zm13 6H4v12h16V8Z"/></svg>
          </div>
        </div>
      </div>

      <div class="card">
        <div class="metricTop">
          <div>
            <div class="metricTitle">Total Patients (10 yrs served)</div>
            <div class="metricValue">{{ number_format($lumc['served_10y']) }}</div>
            <div class="metricDelta deltaDown">{{ $kpi['patients_delta'] }}% <span style="font-weight:900; color:#64748b;">vs last week</span></div>
          </div>
          <div class="circleBtn" style="box-shadow:none;">
            <svg viewBox="0 0 24 24"><path d="M12 12a4 4 0 1 0-4-4 4 4 0 0 0 4 4Zm0 2c-4.4 0-8 2-8 4.5V21h16v-2.5c0-2.5-3.6-4.5-8-4.5Z"/></svg>
          </div>
        </div>
      </div>

      <div class="card">
        <div class="metricTop">
          <div>
            <div class="metricTitle">Doctors</div>
            <div class="metricValue">{{ number_format($kpi['doctors']) }}</div>
            <div class="metricDelta deltaUp">+{{ $kpi['doctors_delta'] }}% <span style="font-weight:900; color:#64748b;">vs last week</span></div>
          </div>
          <div class="circleBtn" style="box-shadow:none;">
            <svg viewBox="0 0 24 24"><path d="M12 2a6 6 0 0 1 6 6c0 2.2-1.2 4.1-3 5.2V22h-2v-6h-2v6H9v-8.8C7.2 12.1 6 10.2 6 8a6 6 0 0 1 6-6Z"/></svg>
          </div>
        </div>
      </div>
    </div>

    <!-- MAIN GRID -->
    <div class="grid">

      <!-- LEFT: schedule + queue + patient status -->
      <section>

        <div class="card">
          <div class="headRow">
            <h3>Today's Schedule</h3>
            <select class="dropdown">
              <option>This day</option>
              <option>This week</option>
              <option>This month</option>
            </select>
          </div>

          <table>
            <thead>
              <tr>
                <th style="width:110px;">Time</th>
                <th>Doctor</th>
                <th>Patient</th>
                <th style="width:120px;">Type</th>
              </tr>
            </thead>
            <tbody>
              @foreach($schedule as $row)
                <tr>
                  <td>{{ $row['time'] }}</td>
                  <td>
                    <div class="docCell">
                      <div class="miniAvatar"></div>
                      <div>
                        <strong style="font-size:13px;">{{ $row['doctor'] }}</strong>
                        <span class="subTxt">LUMC OPD</span>
                      </div>
                    </div>
                  </td>
                  <td>
                    <strong style="font-size:13px;">{{ $row['patient'] }}</strong>
                    <span class="subTxt">Patient No.: 00{{ rand(100,999) }}</span>
                  </td>
                  <td><span class="metricDelta deltaUp" style="padding:6px 10px;">{{ $row['note'] }}</span></td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>

        <div class="card" style="margin-top:14px;">
          <div class="headRow">
            <h3>Queue Status</h3>
            <select class="dropdown">
              <option>This day</option>
              <option>This week</option>
              <option>This month</option>
            </select>
          </div>

          <div class="queueWrap">
            <div style="position:relative;">
              <div class="donut"></div>
              <div class="donutCenter">
                <div class="big">{{ number_format($queue['total']) }}</div>
                <div class="small">Total Queue</div>
              </div>
            </div>

            <div class="legend">
              <div class="leg">
                <div class="lLeft"><span class="dot" style="background: var(--blue3);"></span>Completed</div>
                <div>{{ number_format($queue['completed']) }}</div>
              </div>
              <div class="leg">
                <div class="lLeft"><span class="dot" style="background: rgba(37,99,235,.35);"></span>In consultation</div>
                <div>{{ number_format($queue['in_consultation']) }}</div>
              </div>
              <div class="leg">
                <div class="lLeft"><span class="dot" style="background: rgba(37,99,235,.12);"></span>Waiting</div>
                <div>{{ number_format($queue['waiting']) }}</div>
              </div>

              <div style="margin-top:8px; font-size:12px; color: var(--muted); font-weight:900;">
                Province population: {{ number_format($lumc['population']) }} • 10 yrs served: {{ number_format($lumc['served_10y']) }}
              </div>
            </div>
          </div>
        </div>

        <div class="bottom">
          <div class="card">
            <div class="headRow" style="margin-bottom:0;">
              <h3>Patients Status</h3>
              <select class="dropdown">
                <option>Monthly</option>
                <option>Weekly</option>
                <option>Daily</option>
              </select>
            </div>

            <div class="bigNum">{{ number_format($lumc['served_10y']) }}</div>
            <div class="muted">Total patients served in the last 10 years (OPD + In-patient)</div>

            <div class="barFake"></div>

            <div class="muted" style="margin-top:10px;">
              OPD: {{ number_format($lumc['outpatients_10y']) }} • In-patient: {{ number_format($lumc['inpatients_10y']) }}
            </div>
          </div>

          <div class="card">
            <div class="headRow" style="margin-bottom:0;">
              <h3>Patient Classification</h3>
              <select class="dropdown">
                <option>10 years</option>
              </select>
            </div>

            <div class="patientBox">
              <div class="split"><span>Charity</span><span>{{ $lumc['charity'] }}%</span></div>
              <div class="progress"><div style="width: {{ $lumc['charity'] }}%; background: rgba(15,23,42,.82);"></div></div>

              <div class="split"><span>PhilHealth-insured</span><span>{{ $lumc['philhealth'] }}%</span></div>
              <div class="progress"><div style="width: {{ $lumc['philhealth'] }}%; background: rgba(37,99,235,.55);"></div></div>

              <div class="split"><span>Private-paying</span><span>{{ $lumc['private'] }}%</span></div>
              <div class="progress"><div style="width: {{ $lumc['private'] }}%; background: rgba(250,204,21,.85);"></div></div>

              <div style="margin-top:8px;" class="muted">
                Annual budget: ₱{{ number_format($lumc['budget']) }} • Target revenue: ₱{{ number_format($lumc['target']) }}
              </div>
            </div>
          </div>
        </div>

      </section>

      <!-- RIGHT: AI assistant panel -->
      <aside class="assistant">
        <div class="aiBox">
          <div class="aiTitle">
            AI Assistant
            <span>Updates</span>
          </div>

          <div class="aiHero">
            Welcome back! Let’s see today’s updates for LUMC operations.
          </div>

          <div class="notice">
            <strong>Notice:</strong>
            <div class="muted" style="margin:0;">
              Budget support: ₱{{ number_format($lumc['prov_assist']) }} from Province + ₱{{ number_format($lumc['edf']) }} EDF.
            </div>
            <a href="#">Show notice?</a>
          </div>
        </div>
      </aside>

    </div>
  </main>
</div>
</body>
</html>
