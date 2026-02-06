<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\PatientProfileResource\Pages;
use App\Filament\Admin\Resources\PatientProfileResource\RelationManagers;
use App\Models\PatientProfile;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PatientProfileResource extends Resource
{
    protected static ?string $model = PatientProfile::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPatientProfiles::route('/'),
            'create' => Pages\CreatePatientProfile::route('/create'),
            'edit' => Pages\EditPatientProfile::route('/{record}/edit'),
        ];
    }
}
