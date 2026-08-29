<?php

namespace App\Filament\Resources\BusinessSettings\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\ViewField;
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
                            ->helperText('Cukup masukkan 1 nomor (contoh: 081339259179). Format tampilan dan tautan chat akan otomatis diatur oleh sistem.')
                            ->placeholder('081339259179')
                            ->required()
                            ->columnSpanFull(),
                    ]),

                Section::make('Pengaturan Open Graph (OG) & Social Link Preview')
                    ->description('Atur tampilan judul, deskripsi, dan gambar pratinjau saat tautan website dibagikan ke WhatsApp, Facebook, Telegram, Discord, dan Twitter/X.')
                    ->columnSpanFull()
                    ->schema([
                        TextInput::make('og_title')
                            ->label('Judul Open Graph (Social Preview Title)')
                            ->placeholder('Kost Putri Ibu Idah')
                            ->helperText('Judul yang muncul di kartu pratinjau saat tautan dibagikan.')
                            ->maxLength(255),

                        Textarea::make('og_description')
                            ->label('Deskripsi Open Graph (Social Preview Description)')
                            ->placeholder('Kos khusus putri dengan kamar nyaman, Wi-Fi, listrik dan air termasuk, serta fasilitas bersama.')
                            ->helperText('Deskripsi singkat yang tampil di bawah judul pratinjau.')
                            ->rows(2)
                            ->columnSpanFull(),

                        FileUpload::make('og_image_path')
                            ->label('Gambar Open Graph Default (Social Link Preview Image)')
                            ->disk('public')
                            ->directory('branding')
                            ->image()
                            ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp', 'image/jpg'])
                            ->helperText('Rekomendasi ukuran: 1200 x 630 piksel (rasio 1.91:1) format JPG, PNG, atau WebP.')
                            ->columnSpanFull(),

                        ViewField::make('social_preview')
                            ->view('filament.components.social-preview')
                            ->columnSpanFull(),
                    ])->columns(1),

                Section::make('Pengaturan SEO Search Engine')
                    ->columnSpanFull()
                    ->schema([
                        TextInput::make('seo_title')
                            ->label('Judul SEO (Meta Title Google)')
                            ->maxLength(255),

                        Textarea::make('seo_description')
                            ->label('Deskripsi SEO (Meta Description Google)')
                            ->rows(2)
                            ->columnSpanFull(),

                        FileUpload::make('logo_path')
                            ->label('Logo Usaha')
                            ->disk('public')
                            ->directory('branding')
                            ->image(),
                    ])->columns(2),
            ]);
    }
}
