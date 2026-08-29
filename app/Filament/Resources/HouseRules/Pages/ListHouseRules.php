<?php

namespace App\Filament\Resources\HouseRules\Pages;

use App\Filament\Resources\HouseRules\HouseRuleResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListHouseRules extends ListRecords
{
    protected static string $resource = HouseRuleResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
