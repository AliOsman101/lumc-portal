<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>LUMC | TPR Record</title>

@vite(['resources/css/app.css','resources/js/app.js'])

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<style>
body{
margin:0;
font-family:Arial;
background:linear-gradient(135deg,#0b2e7a,#2563eb);
min-height:100vh;
}

.topbar{
background:white;
padding:15px 40px;
display:flex;
align-items:center;
font-weight:bold;
color:#0b2e7a;
}

.container{
width:1100px;
margin:30px auto;
}

.panel{
background:white;
padding:20px;
border-radius:20px;
box-shadow:0 20px 50px rgba(0,0,0,0.2);
}

.info{
display:grid;
grid-template-columns:repeat(4,1fr);
gap:10px;
margin-bottom:15px;
}

.info input{
padding:8px;
border-radius:8px;
border:1px solid #ccc;
}

/* TABLE */
table{
width:100%;
border-collapse:collapse;
margin-bottom:20px;
}

th, td{
border:1px solid #ccc;
padding:6px;
text-align:center;
}

th{
background:#0b2e7a;
color:white;
}

td input{
width:100%;
border:none;
outline:none;
text-align:center;
}

/* BUTTON */
.btn{
background:#dc2626;
color:white;
padding:10px;
border:none;
border-radius:10px;
cursor:pointer;
}

.chart-container{
margin-top:20px;
}
</style>
</head>

<body>

<header class="topbar">
LA UNION MEDICAL CENTER - TPR RECORD
</header>

<div class="container">
<div class="panel">

<h2>TPR Monitoring</h2>

<div class="info">
<input id="name" placeholder="Patient Name">
<input id="age" placeholder="Age">
<input id="ward" placeholder="Ward">
<input id="bed" placeholder="Bed No.">
</div>

<table id="tprTable">
<thead>
<tr>
<th>Date</th>
<th>Temp (°C)</th>
<th>Pulse</th>
<th>Respiration</th>
</tr>
</thead>

<tbody>
@for($i=0;$i<10;$i++)
<tr>
<td><input class="date"></td>
<td><input class="temp"></td>
<td><input class="pulse"></td>
<td><input class="resp"></td>
</tr>
@endfor
</tbody>
</table>

<button class="btn" onclick="generateChart()">Generate Graph</button>

<div class="chart-container">
<canvas id="tprChart"></canvas>
</div>

</div>
</div>

<script>
function generateChart(){

let dates = [];
let temp = [];
let pulse = [];
let resp = [];

document.querySelectorAll("#tprTable tbody tr").forEach(row=>{
    let d = row.querySelector(".date").value;
    let t = row.querySelector(".temp").value;
    let p = row.querySelector(".pulse").value;
    let r = row.querySelector(".resp").value;

    if(d){
        dates.push(d);
        temp.push(t);
        pulse.push(p);
        resp.push(r);
    }
});

const ctx = document.getElementById('tprChart');

new Chart(ctx, {
    type: 'line',
    data: {
        labels: dates,
        datasets: [
            {
                label: 'Temperature',
                data: temp,
                borderColor: 'red',
                fill: false
            },
            {
                label: 'Pulse',
                data: pulse,
                borderColor: 'blue',
                fill: false
            },
            {
                label: 'Respiration',
                data: resp,
                borderColor: 'green',
                fill: false
            }
        ]
    }
});

}
</script>

</body>
</html>