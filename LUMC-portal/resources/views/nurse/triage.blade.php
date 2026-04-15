<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> LUMC | Triage Assessment</title>

    <!-- BOOTSTRAP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background:#f5f6fa;">

<div class="container mt-4">

    <div class="card shadow-sm rounded-4">
        <div class="card-header bg-white">
            <h5> Triage Assessment Entry</h5>
        </div>

        <div class="card-body">

            <!-- TRIAGE OFFICER -->
            <div class="mb-3">
                <label class="form-label fw-bold">Nurse on duty*</label>
                <input type="text" class="form-control" placeholder="e.g. Maria Santos">
            </div>

            <!-- CHIEF COMPLAINT -->
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold">Chief Complaint *</label>
                    <input type="text" class="form-control" id="complaint">
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold">Duration</label>
                    <select class="form-select">
                        <option>< 1 day</option>
                        <option>1–3 days</option>
                        <option>1 week</option>
                        <option>> 1 week</option>
                    </select>
                </div>
            </div>

            <!-- CONDITION -->
            <div class="row">
                <div class="col-md-4 mb-3">
                    <label class="form-label fw-bold">Consciousness *</label>
                    <select class="form-select" id="conscious">
                        <option value="alert">Alert</option>
                        <option value="drowsy">Drowsy</option>
                        <option value="unconscious">Unconscious</option>
                    </select>
                </div>

                <div class="col-md-4 mb-3">
                    <label class="form-label fw-bold">Breathing *</label>
                    <select class="form-select" id="breathing">
                        <option value="normal">Normal</option>
                        <option value="difficulty">Difficulty</option>
                        <option value="severe">Severe</option>
                    </select>
                </div>

                <div class="col-md-4 mb-3">
                    <label class="form-label fw-bold">Mobility</label>
                    <select class="form-select">
                        <option>Walking</option>
                        <option>Needs Assistance</option>
                        <option>Bedridden</option>
                    </select>
                </div>
            </div>

            <!-- TRIAGE LEVEL -->
            <div class="mb-3">
                <label class="form-label fw-bold">Triage Category *</label>
                <select class="form-select" id="triageLevel">
                    <option value="white">⚪ Select</option>
                    <option value="green">🟩 Minor</option>
                    <option value="yellow">🟨 Urgent</option>
                    <option value="black">⬛ Dead, Dying, or Euthansia</option>
                    <option value="red">🟥 Immediate</option>
                </select>
            </div>

            <!-- COLOR BOX -->
            <div id="triageBox" class="p-3 rounded text-white mb-3" style="background: green;">
                Current Priority: NON-URGENT
            </div>

            <!-- DEPARTMENT -->
            <div class="mb-3">
                <label class="form-label fw-bold">Assigned Department *</label>
                <select class="form-select">
                    <option>Outpatient (OPD)</option>
                    <option>Emergency Room (ER)</option>
                    <option>Surgery</option>
                    <option>Pediatrics</option>
                    <option>Internal Medicine</option>
                </select>
            </div>

            <!-- NOTES -->
            <div class="mb-3">
                <label class="form-label fw-bold">Notes</label>
                <textarea class="form-control"></textarea>
            </div>

            <!-- BUTTON -->
            <button class="btn btn-primary">💾 Save Triage</button>

        </div>
    </div>

</div>

<!-- JS -->
<script>
const triageLevel = document.getElementById('triageLevel');
const triageBox = document.getElementById('triageBox');

triageLevel.addEventListener('change', function () {
    let color = "green";
    let text = "Minor";

     if (this.value === "white") {
        color = "#bdc3c7";
        text = "Select a valid category";
    } else if (this.value === "yellow") {
        color = "#f1c40f";
        text = "Urgent";
    } else if (this.value === "black") {
        color = "#000";
        text = "Dead, Dying, or Euthansia";
    } else if (this.value === "red") {
        color = "#e74c3c";
        text = "Immediate";
    }

    triageBox.style.background = color;
    triageBox.innerHTML = "Current Priority: " + text;
});

function autoTriage() {
    let conscious = document.getElementById('conscious').value;
    let breathing = document.getElementById('breathing').value;
    let complaint = document.getElementById('complaint').value.toLowerCase();

    let level = "green";

    if (conscious === "unconscious" || breathing === "severe") {
        level = "red";
    } else if (breathing === "difficulty" || complaint.includes("chest pain")) {
        level = "orange";
    } else if (complaint.includes("fever")) {
        level = "yellow";
    }

    document.getElementById('triageLevel').value = level;
    triageLevel.dispatchEvent(new Event('change'));
}

document.getElementById('complaint').addEventListener('input', autoTriage);
document.getElementById('breathing').addEventListener('change', autoTriage);
document.getElementById('conscious').addEventListener('change', autoTriage);
</script>

</body>
</html>