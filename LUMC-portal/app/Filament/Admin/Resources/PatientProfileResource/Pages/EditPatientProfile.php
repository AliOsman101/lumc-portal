<?php

namespace App\Filament\Admin\Resources\PatientProfileResource\Pages;

use App\Filament\Admin\Resources\PatientProfileResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPatientProfile extends EditRecord
{
    protected static string $resource = PatientProfileResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
