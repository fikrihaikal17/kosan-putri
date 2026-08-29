<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Services\KostDataService;
use Illuminate\Http\Request;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function __construct(
        protected KostDataService $kostData
    ) {}

    /**
     * Display the main landing page of Kost Putri Ibu Idah.
     */
    public function index(): View
    {
        $business = $this->kostData->getBusiness();
        $contact = $this->kostData->getContact();
        $highlights = config('kost.highlights', []);
        $rooms = $this->kostData->getActiveRooms();
        $facilities = $this->kostData->getActiveFacilities();
        $includedItems = [
            'in_rent' => $facilities->where('is_included', true),
            'shared' => $facilities->where('is_included', false),
        ];
        $gallery = $this->kostData->getActiveGalleries();
        $rules = $this->kostData->getActiveRules();
        $faq = $this->kostData->getActiveFaqs();
        $defaultWaUrl = $this->kostData->getWhatsAppUrl();

        return view('home', compact(
            'business',
            'contact',
            'highlights',
            'rooms',
            'includedItems',
            'facilities',
            'gallery',
            'rules',
            'faq',
            'defaultWaUrl'
        ));
    }

    /**
     * Display the rooms listing page.
     */
    public function rooms(): View
    {
        $business = $this->kostData->getBusiness();
        $contact = $this->kostData->getContact();
        $rooms = $this->kostData->getActiveRooms();
        $defaultWaUrl = $this->kostData->getWhatsAppUrl();

        return view('pages.rooms', compact('business', 'contact', 'rooms', 'defaultWaUrl'));
    }

    /**
     * Display a specific room detail page.
     */
    public function roomDetail(string $slug): View
    {
        $room = $this->kostData->findRoomBySlug($slug);

        if (! $room) {
            abort(404, 'Kamar tidak ditemukan atau belum aktif.');
        }

        $business = $this->kostData->getBusiness();
        $contact = $this->kostData->getContact();
        $otherRooms = Room::active()->where('id', '!=', $room->id)->get();
        $roomWaUrl = $this->kostData->getRoomWhatsAppUrl($room);
        $defaultWaUrl = $this->kostData->getWhatsAppUrl();

        return view('pages.room-detail', compact('business', 'contact', 'room', 'otherRooms', 'roomWaUrl', 'defaultWaUrl'));
    }

    /**
     * Display the facilities page.
     */
    public function facilities(): View
    {
        $business = $this->kostData->getBusiness();
        $contact = $this->kostData->getContact();
        $facilities = $this->kostData->getActiveFacilities();
        $defaultWaUrl = $this->kostData->getWhatsAppUrl();

        return view('pages.facilities', compact('business', 'contact', 'facilities', 'defaultWaUrl'));
    }

    /**
     * Display the gallery page.
     */
    public function gallery(Request $request): View
    {
        $business = $this->kostData->getBusiness();
        $contact = $this->kostData->getContact();
        $category = $request->query('kategori');
        $gallery = $this->kostData->getActiveGalleries($category);
        $categories = ['Semua', 'Kamar', 'Kamar Mandi', 'Dapur', 'Area Bersama', 'Eksterior', 'Fasilitas'];
        $defaultWaUrl = $this->kostData->getWhatsAppUrl();

        return view('pages.gallery', compact('business', 'contact', 'gallery', 'categories', 'category', 'defaultWaUrl'));
    }

    /**
     * Display the location & map page.
     */
    public function location(): View
    {
        $business = $this->kostData->getBusiness();
        $contact = $this->kostData->getContact();
        $defaultWaUrl = $this->kostData->getWhatsAppUrl();

        return view('pages.location', compact('business', 'contact', 'defaultWaUrl'));
    }

    /**
     * Display the FAQ page.
     */
    public function faq(): View
    {
        $business = $this->kostData->getBusiness();
        $contact = $this->kostData->getContact();
        $faqs = $this->kostData->getActiveFaqs();
        $defaultWaUrl = $this->kostData->getWhatsAppUrl();

        return view('pages.faq', compact('business', 'contact', 'faqs', 'defaultWaUrl'));
    }

    /**
     * Dynamic sitemap XML for search engine indexers.
     */
    public function sitemap(): \Illuminate\Http\Response
    {
        $baseUrl = 'https://kosanputri.kall.my.id';
        $rooms = $this->kostData->getActiveRooms();

        $urls = [
            ['loc' => $baseUrl.'/', 'priority' => '1.0', 'changefreq' => 'weekly'],
            ['loc' => $baseUrl.'/kamar', 'priority' => '0.9', 'changefreq' => 'weekly'],
        ];

        foreach ($rooms as $room) {
            $urls[] = [
                'loc' => $baseUrl.'/kamar/'.$room->slug,
                'priority' => '0.8',
                'changefreq' => 'monthly',
            ];
        }

        $urls[] = ['loc' => $baseUrl.'/fasilitas', 'priority' => '0.8', 'changefreq' => 'monthly'];
        $urls[] = ['loc' => $baseUrl.'/lokasi', 'priority' => '0.9', 'changefreq' => 'monthly'];
        $urls[] = ['loc' => $baseUrl.'/galeri', 'priority' => '0.8', 'changefreq' => 'weekly'];
        $urls[] = ['loc' => $baseUrl.'/faq', 'priority' => '0.8', 'changefreq' => 'monthly'];

        $xml = '<?xml version="1.0" encoding="UTF-8"?>';
        $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';
        foreach ($urls as $u) {
            $xml .= '<url>';
            $xml .= '<loc>'.htmlspecialchars($u['loc']).'</loc>';
            $xml .= '<lastmod>'.date('Y-m-d').'</lastmod>';
            $xml .= '<changefreq>'.$u['changefreq'].'</changefreq>';
            $xml .= '<priority>'.$u['priority'].'</priority>';
            $xml .= '</url>';
        }
        $xml .= '</urlset>';

        return response($xml, 200, ['Content-Type' => 'application/xml']);
    }

    /**
     * Dynamic robots.txt.
     */
    public function robots(): \Illuminate\Http\Response
    {
        $txt = "User-agent: *\n";
        $txt .= "Allow: /\n";
        $txt .= "Disallow: /admin\n";
        $txt .= "Disallow: /admin/*\n";
        $txt .= "Disallow: /livewire/*\n\n";
        $txt .= "User-agent: Googlebot\n";
        $txt .= "Allow: /\n";
        $txt .= "Allow: /images/\n";
        $txt .= "Allow: /logo/\n";
        $txt .= "Disallow: /admin\n";
        $txt .= "Disallow: /admin/*\n\n";
        $txt .= "User-agent: Googlebot-Image\n";
        $txt .= "Allow: /images/\n";
        $txt .= "Allow: /logo/\n";
        $txt .= "Allow: /\n\n";
        $txt .= "Sitemap: https://kosanputri.kall.my.id/sitemap.xml\n";

        return response($txt, 200, ['Content-Type' => 'text/plain']);
    }
}
