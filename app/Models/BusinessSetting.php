<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BusinessSetting extends Model
{
    protected $fillable = [
        'business_name',
        'short_name',
        'tagline',
        'description',
        'about_text',
        'trust_line',
        'max_occupants',
        'whatsapp_number',
        'whatsapp_formatted',
        'address',
        'latitude',
        'longitude',
        'city_district',
        'location_landmark',
        'parking_info',
        'survey_policy_note',
        'google_maps_url',
        'google_place_id',
        'google_maps_embed_url',
        'gate_closing_time',
        'logo_path',
        'seo_title',
        'seo_description',
        'og_image_path',
    ];

    protected static function booted(): void
    {
        static::saving(function ($model) {
            if (! empty($model->whatsapp_number)) {
                $raw = preg_replace('/[^0-9]/', '', $model->whatsapp_number);
                if (str_starts_with($raw, '62')) {
                    $raw = '0'.substr($raw, 2);
                }

                if (strlen($raw) >= 10) {
                    $model->whatsapp_formatted = substr($raw, 0, 4).'-'.substr($raw, 4, 4).'-'.substr($raw, 8);
                } else {
                    $model->whatsapp_formatted = $model->whatsapp_number;
                }
            }
        });
    }

    /**
     * Get the accurate Google Maps embed URL focusing directly on Kost Putri Ibu Idah.
     */
    public function getResolvedEmbedMapUrlAttribute(): string
    {
        if (! empty($this->google_maps_embed_url)) {
            return $this->google_maps_embed_url;
        }

        // If coordinates are set, generate high-precision embed with marker at zoom 18
        if (! empty($this->latitude) && ! empty($this->longitude)) {
            return "https://maps.google.com/maps?q={$this->latitude},{$this->longitude}&z=18&output=embed";
        }

        if (! empty($this->address)) {
            return 'https://maps.google.com/maps?q='.urlencode($this->address).'&z=18&output=embed';
        }

        return '';
    }

    /**
     * Singleton accessor for business settings.
     */
    public static function get(): self
    {
        return static::firstOrCreate(
            ['id' => 1],
            [
                'business_name' => 'Kost Putri Ibu Idah',
                'short_name' => 'Kost Ibu Idah',
                'tagline' => 'Tempat tinggal nyaman untuk putri, dengan fasilitas yang praktis untuk kebutuhan sehari-hari.',
                'description' => 'Kos khusus putri dengan kasur, Wi-Fi, listrik dan air termasuk, serta pilihan kamar mandi dalam maupun sharing.',
                'about_text' => 'Kost Putri Ibu Idah merupakan tempat tinggal khusus putri yang mengutamakan kenyamanan dan kepraktisan untuk mahasiswa maupun pekerja. Dengan fasilitas yang telah tersedia serta listrik dan air yang sudah termasuk dalam biaya kos, penghuni dapat tinggal dengan lebih praktis untuk menjalani aktivitas sehari-hari.',
                'trust_line' => 'Kos Putri • Maks. 2 Orang/Kamar • Listrik & Air Termasuk',
                'max_occupants' => 2,
                'whatsapp_number' => '081339259179',
                'whatsapp_formatted' => '0813-3925-9179',
                'address' => 'Jalan K. H. Zakaria No.82, RT.3/RW.14, Ds. Dewasari, Cijeungjing, Kab. Ciamis, Jawa Barat, 46271',
                'latitude' => '-7.3226066',
                'longitude' => '108.3780388',
                'city_district' => 'Ds. Dewasari, Kec. Cijeungjing, Kab. Ciamis, Jawa Barat, 46271',
                'location_landmark' => 'Jl. K. H. Zakaria, Ds. Dewasari, Kec. Cijeungjing, Kab. Ciamis. Hubungi Ibu Idah untuk petunjuk arah detail.',
                'parking_info' => 'Tersedia garasi motor di dalam area kos khusus bagi penghuni.',
                'survey_policy_note' => 'Demi privasi dan keamanan penghuni, survey kamar fisik hanya dilayani dengan membuat janji terlebih dahulu melalui WhatsApp.',
                'google_maps_url' => 'https://maps.app.goo.gl/SjebDzqDyygXVm3V6',
                'google_place_id' => '0x8b96d290aad1c3ab:0x25e81025801d51c9',
                'google_maps_embed_url' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d126632.90504739172!2d108.27803875896687!3d-7.322606637159948!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8b96d290aad1c3ab%3A0x25e81025801d51c9!2sKosan%20Putri%20Ibu%20Idah!5e0!3m2!1sid!2sid!4v1787967398353!5m2!1sid!2sid',
                'gate_closing_time' => '22.00 WIB',
                'seo_title' => 'Kost Putri Ibu Idah Ciamis | Kos Khusus Putri Nyaman & Praktis',
                'seo_description' => 'Kost Putri Ibu Idah adalah kos khusus mahasiswi dan karyawati di Ciamis (Dewasari, Cijeungjing). Fasilitas lengkap: kasur, Wi-Fi gratis, listrik & air termasuk sewa, pilihan kamar mandi dalam/luar, dapur, dan garasi motor.',
            ]
        );
    }
}
