<?php

namespace App\Filament\Resources\BusinessSettings;

use App\Filament\Resources\BusinessSettings\Pages\EditBusinessSetting;
use App\Filament\Resources\BusinessSettings\Schemas\BusinessSettingForm;
use App\Models\BusinessSetting;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;

class BusinessSettingResource extends Resource
{
    protected static ?string $model = BusinessSetting::class;

    protected static ?string $navigationLabel = 'Informasi Kos & Kontak';

    protected static ?string $modelLabel = 'Informasi Kos';

    protected static ?string $pluralModelLabel = 'Informasi Kos & Kontak';

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-cog-6-tooth';

    protected static ?int $navigationSort = 7;

    public static function form(Schema $schema): Schema
    {
        return BusinessSettingForm::configure($schema);
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
            'index' => EditBusinessSetting::route('/'),
        ];
    }
}
