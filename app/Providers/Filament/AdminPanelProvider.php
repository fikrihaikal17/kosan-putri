<?php

namespace App\Providers\Filament;

use App\Filament\Pages\Dashboard;
use App\Filament\Widgets\DashboardSummaryWidget;
use App\Filament\Widgets\StatsOverviewWidget;
use App\Filament\Widgets\VisitorsChartWidget;
use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\AuthenticateSession;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Filament\Support\Enums\Width;
use Filament\View\PanelsRenderHook;
use Illuminate\Contracts\View\View;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\PreventRequestForgery;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;

class AdminPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->default()
            ->id('admin')
            ->path('admin')
            ->login()
            ->passwordReset()
            ->profile(\App\Filament\Pages\Auth\EditProfile::class, isSimple: false)
            ->brandName('Kost Putri Ibu Idah')
            ->brandLogo(fn (): View => view('filament.brand'))
            ->brandLogoHeight('2.5rem')
            ->favicon(asset('logo/logo.svg'))
            ->font('Instrument Sans')
            ->darkMode(false)
            ->maxContentWidth(Width::Full)
            ->colors([
                'primary' => [
                    50 => '#fff1f4',
                    100 => '#ffe4e9',
                    200 => '#fecdd7',
                    300 => '#fea3b7',
                    400 => '#fc6d8f',
                    500 => '#ff5e8a',
                    600 => '#e54874',
                    700 => '#be224e',
                    800 => '#9e1f44',
                    900 => '#831e3c',
                    950 => '#490b1e',
                ],
                'warning' => Color::Amber,
                'info' => Color::Sky,
                'success' => Color::Emerald,
                'gray' => Color::Slate,
            ])
            ->renderHook(
                PanelsRenderHook::HEAD_END,
                fn (): View => view('filament.custom-head'),
            )
            ->renderHook(
                PanelsRenderHook::AUTH_LOGIN_FORM_AFTER,
                fn (): View => view('filament.auth.login-after'),
            )
            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\Filament\Resources')
            ->discoverPages(in: app_path('Filament/Pages'), for: 'App\Filament\Pages')
            ->pages([
                Dashboard::class,
            ])
            ->discoverWidgets(in: app_path('Filament/Widgets'), for: 'App\Filament\Widgets')
            ->widgets([
                StatsOverviewWidget::class,
                VisitorsChartWidget::class,
                DashboardSummaryWidget::class,
            ])
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                PreventRequestForgery::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
            ])
            ->authMiddleware([
                Authenticate::class,
            ]);
    }
}
