<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Medication Records</title>

<style>
body{
margin:0;
font-family:Arial;
background:linear-gradient(135deg,#0b2e7a,#2563eb);
}

.container{
width:1200px;
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
margin-bottom:15px;
}

/* TABLE */
table{
width:100%;
border-collapse:collapse;
}

td, th{
border:1px solid #ccc;
padding:5px;
text-align:center;
}

.shift{
background:#f1f5f9;
font-weight:bold;
}

input{
width:100%;
border:none;
outline:none;
text-align:center;
}

/* BUTTON */
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

<h2>Medication Records</h2>

<table>

@for($m=0;$m<5;$m++)
<tr>
<td rowspan="3">
<input placeholder="Medication">
</td>

<td class="shift">7-3</td>
@for($i=0;$i<12;$i++)
<td><input></td>
@endfor
</tr>

<tr>
<td class="shift">3-11</td>
@for($i=0;$i<12;$i++)
<td><input></td>
@endfor
</tr>

<tr>
<td class="shift">11-7</td>
@for($i=0;$i<12;$i++)
<td><input></td>
@endfor
</tr>
@endfor

</table>

<button>Save</button>

</div>
</div>

</body>
</html>