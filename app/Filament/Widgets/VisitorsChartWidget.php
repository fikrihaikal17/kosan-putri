<?php

namespace App\Filament\Widgets;

use App\Models\PageView;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Carbon;

class VisitorsChartWidget extends ChartWidget
{
    protected ?string $heading = 'Grafik Pengunjung Web Real-Time';

    protected ?string $description = 'Statistik kunjungan & tampilan halaman aktual (diperbarui otomatis secara real-time)';

    protected static ?int $sort = 2;

    protected ?string $pollingInterval = '5s';

    protected int|string|array $columnSpan = 'full';

    public ?string $filter = '7';

    protected function getFilters(): ?array
    {
        return [
            'today' => 'Hari Ini (Real-Time)',
            '7' => '7 Hari Terakhir',
            '14' => '14 Hari Terakhir',
            '30' => '30 Hari Terakhir',
        ];
    }

    protected function getData(): array
    {
        $labels = [];
        $visitorsData = [];
        $pageViewsData = [];

        if ($this->filter === 'today') {
            $today = Carbon::today();
            $currentHour = (int) Carbon::now()->format('H');

            // Hourly breakdown for today
            $hourlyStats = PageView::whereDate('created_at', $today)
                ->selectRaw('HOUR(created_at) as hour_num, COUNT(*) as total_views, COUNT(DISTINCT ip_address) as unique_visitors')
                ->groupBy('hour_num')
                ->get()
                ->keyBy('hour_num');

            for ($hour = 0; $hour <= 23; $hour++) {
                $labels[] = sprintf('%02d:00', $hour);
                $stat = $hourlyStats->get($hour);
                $views = $stat ? (int) $stat->total_views : 0;
                $visitors = $stat ? (int) $stat->unique_visitors : 0;

                $pageViewsData[] = $views;
                $visitorsData[] = $visitors;
            }
        } else {
            $days = match ($this->filter) {
                '14' => 14,
                '30' => 30,
                default => 7,
            };

            $startDate = Carbon::now()->subDays($days - 1)->startOfDay();
            $endDate = Carbon::now()->endOfDay();

            $dailyStats = PageView::whereBetween('created_at', [$startDate, $endDate])
                ->selectRaw('DATE(created_at) as view_date, COUNT(*) as total_views, COUNT(DISTINCT ip_address) as unique_visitors')
                ->groupBy('view_date')
                ->get()
                ->keyBy('view_date');

            for ($i = $days - 1; $i >= 0; $i--) {
                $date = Carbon::now()->subDays($i);
                $dateString = $date->format('Y-m-d');
                $labels[] = $date->translatedFormat('D, d M');

                $stat = $dailyStats->get($dateString);
                $views = $stat ? (int) $stat->total_views : 0;
                $visitors = $stat ? (int) $stat->unique_visitors : 0;

                $pageViewsData[] = $views;
                $visitorsData[] = $visitors;
            }
        }

        return [
            'datasets' => [
                [
                    'label' => 'Total Tampilan Halaman (Page Views)',
                    'data' => $pageViewsData,
                    'borderColor' => '#FF5E8A',
                    'backgroundColor' => 'rgba(255, 94, 138, 0.15)',
                    'fill' => true,
                    'tension' => 0.35,
                    'borderWidth' => 3,
                    'pointBackgroundColor' => '#FF5E8A',
                    'pointBorderColor' => '#111111',
                    'pointBorderWidth' => 2,
                    'pointRadius' => 4,
                ],
                [
                    'label' => 'Pengunjung Unik (Unique Visitors)',
                    'data' => $visitorsData,
                    'borderColor' => '#EAB308',
                    'backgroundColor' => 'rgba(255, 230, 0, 0.25)',
                    'fill' => true,
                    'tension' => 0.35,
                    'borderWidth' => 3,
                    'pointBackgroundColor' => '#FFE600',
                    'pointBorderColor' => '#111111',
                    'pointBorderWidth' => 2,
                    'pointRadius' => 4,
                ],
            ],
            'labels' => $labels,
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }

    protected function getOptions(): array
    {
        return [
            'scales' => [
                'y' => [
                    'beginAtZero' => true,
                    'suggestedMin' => 0,
                    'suggestedMax' => 5,
                    'ticks' => [
                        'precision' => 0,
                        'stepSize' => 1,
                    ],
                    'grid' => [
                        'color' => '#E5E5E5',
                    ],
                ],
                'x' => [
                    'grid' => [
                        'display' => false,
                    ],
                ],
            ],
            'plugins' => [
                'legend' => [
                    'display' => true,
                    'position' => 'bottom',
                ],
            ],
        ];
    }
}
