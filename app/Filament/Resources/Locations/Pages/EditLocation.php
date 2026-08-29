<?php

namespace App\Filament\Resources\Locations\Pages;

use App\Filament\Resources\Locations\LocationResource;
use App\Models\BusinessSetting;
use Filament\Resources\Pages\EditRecord;

class EditLocation extends EditRecord
{
    protected static string $resource = LocationResource::class;

    public function mount(int|string|null $record = null): void
    {
        $setting = BusinessSetting::firstOrCreate(['id' => 1], [
            'business_name' => 'Kost Putri Ibu Idah',
            'address' => 'Jalan K. H. Zakaria No.82, RT.3/RW.14, Ds. Dewasari, Cijeungjing, Kab. Ciamis, Jawa Barat, 46271',
            'city_district' => 'Kab. Ciamis',
            'location_landmark' => 'Jl. K. H. Zakaria, Ds. Dewasari, Kec. Cijeungjing, Kab. Ciamis. Hubungi Ibu Idah untuk petunjuk arah detail.',
            'parking_info' => 'Tersedia garasi motor di dalam area kos khusus bagi penghuni.',
            'survey_policy_note' => 'Demi privasi dan keamanan penghuni, survey kamar fisik hanya dilayani dengan membuat janji terlebih dahulu melalui WhatsApp.',
            'google_maps_url' => 'https://maps.app.goo.gl/SjebDzqDyygXVm3V6',
            'google_maps_embed_url' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d126632.90504739172!2d108.27803875896687!3d-7.322606637159948!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8b96d290aad1c3ab%3A0x25e81025801d51c9!2sKosan%20Putri%20Ibu%20Idah!5e0!3m2!1sid!2sid!4v1787967398353!5m2!1sid!2sid',
            'gate_closing_time' => '22.00 WIB',
        ]);

        parent::mount($setting->getKey());
    }

    protected function getHeaderActions(): array
    {
        return [];
    }

    public function getTitle(): string
    {
        return 'Lokasi & Petunjuk Peta';
    }

    public function getHeading(): string
    {
        return 'Pengaturan Lokasi & Petunjuk Peta';
    }

    public function getSubheading(): ?string
    {
        return 'Kelola alamat resmi, tautan Google Maps, peta interaktif, patokan jalan, dan aturan akses gerbang kos yang ditampilkan pada halaman Lokasi & Petunjuk Arah.';
    }
}
