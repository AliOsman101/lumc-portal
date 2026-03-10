<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LaboratoryRequest extends Model
{
    protected $fillable = [
        'date_of_request',
        'hospital_no',
        'receipt_number',
        'ward_phic',

        'surname',
        'first_name',
        'middle_name',
        'address',

        'birth_date',
        'age',
        'gender',
        'civil_status',

        'clinical_diagnosis',
        'requesting_physician',

        'request_type',
        'justification',

        'hematology',
        'blood_typing',
        'serology',

        'chemistry',
        'lipid_profile',
        'serum_electrolytes',
        'renal_profile',
        'hbt_profile',

        'clinical_microscopy',
        'microbiology',

        'micro_specimen',
        'antibiotics_taken',
        'duration',

        'others',

        'footer_date',
        'request_received',
        'specimen_collected',
        'test_started',
        'test_done',
        'pages',
    ];

    protected $casts = [
        'date_of_request' => 'date',
        'birth_date' => 'date',
        'footer_date' => 'date',

        'hematology' => 'array',
        'serology' => 'array',
        'chemistry' => 'array',
        'lipid_profile' => 'array',
        'serum_electrolytes' => 'array',
        'renal_profile' => 'array',
        'hbt_profile' => 'array',
        'clinical_microscopy' => 'array',
        'microbiology' => 'array',

        'blood_typing' => 'boolean',
    ];
}