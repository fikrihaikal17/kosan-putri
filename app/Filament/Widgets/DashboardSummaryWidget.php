<?php

namespace App\Filament\Widgets;

use App\Models\BusinessSetting;
use App\Models\Facility;
use App\Models\Faq;
use App\Models\Gallery;
use App\Models\PageView;
use App\Models\Room;
use Filament\Widgets\Concerns\CanPoll;
use Filament\Widgets\Widget;
use Illuminate\Support\Facades\DB;

class DashboardSummaryWidget extends Widget
{
    use CanPoll;

    protected string $view = 'filament.widgets.dashboard-summary';

    protected static ?int $sort = 3;

    protected ?string $pollingInterval = '5s';

    protected int|string|array $columnSpan = 'full';

    public function getViewData(): array
    {
        $setting = BusinessSetting::first();
        $totalRooms = Room::count();
        $activeRooms = Room::where('is_active', true)->count();
        $totalFacilities = Facility::where('is_active', true)->count();
        $totalGalleries = Gallery::where('is_active', true)->count();
        $totalFaqs = Faq::where('is_active', true)->count();

        // Real-time analytics aggregations
        $todayViews = PageView::whereDate('created_at', today())->count();
        $todayVisitors = PageView::whereDate('created_at', today())->distinct('ip_address')->count('ip_address');
        $monthViews = PageView::whereMonth('created_at', now()->month)->whereYear('created_at', now()->year)->count();
        $monthVisitors = PageView::whereMonth('created_at', now()->month)->whereYear('created_at', now()->year)->distinct('ip_address')->count('ip_address');

        // Most visited public page
        $topPage = PageView::select('path', DB::raw('count(*) as total'))
            ->groupBy('path')
            ->orderByDesc('total')
            ->first();

        $topPageName = match ($topPage?->path) {
            '/' => 'Beranda Utama (/)',
            '/kamar' => 'Pilihan Kamar (/kamar)',
            '/fasilitas' => 'Fasilitas Kos (/fasilitas)',
            '/galeri' => 'Galeri Foto (/galeri)',
            '/lokasi' => 'Peta & Lokasi (/lokasi)',
            '/faq' => 'Tanya Jawab FAQ (/faq)',
            default => $topPage?->path ?? 'Beranda Utama (/)',
        };

        return [
            'setting' => $setting,
            'totalRooms' => $totalRooms,
            'activeRooms' => $activeRooms,
            'totalFacilities' => $totalFacilities,
            'totalGalleries' => $totalGalleries,
            'totalFaqs' => $totalFaqs,
            'todayViews' => $todayViews,
            'todayVisitors' => $todayVisitors,
            'monthViews' => $monthViews,
            'monthVisitors' => $monthVisitors,
            'topPageName' => $topPageName,
            'topPageHits' => $topPage?->total ?? 0,
        ];
    }
}
