<?php

namespace App\Filament\Resources\Rooms\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class RoomForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->columns(1)
            ->components([
                Section::make('Informasi Dasar Kamar')
                    ->columnSpanFull()
                    ->schema([
                        TextInput::make('name')
                            ->label('Nama Tipe Kamar')
                            ->required()
                            ->maxLength(255)
                            ->live(onBlur: true)
                            ->afterStateUpdated(fn (string $operation, $state, callable $set) => $operation === 'create' ? $set('slug', Str::slug($state)) : null),

                        TextInput::make('slug')
                            ->label('Slug URL')
                            ->required()
                            ->maxLength(255)
                            ->unique(ignoreRecord: true),

                        Select::make('bathroom_type')
                            ->label('Tipe Kamar Mandi')
                            ->options([
                                'Kamar Mandi Dalam' => 'Kamar Mandi Dalam (Pribadi)',
                                'Kamar Mandi Sharing' => 'Kamar Mandi Sharing (Luar)',
                            ])
                            ->required()
                            ->default('Kamar Mandi Dalam'),

                        TextInput::make('capacity')
                            ->label('Kapasitas Maksimal (Orang)')
                            ->numeric()
                            ->default(2)
                            ->minValue(1)
                            ->maxValue(5)
                            ->required(),

                        TextInput::make('price')
                            ->label('Harga Sewa (Opsional)')
                            ->numeric()
                            ->prefix('Rp')
                            ->placeholder('Kosongkan jika belum dipublikasikan'),

                        TextInput::make('price_label')
                            ->label('Label Tampilan Harga')
                            ->default('Hubungi untuk informasi harga')
                            ->required(),

                        Select::make('availability_status')
                            ->label('Status Ketersediaan')
                            ->options([
                                'Tersedia' => 'Tersedia',
                                'Penuh' => 'Penuh',
                                'Hubungi untuk ketersediaan' => 'Hubungi untuk ketersediaan',
                            ])
                            ->default('Hubungi untuk ketersediaan')
                            ->required(),

                        Textarea::make('short_description')
                            ->label('Deskripsi Singkat')
                            ->rows(2)
                            ->maxLength(500),

                        Textarea::make('description')
                            ->label('Deskripsi Lengkap')
                            ->rows(4),

                        Textarea::make('notes')
                            ->label('Catatan Penting')
                            ->rows(2),
                    ])->columns(2),

                Section::make('Fasilitas Pokok & Status')
                    ->columnSpanFull()
                    ->schema([
                        Toggle::make('wifi')
                            ->label('Termasuk Wi-Fi')
                            ->default(true),

                        Toggle::make('electricity_included')
                            ->label('Termasuk Listrik')
                            ->default(true),

                        Toggle::make('water_included')
                            ->label('Termasuk Air')
                            ->default(true),

                        Toggle::make('is_active')
                            ->label('Tampilkan di Website (Aktif)')
                            ->default(true),

                        TextInput::make('sort_order')
                            ->label('Urutan Tampilan')
                            ->numeric()
                            ->default(0),
                    ])->columns(3),

                Section::make('Galeri Foto Kamar')
                    ->columnSpanFull()
                    ->schema([
                        Repeater::make('images')
                            ->relationship('images')
                            ->schema([
                                FileUpload::make('image_path')
                                    ->label('Foto Kamar')
                                    ->disk('public')
                                    ->directory('rooms')
                                    ->image()
                                    ->imageEditor()
                                    ->required(),

                                TextInput::make('caption')
                                    ->label('Keterangan Foto')
                                    ->maxLength(255),

                                Toggle::make('is_primary')
                                    ->label('Foto Utama')
                                    ->default(false),
                            ])
                            ->columns(3)
                            ->defaultItems(1)
                            ->reorderableWithButtons(),
                    ]),
            ]);
    }
}
