<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MedicationRecord extends Model
{
    protected $fillable = [
        'user_id',
        'last_name','given_name','middle_name',
        'hospital_case_no','ward_service',
        'permanent_address','tel_no',
        'sex','civil_status',
        'month',
        'grid',
    ];

    protected $casts = [
        'grid' => 'array',
    ];
}