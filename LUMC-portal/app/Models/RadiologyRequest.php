<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RadiologyRequest extends Model
{
    protected $fillable = [
        'date','rad_file','hospital_no','ward','source','modality',
        'family_name','given_name','middle_name','address','dob','age','sex',
        'examination','clinical_diagnosis','findings',
        'radiologist_interpretation','requesting_physician'
    ];

    protected $casts = [
        'source' => 'array',
        'date' => 'date',
        'dob' => 'date',
    ];
}
