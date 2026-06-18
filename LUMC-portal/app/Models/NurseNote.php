<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NurseNote extends Model
{
    protected $fillable = [
        'user_id',
        'last_name',
        'given_name',
        'middle_name',
        'hospital_case_no',
        'permanent_address',
        'tel_no',
        'ward_service',
        'sex',
        'civil_status',
        'date_shift',
        'signature',
        'notes',
    ];
}