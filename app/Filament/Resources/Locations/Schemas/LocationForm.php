<?php

namespace App\Filament\Resources\Locations\Schemas;

use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class LocationForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->columns(1)
            ->components([
                Section::make('Alamat Resmi & Koordinat Geografis')
                    ->description('Pastikan data alamat dan koordinat akurat menunjuk ke bangunan Kost Putri Ibu Idah.')
                    ->columnSpanFull()
                    ->schema([
                        TextInput::make('address')
                            ->label('Alamat Resmi Lengkap')
                            ->helperText('Contoh: Jalan K. H. Zakaria No. 82, RT. 3/RW. 14, Ds. Dewasari, Cijeungjing, Kab. Ciamis, Jawa Barat, 46271')
                            ->placeholder('Jalan K. H. Zakaria No. 82, RT. 3/RW. 14, Ds. Dewasari...')
                            ->required()
                            ->maxLength(500)
                            ->columnSpanFull(),

                        TextInput::make('city_district')
                            ->label('Wilayah Administratif')
                            ->helperText('Contoh: Ds. Dewasari, Kec. Cijeungjing, Kab. Ciamis, Jawa Barat, 46271')
                            ->default('Ds. Dewasari, Kec. Cijeungjing, Kab. Ciamis, Jawa Barat, 46271')
                            ->required()
                            ->maxLength(255),

                        TextInput::make('latitude')
                            ->label('Latitude (Garis Lintang)')
                            ->helperText('Koordinat latitude terverifikasi (contoh: -7.3226066)')
                            ->placeholder('-7.3226066')
                            ->required()
                            ->maxLength(50),

                        TextInput::make('longitude')
                            ->label('Longitude (Garis Bujur)')
                            ->helperText('Koordinat longitude terverifikasi (contoh: 108.3780388)')
                            ->placeholder('108.3780388')
                            ->required()
                            ->maxLength(50),

                        TextInput::make('google_place_id')
                            ->label('Google Place ID (Opsional)')
                            ->helperText('ID Tempat Google yang terverifikasi (contoh: 0x8b96d290aad1c3ab:0x25e81025801d51c9)')
                            ->placeholder('0x8b96d290aad1c3ab:0x25e81025801d51c9')
                            ->maxLength(255),

                        TextInput::make('google_maps_url')
                            ->label('URL Google Maps (Navigasi / Buka Peta)')
                            ->helperText('Tautan navigasi langsung ke titik Kost Putri Ibu Idah di aplikasi Google Maps.')
                            ->placeholder('https://maps.app.goo.gl/SjebDzqDyygXVm3V6')
                            ->required()
                            ->maxLength(500)
                            ->columnSpanFull(),

                        Textarea::make('google_maps_embed_url')
                            ->label('URL / Kode Embed Google Maps (Peta Interaktif)')
                            ->helperText('URL embed iframe resmi dengan zoom 17-19 berfokus pada Kost Putri Ibu Idah.')
                            ->rows(3)
                            ->columnSpanFull(),
                    ])->columns(2),

                Section::make('Petunjuk Arah, Parkir & Akses Gerbang')
                    ->columnSpanFull()
                    ->schema([
                        TextInput::make('gate_closing_time')
                            ->label('Jam Kunci Gerbang Malam')
                            ->default('22.00 WIB')
                            ->required(),

                        TextInput::make('parking_info')
                            ->label('Informasi Garasi & Parkir')
                            ->default('Tersedia garasi motor di dalam area kos khusus bagi penghuni.')
                            ->required()
                            ->maxLength(255),

                        Textarea::make('location_landmark')
                            ->label('Patokan Lokasi & Petunjuk Arah')
                            ->default('Jl. K. H. Zakaria, Ds. Dewasari, Kec. Cijeungjing, Kab. Ciamis. Hubungi Ibu Idah untuk petunjuk arah detail.')
                            ->rows(2)
                            ->columnSpanFull(),

                        Textarea::make('survey_policy_note')
                            ->label('Catatan Kebijakan Survey Kamar')
                            ->default('Demi privasi dan keamanan penghuni, survey kamar fisik hanya dilayani dengan membuat janji terlebih dahulu melalui WhatsApp.')
                            ->rows(2)
                            ->columnSpanFull(),
                    ])->columns(2),
            ]);
    }
}
