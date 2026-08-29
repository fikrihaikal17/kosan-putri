<?php

namespace App\Filament\Resources\Locations;

use App\Filament\Resources\Locations\Pages\EditLocation;
use App\Filament\Resources\Locations\Schemas\LocationForm;
use App\Models\BusinessSetting;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;

class LocationResource extends Resource
{
    protected static ?string $model = BusinessSetting::class;

    protected static ?string $navigationLabel = 'Lokasi & Peta';

    protected static ?string $modelLabel = 'Lokasi & Peta';

    protected static ?string $pluralModelLabel = 'Lokasi & Peta';

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-map-pin';

    protected static ?int $navigationSort = 4;

    public static function form(Schema $schema): Schema
    {
        return LocationForm::configure($schema);
    }

    public static function canCreate(): bool
    {
        return false;
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => EditLocation::route('/'),
        ];
    }
}
