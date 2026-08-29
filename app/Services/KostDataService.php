<?php

namespace App\Services;

use App\Models\BusinessSetting;
use App\Models\Facility;
use App\Models\Faq;
use App\Models\Gallery;
use App\Models\HouseRule;
use App\Models\Room;
use Illuminate\Database\Eloquent\Collection;

class KostDataService
{
    /**
     * Get business profile directly from database with fallback.
     */
    public function getBusiness(): array
    {
        try {
            $setting = BusinessSetting::first();
            if ($setting) {
                return [
                    'name' => $setting->business_name,
                    'short_name' => $setting->short_name,
                    'tagline' => $setting->tagline,
                    'description' => $setting->description,
                    'about_text' => $setting->about_text,
                    'trust_line' => $setting->trust_line,
                    'max_occupants' => $setting->max_occupants,
                    'gate_closing_time' => $setting->gate_closing_time,
                    'seo_title' => $setting->seo_title,
                    'seo_description' => $setting->seo_description,
                    'og_title' => $setting->resolved_og_title,
                    'og_description' => $setting->resolved_og_description,
                    'og_image_url' => $setting->resolved_og_image_url,
                ];
            }
        } catch (\Throwable) {
            // Fallback to static config
        }

        return config('kost.business', []);
    }

    /**
     * Get contact details directly from database.
     */
    public function getContact(): array
    {
        try {
            $setting = BusinessSetting::first();
            if ($setting) {
                return [
                    'whatsapp_number' => $setting->whatsapp_number,
                    'whatsapp_formatted' => $setting->whatsapp_formatted,
                    'address' => $setting->address,
                    'latitude' => $setting->latitude,
                    'longitude' => $setting->longitude,
                    'google_place_id' => $setting->google_place_id,
                    'city_district' => $setting->city_district ?? 'Ds. Dewasari, Kec. Cijeungjing, Kab. Ciamis, Jawa Barat, 46271',
                    'location_landmark' => $setting->location_landmark ?? 'Jl. K. H. Zakaria, Ds. Dewasari, Kec. Cijeungjing, Kab. Ciamis. Hubungi Ibu Idah untuk petunjuk arah detail.',
                    'parking_info' => $setting->parking_info ?? 'Tersedia garasi motor di dalam area kos khusus bagi penghuni.',
                    'survey_policy_note' => $setting->survey_policy_note ?? 'Demi privasi dan keamanan penghuni, survey kamar fisik hanya dilayani dengan membuat janji terlebih dahulu melalui WhatsApp.',
                    'maps_url' => $setting->google_maps_url,
                    'maps_embed_url' => $setting->resolved_embed_map_url,
                    'gate_closing_time' => $setting->gate_closing_time,
                ];
            }
        } catch (\Throwable) {
            // Fallback
        }

        return config('kost.contact', []);
    }

    /**
     * Get active rooms from database.
     *
     * @return Collection<int, Room>
     */
    public function getActiveRooms(): Collection
    {
        try {
            return Room::active()->with(['images', 'facilities'])->get();
        } catch (\Throwable) {
            return new Collection;
        }
    }

    /**
     * Find a single room by slug.
     */
    public function findRoomBySlug(string $slug): ?Room
    {
        try {
            return Room::active()->where('slug', $slug)->with(['images', 'facilities'])->first();
        } catch (\Throwable) {
            return null;
        }
    }

    /**
     * Get active facilities.
     *
     * @return Collection<int, Facility>
     */
    public function getActiveFacilities(): Collection
    {
        try {
            return Facility::active()->get();
        } catch (\Throwable) {
            return new Collection;
        }
    }

    /**
     * Get active gallery items.
     *
     * @return Collection<int, Gallery>
     */
    public function getActiveGalleries(?string $category = null): Collection
    {
        try {
            $query = Gallery::active();
            if ($category && $category !== 'Semua') {
                $query->where('category', $category);
            }

            return $query->get();
        } catch (\Throwable) {
            return new Collection;
        }
    }

    /**
     * Get active house rules.
     *
     * @return Collection<int, HouseRule>
     */
    public function getActiveRules(): Collection
    {
        try {
            return HouseRule::active()->get();
        } catch (\Throwable) {
            return new Collection;
        }
    }

    /**
     * Get active FAQ items.
     *
     * @return Collection<int, Faq>
     */
    public function getActiveFaqs(): Collection
    {
        try {
            return Faq::active()->get();
        } catch (\Throwable) {
            return new Collection;
        }
    }

    /**
     * Generate a WhatsApp link with a custom or default prefilled message.
     */
    public function getWhatsAppUrl(?string $customMessage = null): string
    {
        $contact = $this->getContact();
        $number = $contact['whatsapp_number'] ?? '';
        $message = $customMessage ?: 'Halo Ibu Idah, saya melihat website Kost Putri Ibu Idah dan ingin menanyakan informasi kamar.';

        if (empty($number) || str_contains($number, '[') || $number === '[NOMOR WHATSAPP]') {
            return 'https://wa.me/?text='.urlencode($message);
        }

        $cleanNumber = preg_replace('/[^0-9]/', '', $number);
        if (str_starts_with($cleanNumber, '0')) {
            $cleanNumber = '62'.substr($cleanNumber, 1);
        }

        return 'https://wa.me/'.$cleanNumber.'?text='.urlencode($message);
    }

    /**
     * Generate a WhatsApp link for a specific room.
     */
    public function getRoomWhatsAppUrl(Room $room): string
    {
        $message = "Halo Ibu Idah, saya tertarik dengan kamar {$room->name}. Apakah kamar tersebut masih tersedia?";

        return $this->getWhatsAppUrl($message);
    }
}
