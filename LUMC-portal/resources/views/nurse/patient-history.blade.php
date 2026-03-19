<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>LUMC | Patient History</title>

@vite(['resources/css/app.css','resources/js/app.js'])

<style>

body{
margin:0;
font-family:Arial, Helvetica, sans-serif;
background: linear-gradient(135deg,#0b2e7a,#2563eb);
}

/* top header */

.topbar{
background:white;
padding:15px 40px;
display:flex;
justify-content:space-between;
align-items:center;
box-shadow:0 5px 15px rgba(0,0,0,0.1);
}

.brand{
display:flex;
align-items:center;
gap:10px;
font-weight:bold;
color:#0b2e7a;
}

.brand img{
height:40px;
}

.top-logos img{
height:35px;
margin-left:10px;
}

/* container */

.container{
width:1100px;
margin:30px auto;
}

/* blue strip */

.regbar{
background:rgba(255,255,255,0.15);
color:white;
padding:12px 20px;
border-radius:15px;
display:flex;
justify-content:space-between;
align-items:center;
backdrop-filter:blur(6px);
}

.regbar-title{
font-weight:bold;
}

/* white card */

.panel{
background:white;
margin-top:15px;
padding:25px;
border-radius:20px;
box-shadow:0 15px 40px rgba(0,0,0,0.2);
}

.panel h2{
color:#0b2e7a;
margin-bottom:10px;
}

/* grid form */

.grid{
display:grid;
grid-template-columns:1fr 1fr 1fr;
gap:15px;
margin-top:20px;
}

.field label{
font-size:12px;
font-weight:bold;
color:#555;
display:block;
margin-bottom:5px;
}

.field input{
width:100%;
padding:8px;
border-radius:8px;
border:1px solid #ddd;
}

/* textarea */

.textarea{
margin-top:15px;
}

.textarea label{
font-weight:bold;
font-size:13px;
}

textarea{
width:100%;
height:70px;
border-radius:8px;
border:1px solid #ddd;
padding:10px;
resize:none;
}

/* button */

.actions{
margin-top:20px;
text-align:right;
}

.btn{
background:#dc2626;
border:none;
color:white;
padding:10px 18px;
border-radius:10px;
font-weight:bold;
cursor:pointer;
}

.btn:hover{
background:#b91c1c;
}

.btn-secondary{
background:#e5e7eb;
color:#333;
margin-right:10px;
}

</style>
</head>

<body>

<header class="topbar">

<div class="brand">
<img src="{{ asset('images/LUMC_LOGO.png') }}">
LA UNION MEDICAL CENTER
</div>

<div class="top-logos">
<img src="{{ asset('images/ProvinceofLaUnion.png') }}">
<img src="{{ asset('images/BagongPilipinas.png') }}">
</div>

</header>


<div class="container">

<div class="regbar">
<div class="regbar-title">NURSE MODULE • PATIENT HISTORY</div>
</div>


<div class="panel">

<h2>Patient History Form</h2>
<p>Digital version based on the LUMC admission form.</p>

<div class="grid">

<div class="field">
<label>Last Name</label>
<input>
</div>

<div class="field">
<label>Given Name</label>
<input>
</div>

<div class="field">
<label>Middle Name</label>
<input>
</div>

<div class="field">
<label>Hospital Case No.</label>
<input>
</div>

<div class="field">
<label>Ward / Service</label>
<input>
</div>

<div class="field">
<label>Sex</label>
<input>
</div>

<div class="field">
<label>Permanent Address</label>
<input>
</div>

<div class="field">
<label>Telephone No.</label>
<input>
</div>

<div class="field">
<label>Civil Status</label>
<input>
</div>

</div>


<div class="textarea">
<label>Chief Complaint</label>
<textarea></textarea>
</div>

<div class="textarea">
<label>History of Present Complaint</label>
<textarea></textarea>
</div>

<div class="textarea">
<label>Past History (Previous Illness / Operations)</label>
<textarea></textarea>
</div>

<div class="textarea">
<label>Family History</label>
<textarea></textarea>
</div>


<div class="grid">

<div class="field">
<label>Occupation and Environment</label>
<input>
</div>

<div class="field">
<label>Drug Allergies</label>
<input>
</div>

<div class="field">
<label>Drug Therapy</label>
<input>
</div>

<div class="field">
<label>Other Allergies</label>
<input>
</div>

</div>


<div class="actions">

<button class="btn-secondary btn" onclick="window.print()">Print</button>
<button class="btn">Save</button>

</div>

</div>

</div>

</body>
</html>