<?php

namespace App\Filament\Resources\HouseRules\Pages;

use App\Filament\Resources\HouseRules\HouseRuleResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditHouseRule extends EditRecord
{
    protected static string $resource = HouseRuleResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
