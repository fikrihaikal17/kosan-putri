<?php

namespace App\Filament\Resources\HouseRules\Schemas;

use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class HouseRuleForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->columns(1)
            ->components([
                Section::make('Aturan & Tata Tertib')
                    ->columnSpanFull()
                    ->schema([
                        TextInput::make('title')
                            ->label('Judul Aturan')
                            ->required()
                            ->maxLength(255),

                        Textarea::make('description')
                            ->label('Penjelasan / Keterangan Aturan')
                            ->rows(3)
                            ->columnSpanFull(),

                        Toggle::make('is_active')
                            ->label('Aktif / Ditampilkan')
                            ->default(true),

                        TextInput::make('sort_order')
                            ->label('Nomor Urut')
                            ->numeric()
                            ->default(0),
                    ])->columns(2),
            ]);
    }
}
