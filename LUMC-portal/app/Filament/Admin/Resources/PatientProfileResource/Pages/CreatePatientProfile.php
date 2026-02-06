<?php

namespace App\Filament\Admin\Resources\PatientProfileResource\Pages;

use App\Filament\Admin\Resources\PatientProfileResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreatePatientProfile extends CreateRecord
{
    protected static string $resource = PatientProfileResource::class;
}
