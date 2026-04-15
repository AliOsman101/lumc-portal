<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Admission & Discharge</title>

<style>
body{
margin:0;
font-family:Arial;
background:linear-gradient(135deg,#0b2e7a,#2563eb);
}

.container{
width:1100px;
margin:40px auto;
}

.panel{
background:white;
padding:25px;
border-radius:20px;
box-shadow:0 10px 40px rgba(0,0,0,0.2);
}

h2{
text-align:center;
color:#0b2e7a;
margin-bottom:20px;
}

.grid{
display:grid;
grid-template-columns:repeat(3,1fr);
gap:10px;
margin-bottom:10px;
}

.grid-2{
display:grid;
grid-template-columns:repeat(2,1fr);
gap:10px;
}

input, select{
padding:10px;
border-radius:10px;
border:1px solid #ccc;
}

.section{
margin-top:20px;
}

button{
background:#dc2626;
color:white;
border:none;
padding:10px 20px;
border-radius:10px;
margin-top:15px;
float:right;
}
</style>
</head>

<body>

<div class="container">
<div class="panel">

<h2>Admission & Discharge Record</h2>

<form>

<div class="grid">
<input placeholder="Last Name">
<input placeholder="First Name">
<input placeholder="Middle Name">
</div>

<div class="grid">
<input placeholder="Hospital Case No.">
<input placeholder="Ward / Service">
<select>
<option>Sex</option>
<option>Male</option>
<option>Female</option>
</select>
</div>

<div class="grid-2">
<input placeholder="Address">
<input placeholder="Contact Number">
</div>

<div class="section">
<h4>Admission</h4>

<div class="grid-2">
<input type="date">
<input type="time">
</div>

<div class="grid-2">
<input type="date">
<input type="time">
</div>
</div>

<div class="section">
<h4>Diagnosis</h4>

<input placeholder="Admission Diagnosis">
<input placeholder="Final Diagnosis">
</div>

<div class="section">
<h4>Disposition</h4>

<select>
<option>Discharge</option>
<option>Transferred</option>
<option>Died</option>
</select>
</div>

<button>Save</button>

</form>

</div>
</div>

</body>
</html>