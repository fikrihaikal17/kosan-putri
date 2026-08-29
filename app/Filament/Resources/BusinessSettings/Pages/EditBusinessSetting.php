<?php

namespace App\Filament\Resources\BusinessSettings\Pages;

use App\Filament\Resources\BusinessSettings\BusinessSettingResource;
use App\Models\BusinessSetting;
use Filament\Resources\Pages\EditRecord;

class EditBusinessSetting extends EditRecord
{
    protected static string $resource = BusinessSettingResource::class;

    public function mount(int|string|null $record = null): void
    {
        $setting = BusinessSetting::firstOrCreate(['id' => 1], [
            'business_name' => 'Kost Putri Ibu Idah',
            'short_name' => 'Kost Ibu Idah',
            'tagline' => 'Tempat tinggal nyaman untuk putri, dengan fasilitas yang praktis untuk kebutuhan sehari-hari.',
            'description' => 'Kos khusus putri dengan kasur, Wi-Fi, listrik dan air termasuk, serta pilihan kamar mandi dalam maupun sharing.',
            'trust_line' => 'Kos Putri • Maks. 2 Orang/Kamar • Listrik & Air Termasuk',
            'max_occupants' => 2,
            'whatsapp_number' => '[NOMOR WHATSAPP]',
            'whatsapp_formatted' => '[NOMOR WHATSAPP]',
            'address' => 'Jalan K. H. Zakaria No.82, RT.3/RW.14, Ds. Dewasari, Cijeungjing, Kab. Ciamis, Jawa Barat, 46271',
            'google_maps_url' => 'https://maps.app.goo.gl/SjebDzqDyygXVm3V6',
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
        return 'Informasi Kos & Kontak';
    }

    public function getHeading(): string
    {
        return 'Pengaturan Informasi Kos & Kontak';
    }

    public function getSubheading(): ?string
    {
        return 'Kelola kontak WhatsApp, alamat, jam gerbang, peta Google Maps, dan identitas usaha yang ditampilkan di website.';
    }
}
