<?php

namespace App\Filament\Resources\HouseRules;

use App\Filament\Resources\HouseRules\Pages\CreateHouseRule;
use App\Filament\Resources\HouseRules\Pages\EditHouseRule;
use App\Filament\Resources\HouseRules\Pages\ListHouseRules;
use App\Filament\Resources\HouseRules\Schemas\HouseRuleForm;
use App\Filament\Resources\HouseRules\Tables\HouseRulesTable;
use App\Models\HouseRule;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;

class HouseRuleResource extends Resource
{
    protected static ?string $model = HouseRule::class;

    protected static ?string $navigationLabel = 'Aturan Kost';

    protected static ?string $modelLabel = 'Aturan';

    protected static ?string $pluralModelLabel = 'Aturan Kost';

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-clipboard-document-list';

    protected static ?int $navigationSort = 6;

    public static function form(Schema $schema): Schema
    {
        return HouseRuleForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return HouseRulesTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListHouseRules::route('/'),
            'create' => CreateHouseRule::route('/create'),
            'edit' => EditHouseRule::route('/{record}/edit'),
        ];
    }
}
