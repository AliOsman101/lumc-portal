<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Nutrition Care Plan — La Union Medical Center</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @media print {
            .no-print {
                display: none;
            }

            body {
                background: white;
                padding: 0;
            }

            .page {
                box-shadow: none;
                border: 1px solid #000;
            }
        }

        .page {
            max-width: 900px;
            margin: 20px auto;
        }

        .thin-border {
            border: 1px solid #cbd5e1;
        }
    </style>
</head>

<body class="bg-slate-100 font-sans p-6">
    <div class="page bg-white border rounded-md p-6">
        <header class="flex items-center justify-between mb-4">
            <div class="flex items-center gap-4">
                <img src="{{ asset('images/lumc-logo.png') }}" alt="LUMC" class="h-12 w-12 object-contain">
                <div>
                    <h1 class="text-lg font-bold">LA UNION MEDICAL CENTER</h1>
                    <p class="text-sm text-slate-600">Nutrition and Dietetics Service — Nutrition Care Plan</p>
                </div>
            </div>
            <div class="text-xs text-slate-500 text-right">
                <div>Form: NUT-001</div>
                <div>Revision: 01</div>
            </div>
        </header>

        <form>
            <div class="grid grid-cols-3 gap-3 mb-3 text-sm">
                <div>
                    <label class="block text-xs font-semibold text-slate-600">Name of Patient (Last, First, MI)</label>
                    <input type="text" name="patient_name" class="mt-1 w-full p-2 border rounded"
                        placeholder="Last, First, MI">
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-600">Hospital Number</label>
                    <input type="text" name="hospital_no" class="mt-1 w-full p-2 border rounded"
                        placeholder="Hospital #">
                </div>
                <div class="flex gap-3">
                    <div class="w-full">
                        <label class="block text-xs font-semibold text-slate-600">Age</label>
                        <input type="text" name="age" class="mt-1 w-full p-2 border rounded" placeholder="Age">
                    </div>
                    <div class="w-full">
                        <label class="block text-xs font-semibold text-slate-600">Gender</label>
                        <select name="gender" class="mt-1 w-full p-2 border rounded">
                            <option value="">Select</option>
                            <option>Male</option>
                            <option>Female</option>
                            <option>Other</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-3 gap-3 mb-3 text-sm">
                <div>
                    <label class="block text-xs font-semibold text-slate-600">Name of Attending Physician</label>
                    <input type="text" name="attending_physician" class="mt-1 w-full p-2 border rounded"
                        placeholder="Attending physician">
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-600">Date of Admission</label>
                    <input type="date" name="admission_date" class="mt-1 w-full p-2 border rounded">
                </div>
                <div class="flex gap-3">
                    <div class="w-full">
                        <label class="block text-xs font-semibold text-slate-600">Diagnosis</label>
                        <input type="text" name="diagnosis" class="mt-1 w-full p-2 border rounded"
                            placeholder="Diagnosis">
                    </div>
                    <div class="w-full">
                        <label class="block text-xs font-semibold text-slate-600">Religion</label>
                        <input name="religion" class="mt-1 w-full p-2 border rounded" placeholder="Religion">
                        </input>
                    </div>
                </div>
            </div>

            <table class="w-full border-collapse text-sm mb-4">
                <thead>
                    <tr>
                        <th colspan="2" class="border p-3 text-center font-semibold text-sm bg-gray-50">
                            Nutritional Assessment
                        </th>
                    </tr>
                </thead>

                <tbody>
                    <tr>
                        <!-- LEFT COLUMN -->
                        <td class="align-top border p-4" style="width:66%">

                            <div class="grid grid-cols-2 gap-4">
                                <!-- Column 1 -->
                                <div>
                                    <div class="font-semibold text-sm">Present Diet of Patient:</div>
                                    <input type="text" name="present_diet"
                                        class="w-full p-1 border-0 border-b-2 rounded mb-3">
                                </div>

                                <!-- Column 2 -->
                                <div>
                                    <div class="font-semibold text-sm">Physical Assessment:</div>
                                    <input type="text" name="physical_assessment"
                                        class="w-full p-1 border-0 border-b-2 rounded mb-3">
                                </div>
                            </div>


                            <div class="grid grid-cols-2 gap-3">
                                <div>
                                    <label class="block text-md">Food / Nutrient / Energy Intake</label>
                                    <div class="grid grid-rows-2 gap-1 mt-2 space-y-2 text-sm">
                                        <label class="inline-flex items-center"><input type="checkbox"
                                                name="food_intake[]" value="no_change" class="mr-2">No change</label>
                                        <label class="inline-flex items-center"><input type="checkbox"
                                                name="food_intake[]" value="mostly_liquids" class="mr-2">Mostly
                                            Liquids</label>
                                        <label class="inline-flex items-center"><input type="checkbox"
                                                name="food_intake[]" value="sub_optimal"
                                                class="mr-2">Sub-Optimal</label>
                                        <label class="inline-flex items-center"><input type="checkbox"
                                                name="food_intake[]" value="starvation" class="mr-2">Starvation</label>
                                        <label class="inline-flex items-center"><input type="checkbox"
                                                name="food_intake[]" value="poor_intake_prior_to_admission"
                                                class="mr-2">Poor intake prior to admission</label>
                                    </div>
                                </div>

                                <div>
                                    <div>
                                        <label class="block text-md">Functional Assessment:</label>
                                        <div class="grid grid-cols-1 gap-1 mt-2 space-y-2 text-sm">
                                            <label class="inline-flex items-center"><input type="checkbox"
                                                    name="functional_assessment[]" value="bedridden"
                                                    class="mr-2">Bedridden</label>
                                            <label class="inline-flex items-center"><input type="checkbox"
                                                    name="functional_assessment[]" value="ambulatory"
                                                    class="mr-2">Ambulatory</label>
                                            <label class="inline-flex items-center"><input type="checkbox"
                                                    name="functional_assessment[]" value="needs_assistance"
                                                    class="mr-2">Needs assistance</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <hr class="h-px my-4 w-full bg-neutral-quaternary border-1 ">

                            <div class="grid grid-rows-1 mt-2 gap-1 space-y-2 text-sm">
                                <label class="inline-flex items-center"><input type="checkbox"
                                        name="functional_assessment[]" value="chew_swallow"
                                        class="mr-2">Chewing/Swallowing
                                    Difficulties</label>
                                <label class="inline-flex items-center"><input type="checkbox"
                                        name="functional_assessment[]" value="constipation"
                                        class="mr-2">Constipation</label>
                                <label class="inline-flex items-center"><input type="checkbox"
                                        name="functional_assessment[]" value="diarrhea" class="mr-2">Diarrhea</label>
                                <label class="inline-flex items-center"><input type="checkbox"
                                        name="functional_assessment[]" value="allergies" class="mr-2">Food
                                    Allergies</label>
                                <label class="inline-flex items-center"><input type="checkbox"
                                        name="functional_assessment[]" value="intolerance" class="mr-2">Food
                                    Intolerance</label>
                                <div>
                                    <div class="font-semibold text-sm">Nutrient & Drug Interaction:</div>
                                    <input type="text" name="present_diet"
                                        class="w-full p-1 border-0 border-b-2 rounded mb-3">
                                </div>
                            </div>
                        </td>


                        <!-- RIGHT COLUMN -->
                        <td class="align-top border p-4" style="width:34%">
                            <div class="space-y-2 text-xs">
                                <div class="flex gap-2">
                                    <input name="height_cm" class="p-2 border rounded w-1/2" placeholder="Height (cm)">
                                    <input name="weight_kg" class="p-2 border rounded w-1/2" placeholder="Weight (kg)">
                                </div>
                                <div class="flex gap-2">
                                    <input name="usual_weight_kg" class="p-2 border rounded w-1/2"
                                        placeholder="Usual weight (kg)">
                                    <input name="bmi" class="p-2 border rounded w-1/2" placeholder="BMI">
                                </div>
                                <div class="flex gap-2">
                                    <input name="weight_change_pct" class="p-2 border rounded w-1/2"
                                        placeholder="Weight change (%)">
                                    <input name="percent_ibw" class="p-2 border rounded w-1/2" placeholder="% IBW">
                                </div>

                                <hr class="h-px my-4 w-full bg-neutral-quaternary border-1 ">

                                <h2 class="font-semibold text-sm mb-2 mt-2">Biochemical Data</h2>

                                <div class="grid grid-cols-2 gap-2">

                                    <input name="albumin" class="p-2 border rounded" placeholder="Albumin">
                                    <input name="hemoglobin" class="p-2 border rounded" placeholder="Hemoglobin">
                                    <input name="bun" class="p-2 border rounded" placeholder="BUN">
                                    <input name="ldl" class="p-2 border rounded" placeholder="LDL">
                                    <input name="calcium" class="p-2 border rounded" placeholder="Calcium">
                                    <input name="phosphate" class="p-2 border rounded" placeholder="Phosphate">
                                    <input name="cholesterol" class="p-2 border rounded" placeholder="Cholesterol">
                                    <input name="creatinine" class="p-2 border rounded" placeholder="Creatinine">
                                    <input name="glucose" class="p-2 border rounded" placeholder="Glucose">
                                    <input name="sodium" class="p-2 border rounded" placeholder="Sodium">
                                    <input name="hba1c" class="p-2 border rounded" placeholder="HbA1c">
                                    <input name="triglycerides" class="p-2 border rounded" placeholder="Triglycerides">
                                </div>

                                <hr class="h-px my-4 w-full bg-neutral-quaternary border-1 ">

                                <h2 class="font-semibold text-sm mb-2 mt-2 ">Others:</h2>
                                <div class="grid grid-cols-2 gap-2">
                                    <input name="BP:" class="p-2 border rounded w-full" placeholder="Blood Pressure">
                                    <input name="Acid Base Gas (ABG)" class="p-2 border rounded w-full"
                                        placeholder="Acid Base Gas (ABG)">
                                </div>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>

            <table class="w-full border-collapse text-sm mb-4">
                <tr>
                    <th colspan="2" class="border p-3 text-center font-semibold text-sm bg-gray-50">
                        Scoring Nutritional Risk Related Factors
                    </th>
                </tr>

                <tr>
                    <td class="align-top border p-4" style="width:66%">
                        <div class="grid grid-cols-2 gap-3">
                            <div>
                                <div class="grid grid-cols-1 gap-2 mt-2 text-sm">
                                    <label class="inline-flex items-center"><input type="checkbox"
                                            name="nutrition_risk[]" value="screening_criteria" class="mr-2">Screening
                                        criteria for potential nutritional risk (1 point)</label>
                                    <label class="inline-flex items-center"><input type="checkbox"
                                            name="nutrition_risk[]" value="percent_ibw" class="mr-2">&lt;85% or &gt;130%
                                        Ideal Body Weight (1 point)</label>
                                    <div>
                                        <label class="inline-flex items-center">
                                            <input type="checkbox" name="nutrition_risk[]" value="unintentional_weight_loss" class="mr-2">
                                            Unintentional weight loss (2 points)
                                        </label>

                                        <div id="unintentionalWeightDetails" style="display:none" class="flex items-center space-x-2 mt-1 ml-6 text-sm">
                                            <input type="number" name="unintentional_weight_loss_percent" min="0" max="100" step="0.1" placeholder="%" class="w-20 p-1 border rounded">
                                            <span>% over</span>
                                            <input type="number" name="unintentional_weight_loss_duration" min="0" step="1" placeholder="0" class="w-20 p-1 border rounded">
                                            <select name="unintentional_weight_loss_duration_unit" class="p-1 border rounded">
                                                <option value="weeks">weeks</option>
                                                <option value="months">months</option>
                                            </select>
                                            <p id="unintentionalError" class="ml-2 text-xs text-red-600" style="display:none">Enter % and duration.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="grid grid-cols-1 gap-2 mt-2 text-sm">

                                    <label class="inline-flex items-center"><input type="checkbox"
                                            name="nutrition_risk[]" value="mechanical_digestive" class="mr-2">Mechanical
                                        / Digestive Problem (1
                                        point)</label>
                                    <label class="inline-flex items-center"><input type="checkbox"
                                            name="nutrition_risk[]" value="low_albumin" class="mr-2">Low Albumin (1
                                        point)</label>
                                    <label class="inline-flex items-center"><input type="checkbox"
                                            name="nutrition_risk[]" value="significant_lab" class="mr-2">Significant Lab
                                        Result (1 point)</label>
                                    <label class="inline-flex items-center"><input type="checkbox"
                                            name="nutrition_risk[]" value="others" class="mr-2">Others (1 point)</label>

                                    <div class="mt-2">
                                        <label class="block text-xs font-semibold text-slate-600">Total Points</label>
                                        <input type="number" id="nutritionRiskTotal" name="nutrition_risk_total" min="0" readonly
                                            class="mt-1 w-24 p-2 border rounded bg-slate-100" placeholder="0">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
            </table>


            <div class="mb-4 thin-border p-3 text-sm">
                <h3 class="font-semibold mb-2">Nutrition Diagnosis & Intervention</h3>
                <div class="mb-2">
                    <label class="block text-xs">Nutrition Diagnosis / Problem</label>
                    <textarea name="nutrition_diagnosis" rows="2" class="mt-1 w-full p-2 border rounded"></textarea>
                </div>
                <div class="grid grid-cols-2 gap-3">
                    <div>
                        <label class="block text-xs">Nutrition Intervention</label>
                        <div class="grid grid-rows-1 mt-1 space-y-2 text-sm">
                            <label class="inline-flex items-center"><input type="checkbox" class="mr-2">Shift diet
                                to</label>
                            <label class="inline-flex items-center"><input type="checkbox" class="mr-2">Nutrition
                                Education</label>
                            <label class="inline-flex items-center"><input type="checkbox" class="mr-2">Request for
                                Laboratory Data</label>
                            <label class="inline-flex items-center"><input type="checkbox" class="mr-2">Others</label>
                        </div>
                    </div>
                    <div>
                        <label class="block text-xs">Total Energy Requirement / Macro</label>
                        <input class="mt-1 w-full p-2 border rounded" placeholder="Total Energy">
                        <input class="mt-1 w-full p-2 border rounded" placeholder="Total Carbohydrates">
                        <input class="mt-1 w-full p-2 border rounded" placeholder="Total Protein">
                        <input class="mt-1 w-full p-2 border rounded" placeholder="Total Fat">
                    </div>
                </div>
            </div>

            <div class="mb-4 thin-border p-3 text-sm">
                <h3 class="font-semibold mb-2">Nutrition Monitoring & Evaluation</h3>
                <div class="grid grid-cols-2 gap-3">
                    <div>
                        <label class="inline-flex items-center"><input type="checkbox" class="mr-2">Adequacy of
                            intake: </label>
                        <label class="inline-flex items-center"><input type="radio" class="mr-2">Calories</label>
                        <label class="inline-flex items-center"><input type="radio" class="mr-2">Protein</label>
                        <label class="inline-flex items-center"><input type="radio" class="mr-2">Fluid</label>
                        <label class="inline-flex items-center"><input type="checkbox" class="mr-2">GI
                            Tolerance</label>
                    </div>
                    <div class="grid grid-rows-1 ">
                        <label class="inline-flex items-center"><input type="checkbox" class="mr-2">Compliance to
                            Diet</label>
                        <label class="inline-flex items-center"><input type="checkbox" class="mr-2">Weight
                            changes</label>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-2 gap-3 mt-6">
                <div>
                    <label class="block text-xs underline italic">Prepared by:</label>
                    <input class="mt-1 w-auto p-2 border-0 border-b border-gray-300" placeholder="Name of RND">
                </div>
                <div>
                    <label class="block text-xs">Conforme (Attending Physician)</label>
                    <input class="mt-1 w-auto p-2 border-0 border-b border-gray-300" placeholder="Name of MD">
                </div>
            </div>

            <div class="mt-6 flex gap-3 justify-end no-print">
                <button type="button" onclick="window.print()" class="px-4 py-2 bg-indigo-600 text-white rounded">Print
                    / Export PDF</button>
                <button type="button" id="clearBtn" class="px-4 py-2 bg-slate-200 rounded">Clear</button>
                <button type="button" id="saveBtn" class="px-4 py-2 bg-emerald-600 text-white rounded">Save</button>
            </div>
        </form>
    </div>

    <script>
        document.getElementById('clearBtn')?.addEventListener('click', () => {
            const form = document.querySelector('form');
            if (form) form.reset();
            // ensure total resets visually
            const total = document.getElementById('nutritionRiskTotal');
            if (total) total.value = '';
            // hide weight details when cleared
            const details = document.getElementById('unintentionalWeightDetails');
            if (details) details.style.display = 'none';
        });

        // Points mapping for nutrition risk checkboxes
        const NUTRITION_RISK_POINTS = {
            screening_criteria: 1,
            percent_ibw: 1,
            unintentional_weight_loss: 2,
            mechanical_digestive: 1,
            low_albumin: 1,
            significant_lab: 1,
            others: 1
        };

        function computeNutritionRiskTotal() {
            const totalInput = document.getElementById('nutritionRiskTotal');
            if (!totalInput) return;
            const checkboxes = Array.from(document.querySelectorAll('input[name="nutrition_risk[]"]'));
            let sum = 0;
            checkboxes.forEach(cb => {
                if (cb.checked) {
                    const val = cb.value;
                    if (NUTRITION_RISK_POINTS.hasOwnProperty(val)) {
                        sum += Number(NUTRITION_RISK_POINTS[val]) || 0;
                    }
                }
            });
            totalInput.value = sum;
        }

        function toggleUnintentionalDetails() {
            const cb = document.querySelector('input[name="nutrition_risk[]"][value="unintentional_weight_loss"]');
            const details = document.getElementById('unintentionalWeightDetails');
            if (!details || !cb) return;
            details.style.display = cb.checked ? 'flex' : 'none';
        }

        document.addEventListener('DOMContentLoaded', () => {
            // initialize
            toggleUnintentionalDetails();
            computeNutritionRiskTotal();

            // listen to nutrition risk checkboxes
            const checkboxes = Array.from(document.querySelectorAll('input[name="nutrition_risk[]"]'));
            checkboxes.forEach(cb => {
                cb.addEventListener('change', () => {
                    if (cb.value === 'unintentional_weight_loss') toggleUnintentionalDetails();
                    computeNutritionRiskTotal();
                });
            });

            // Save handler: validate unintentional weight loss details when checked
            const saveBtn = document.getElementById('saveBtn');
            const form = document.querySelector('form');
            if (saveBtn && form) {
                saveBtn.addEventListener('click', (e) => {
                    const unintentionalCb = document.querySelector('input[name="nutrition_risk[]"][value="unintentional_weight_loss"]');
                    const percentInput = document.querySelector('input[name="unintentional_weight_loss_percent"]');
                    const durationInput = document.querySelector('input[name="unintentional_weight_loss_duration"]');
                    const errorEl = document.getElementById('unintentionalError');

                    if (unintentionalCb && unintentionalCb.checked) {
                        const pct = percentInput ? Number(percentInput.value) : 0;
                        const dur = durationInput ? Number(durationInput.value) : 0;
                        if (!pct || pct <= 0 || !dur || dur <= 0) {
                            // invalid
                            if (errorEl) errorEl.style.display = 'inline';
                            if (percentInput && (!pct || pct <= 0)) percentInput.focus();
                            return; // prevent save
                        }
                        if (errorEl) errorEl.style.display = 'none';
                    }

                    // All validations passed — submit form (will follow default behaviour)
                    form.submit();
                });
            }
        });
    </script>
</body>

</html>