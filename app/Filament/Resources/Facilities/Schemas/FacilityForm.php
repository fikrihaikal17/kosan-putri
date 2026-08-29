<?php

namespace App\Filament\Resources\Facilities\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class FacilityForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->columns(1)
            ->components([
                Section::make('Detail Fasilitas')
                    ->columnSpanFull()
                    ->schema([
                        TextInput::make('name')
                            ->label('Nama Fasilitas')
                            ->required()
                            ->maxLength(255),

                        Select::make('icon')
                            ->label('Icon (Lucide)')
                            ->options([
                                'bed' => 'Kasur / Tempat Tidur (Bed)',
                                'wifi' => 'Wi-Fi / Internet (Wifi)',
                                'zap' => 'Listrik (Zap)',
                                'droplet' => 'Air Bersih (Droplet)',
                                'bath' => 'Kamar Mandi (Bath)',
                                'utensils' => 'Dapur / Memasak (Utensils)',
                                'sun' => 'Area Jemur (Sun)',
                                'bike' => 'Garasi Motor (Bike)',
                                'lock' => 'Keamanan / Gerbang (Lock)',
                                'shield' => 'Keamanan (Shield)',
                                'home' => 'Bangunan / Rumah (Home)',
                                'sparkles' => 'Lainnya (Sparkles)',
                            ])
                            ->default('sparkles')
                            ->required(),

                        Textarea::make('description')
                            ->label('Keterangan Fasilitas')
                            ->rows(3)
                            ->columnSpanFull(),

                        Toggle::make('is_included')
                            ->label('Termasuk dalam Biaya Kos Pokok')
                            ->helperText('Jika aktif, ditampilkan di bagian "Termasuk dalam Biaya". Jika tidak, masuk kelompok "Fasilitas Bersama".')
                            ->default(true),

                        Toggle::make('is_active')
                            ->label('Aktif / Ditampilkan')
                            ->default(true),

                        TextInput::make('sort_order')
                            ->label('Urutan')
                            ->numeric()
                            ->default(0),
                    ])->columns(2),
            ]);
    }
}
