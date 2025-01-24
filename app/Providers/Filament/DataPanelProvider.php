<?php

namespace App\Providers\Filament;

use App\Filament\Resources\LaporIzinOssResource;
use App\Filament\Resources\LaporIzinResource;
use App\Filament\Resources\SektorResource;

use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\AuthenticateSession;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Pages;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Filament\Widgets;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;

class DataPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->id('data')
            ->path('data')
            ->spa()
            ->colors([
                'danger' => Color::Rose,
                'gray' => Color::Gray,
                'info' => Color::Blue,
                'primary' => Color::Indigo,
                'success' => Color::Emerald,
                'warning' => Color::Orange,
            ])
            ->font('Poppins')
            ->sidebarFullyCollapsibleOnDesktop()
            ->topNavigation()
            ->discoverResources(in: app_path('Filament/Data/Resources'), for: 'App\\Filament\\Data\\Resources')
            ->discoverPages(in: app_path('Filament/Data/Pages'), for: 'App\\Filament\\Data\\Pages')
            ->pages([
            ])
            ->discoverWidgets(in: app_path('Filament/Data/Widgets'), for: 'App\\Filament\\Data\\Widgets')
            ->widgets([
                LaporIzinResource\Widgets\LaporIzinChart::class,
                LaporIzinOssResource\Widgets\LaporIzinOssChart::class,
                SektorResource\Widgets\SektorOverview::class,
            ])
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                ShareErrorsFromSession::class,
                VerifyCsrfToken::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
            ]);
    }
}
