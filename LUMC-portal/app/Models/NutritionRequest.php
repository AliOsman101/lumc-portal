<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NutritionRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'date', 'patient_name', 'hospital_no', 'age', 'gender', 'attending_physician', 'admission_date', 'diagnosis', 'religion',
        'food_intake', 'functional_assessment', 'height_cm', 'weight_kg', 'usual_weight_kg', 'bmi', 'weight_change_pct', 'percent_ibw',
        'labs', 'total_points', 'risk', 'nutrition_diagnosis', 'nutrition_intervention',
        'total_energy', 'total_carbohydrates', 'total_protein', 'total_fat', 'monitoring', 'prepared_by', 'conforme'
    ];

    protected $casts = [
        'labs' => 'array',
        'date' => 'date',
        'admission_date' => 'date',
    ];
}
