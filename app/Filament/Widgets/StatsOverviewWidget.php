<?php

namespace App\Filament\Widgets;

use App\Models\Facility;
use App\Models\PageView;
use App\Models\Room;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Illuminate\Support\Carbon;

class StatsOverviewWidget extends BaseWidget
{
    protected static ?int $sort = 1;

    protected ?string $pollingInterval = '5s';

    protected function getStats(): array
    {
        $totalRooms = Room::count();
        $activeRooms = Room::where('is_active', true)->count();
        $totalFacilities = Facility::where('is_active', true)->count();

        // 100% Genuine Real-Time Traffic Metrics from Database
        $todayViews = PageView::whereDate('created_at', today())->count();
        $todayVisitors = PageView::whereDate('created_at', today())->distinct('ip_address')->count('ip_address');
        $monthViews = PageView::whereMonth('created_at', now()->month)->whereYear('created_at', now()->year)->count();
        $monthVisitors = PageView::whereMonth('created_at', now()->month)->whereYear('created_at', now()->year)->distinct('ip_address')->count('ip_address');

        // Genuine sparkline curves for the past 7 days matching the bottom chart
        $past7DaysViews = [];
        $past7DaysVisitors = [];
        for ($i = 6; $i >= 0; $i--) {
            $d = Carbon::today()->subDays($i);
            $past7DaysViews[] = PageView::whereDate('created_at', $d)->count();
            $past7DaysVisitors[] = PageView::whereDate('created_at', $d)->distinct('ip_address')->count('ip_address');
        }

        return [
            Stat::make('Total Tampilan Halaman', number_format($todayViews).' Views')
                ->description(number_format($monthViews).' views bulan ini')
                ->descriptionIcon('heroicon-m-eye')
                ->chart($past7DaysViews)
                ->color('primary'),

            Stat::make('Pengunjung Unik (Live)', number_format($todayVisitors).' Orang')
                ->description(number_format($monthVisitors).' pengunjung bulan ini')
                ->descriptionIcon('heroicon-m-user-group')
                ->chart($past7DaysVisitors)
                ->color('warning'),

            Stat::make('Status Pilihan Kamar', $activeRooms.' / '.$totalRooms.' Tipe')
                ->description('Kamar mandi dalam & luar aktif')
                ->descriptionIcon('heroicon-m-home')
                ->color('info'),

            Stat::make('Fasilitas & Layanan', $totalFacilities.' Fasilitas')
                ->description('Wi-Fi, kasur, listrik & air lengkap')
                ->descriptionIcon('heroicon-m-sparkles')
                ->color('success'),
        ];
    }
}
