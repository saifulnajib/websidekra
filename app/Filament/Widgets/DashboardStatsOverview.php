<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\UmkmOwner;
use App\Models\Product;
use App\Models\User;
use Filament\Widgets\StatsOverviewWidget\StatsOverviewWidget;
class DashboardStatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Jumlah UMKM', UmkmOwner::count())
                ->description('Total UMKM terdaftar')
                ->descriptionIcon('heroicon-m-building-storefront')
                ->color('success')
                ->extraAttributes([
                    'class' => 'custom-hover-card',
                ]),
            Stat::make('Jumlah Produk', Product::count())
                ->description('Total produk tersedia')
                ->descriptionIcon('heroicon-m-shopping-bag')
                ->color('primary')
                ->extraAttributes([
                    'class' => 'custom-hover-card',
                ]),
            Stat::make('Jumlah Pengguna', User::count())
                ->description('Total Pengguna terdaftar')
                ->descriptionIcon('heroicon-m-user')
                ->color('danger')
                ->extraAttributes([
                    'class' => 'custom-hover-card',
                ]),
        ];
    }
}
