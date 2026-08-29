<?php

namespace App\Filament\Resources\Faqs\Schemas;

use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class FaqForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->columns(1)
            ->components([
                Section::make('Tanya Jawab (FAQ)')
                    ->columnSpanFull()
                    ->schema([
                        Textarea::make('question')
                            ->label('Pertanyaan')
                            ->required()
                            ->rows(2)
                            ->columnSpanFull(),

                        Textarea::make('answer')
                            ->label('Jawaban Resmi')
                            ->required()
                            ->rows(4)
                            ->columnSpanFull(),

                        Toggle::make('is_active')
                            ->label('Tampilkan di Website')
                            ->default(true),

                        TextInput::make('sort_order')
                            ->label('Urutan')
                            ->numeric()
                            ->default(0),
                    ])->columns(2),
            ]);
    }
}
