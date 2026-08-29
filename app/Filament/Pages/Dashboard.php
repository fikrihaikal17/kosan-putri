<?php

namespace App\Filament\Pages;

use App\Filament\Widgets\DashboardSummaryWidget;
use App\Filament\Widgets\StatsOverviewWidget;
use App\Filament\Widgets\VisitorsChartWidget;
use Filament\Pages\Dashboard as BaseDashboard;

class Dashboard extends BaseDashboard
{
    protected static ?string $title = 'Dasbor Manajemen';

    public function getColumns(): int|array
    {
        return 1;
    }

    public function getWidgets(): array
    {
        return [
            StatsOverviewWidget::class,
            VisitorsChartWidget::class,
            DashboardSummaryWidget::class,
        ];
    }
}
