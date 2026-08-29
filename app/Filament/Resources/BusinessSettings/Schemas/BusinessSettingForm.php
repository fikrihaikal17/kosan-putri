<?php

namespace App\Filament\Resources\BusinessSettings\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class BusinessSettingForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->columns(1)
            ->components([
                Section::make('Identitas & Profil Usaha')
                    ->columnSpanFull()
                    ->schema([
                        TextInput::make('business_name')
                            ->label('Nama Usaha / Kos')
                            ->required()
                            ->maxLength(255),

                        TextInput::make('short_name')
                            ->label('Nama Singkat')
                            ->maxLength(255),

                        TextInput::make('trust_line')
                            ->label('Baris Tagline / Trust Line')
                            ->maxLength(255),

                        TextInput::make('tagline')
                            ->label('Headline Pendukung')
                            ->maxLength(500),

                        Textarea::make('description')
                            ->label('Deskripsi Singkat Usaha')
                            ->rows(3)
                            ->columnSpanFull(),

                        Textarea::make('about_text')
                            ->label('Teks Lengkap Tentang Kami')
                            ->rows(4)
                            ->columnSpanFull(),
                    ])->columns(2),

                Section::make('Kontak WhatsApp Resmi')
                    ->columnSpanFull()
                    ->schema([
                        TextInput::make('whatsapp_number')
                            ->label('Nomor WhatsApp Resmi (Ibu Idah)')
                            ->helperText('Cukup masukkan 1 nomor (contoh: 081339259173). Format tampilan dan tautan chat akan otomatis diatur oleh sistem.')
                            ->placeholder('081339259173')
                            ->required()
                            ->columnSpanFull(),
                    ]),

                Section::make('Pengaturan SEO & Media')
                    ->columnSpanFull()
                    ->schema([
                        TextInput::make('seo_title')
                            ->label('Judul SEO (Meta Title)')
                            ->maxLength(255),

                        Textarea::make('seo_description')
                            ->label('Deskripsi SEO (Meta Description)')
                            ->rows(2)
                            ->columnSpanFull(),

                        FileUpload::make('logo_path')
                            ->label('Logo Usaha')
                            ->disk('public')
                            ->directory('branding')
                            ->image(),

                        FileUpload::make('og_image_path')
                            ->label('Gambar Open Graph (Social Share)')
                            ->disk('public')
                            ->directory('branding')
                            ->image(),
                    ])->columns(2),
            ]);
    }
}
