<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NutritionScreening extends Model
{
    protected $fillable = [
        'user_id',
        'patient_name','address','age','sex','height','weight',
        'clinical_conditions','intake_weight_history',
        'others_a','others_b',
        'nurse_printed_name','nurse_signature','nurse_datetime',
        'diagnosis','diet_prescription','diet_type',
        'physician_printed_name','physician_signature','physician_datetime',
    ];

    protected $casts = [
        'clinical_conditions' => 'array',
        'intake_weight_history' => 'array',
    ];
}