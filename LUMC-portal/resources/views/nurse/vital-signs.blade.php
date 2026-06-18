<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>LUMC | Vital Signs</title>

@vite(['resources/css/app.css','resources/js/app.js'])

<style>
body{
margin:0;
font-family:Arial, Helvetica, sans-serif;
background:linear-gradient(135deg,#0b2e7a 0%, #1e40af 50%, #2563eb 100%);
min-height:100vh;
}

/* HEADER */
.topbar{
background:white;
padding:15px 40px;
display:flex;
justify-content:space-between;
align-items:center;
box-shadow:0 5px 20px rgba(0,0,0,0.1);
}

.brand{
display:flex;
align-items:center;
gap:10px;
font-weight:900;
color:#0b2e7a;
}

.brand img{height:42px;}

.container{
width:1150px;
margin:30px auto;
}

/* PANEL */
.panel{
background:rgba(255,255,255,0.95);
padding:25px;
border-radius:20px;
box-shadow:0 25px 60px rgba(0,0,0,0.25);
backdrop-filter: blur(10px);
}

h2{
margin-bottom:15px;
color:#0b2e7a;
}

/* INFO */
.info{
display:grid;
grid-template-columns:repeat(4,1fr);
gap:12px;
margin-bottom:15px;
}

.info input{
padding:10px;
border-radius:10px;
border:1px solid #ddd;
background:#f8fafc;
}

/* TABLE */
.table-wrapper{
overflow-x:auto;
}

table{
width:100%;
border-collapse:collapse;
font-size:12px;
background:white;
border-radius:10px;
overflow:hidden;
}

th, td{
border:1px solid #ddd;
padding:6px;
text-align:center;
}

th{
background:#0b2e7a;
color:white;
font-weight:bold;
}

td input{
width:100%;
border:none;
outline:none;
text-align:center;
background:transparent;
}

/* BUTTON */
.actions{
margin-top:15px;
display:flex;
justify-content:flex-end;
gap:10px;
}

.btn{
padding:10px 15px;
border:none;
border-radius:10px;
font-weight:bold;
cursor:pointer;
color:white;
background:linear-gradient(135deg,#ef4444,#dc2626);
}

.btn:hover{opacity:0.9;}

.btn-secondary{
background:#e0e7ff;
color:#1e40af;
}

.success{
background:#22c55e;
color:white;
padding:10px;
border-radius:10px;
margin-bottom:10px;
}
</style>
</head>

<body>

<header class="topbar">
<div class="brand">
<img src="{{ asset('images/LUMC_LOGO.png') }}">
LA UNION MEDICAL CENTER
</div>
</header>

<div class="container">

<div class="panel">

<h2>Vital Signs Monitoring Sheet</h2>

@if(session('success'))
<div class="success">
{{ session('success') }}
</div>
@endif

<form method="POST" action="/nurse/vital-signs">
@csrf

<div class="info">
<input name="name" placeholder="Patient Name">
<input name="age" placeholder="Age">
<input name="sex" placeholder="Sex">
<input name="ward" placeholder="Ward">
</div>

<div class="table-wrapper">
<table>
<thead>
<tr>
<th>Date & Time</th>
<th>BP</th>
<th>CR</th>
<th>PR</th>
<th>RR</th>
<th>Temp</th>
<th>Neuro</th>
<th>Others</th>
<th>Remarks</th>
</tr>
</thead>

<tbody>

@for($i = 0; $i < 12; $i++)
<tr>
<td><input name="rows[{{ $i }}][datetime]"></td>
<td><input name="rows[{{ $i }}][bp]"></td>
<td><input name="rows[{{ $i }}][cr]"></td>
<td><input name="rows[{{ $i }}][pr]"></td>
<td><input name="rows[{{ $i }}][rr]"></td>
<td><input name="rows[{{ $i }}][temp]"></td>
<td><input name="rows[{{ $i }}][neuro]"></td>
<td><input name="rows[{{ $i }}][others]"></td>
<td><input name="rows[{{ $i }}][remarks]"></td>
</tr>
@endfor

</tbody>
</table>
</div>

<div class="actions">
<button type="button" onclick="window.print()" class="btn btn-secondary">Print</button>
<button type="submit" class="btn">Save</button>
</div>

</form>

</div>
</div>

</body>
</html>