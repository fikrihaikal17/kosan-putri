<?php

namespace App\Filament\Resources\Galleries\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class GalleryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->columns(1)
            ->components([
                Section::make('Foto & Keterangan Galeri')
                    ->columnSpanFull()
                    ->schema([
                        TextInput::make('title')
                            ->label('Judul Foto')
                            ->required()
                            ->maxLength(255),

                        Select::make('category')
                            ->label('Kategori')
                            ->options([
                                'Kamar' => 'Kamar',
                                'Kamar Mandi' => 'Kamar Mandi',
                                'Dapur' => 'Dapur',
                                'Area Bersama' => 'Area Bersama',
                                'Eksterior' => 'Eksterior & Gerbang',
                                'Fasilitas' => 'Fasilitas',
                            ])
                            ->default('Kamar')
                            ->required(),

                        FileUpload::make('image_path')
                            ->label('File Foto')
                            ->disk('public')
                            ->directory('gallery')
                            ->image()
                            ->imageEditor()
                            ->required()
                            ->columnSpanFull(),

                        TextInput::make('alt_text')
                            ->label('Alt Text (Aksesibilitas / SEO)')
                            ->maxLength(255),

                        Textarea::make('caption')
                            ->label('Keterangan / Deskripsi Foto')
                            ->rows(2)
                            ->columnSpanFull(),

                        Toggle::make('is_active')
                            ->label('Tampilkan di Galeri Publik')
                            ->default(true),

                        TextInput::make('sort_order')
                            ->label('Urutan')
                            ->numeric()
                            ->default(0),
                    ])->columns(2),
            ]);
    }
}
