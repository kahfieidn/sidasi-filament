<?php

namespace App\Filament\Resources\LaporIzinOssResource\Widgets;

use Carbon\Carbon;
use App\Models\LaporIzinOss;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\Auth;
use Filament\Widgets\Concerns\InteractsWithPageFilters;

class LaporIzinOssChart extends ChartWidget
{
    protected static ?string $heading = 'Pelaporan OSS';
    use InteractsWithPageFilters;

    protected function getData(): array
    {

        $user_id_filter = $this->filters['user_id_filter'] ?? Auth::id();
        $tahun_filter = $this->filters['tahun_filter'] ?? Carbon::now()->year;

        $januari = LaporIzinOss::whereBulan('Januari')
            ->when($tahun_filter, function ($query, $tahun_filter) {
                return $query->whereTahun($tahun_filter);
            })->when($user_id_filter, function ($query, $user_id_filter) {
                return $query->where('user_id', $user_id_filter);
            })
            ->sum('jumlah_data');
        $februari = LaporIzinOss::whereBulan('Februari')
            ->when($tahun_filter, function ($query, $tahun_filter) {
                return $query->whereTahun($tahun_filter);
            })->when($user_id_filter, function ($query, $user_id_filter) {
                return $query->where('user_id', $user_id_filter);
            })
            ->sum('jumlah_data');
        $maret = LaporIzinOss::whereBulan('Maret')
            ->when($tahun_filter, function ($query, $tahun_filter) {
                return $query->whereTahun($tahun_filter);
            })->when($user_id_filter, function ($query, $user_id_filter) {
                return $query->where('user_id', $user_id_filter);
            })
            ->sum('jumlah_data');
        $april = LaporIzinOss::whereBulan('April')
            ->when($tahun_filter, function ($query, $tahun_filter) {
                return $query->whereTahun($tahun_filter);
            })->when($user_id_filter, function ($query, $user_id_filter) {
                return $query->where('user_id', $user_id_filter);
            })
            ->sum('jumlah_data');
        $mei = LaporIzinOss::whereBulan('Mei')
            ->when($tahun_filter, function ($query, $tahun_filter) {
                return $query->whereTahun($tahun_filter);
            })->when($user_id_filter, function ($query, $user_id_filter) {
                return $query->where('user_id', $user_id_filter);
            })
            ->sum('jumlah_data');
        $juni = LaporIzinOss::whereBulan('Juni')
            ->when($tahun_filter, function ($query, $tahun_filter) {
                return $query->whereTahun($tahun_filter);
            })->when($user_id_filter, function ($query, $user_id_filter) {
                return $query->where('user_id', $user_id_filter);
            })
            ->sum('jumlah_data');
        $juli = LaporIzinOss::whereBulan('Juli')
            ->when($tahun_filter, function ($query, $tahun_filter) {
                return $query->whereTahun($tahun_filter);
            })->when($user_id_filter, function ($query, $user_id_filter) {
                return $query->where('user_id', $user_id_filter);
            })
            ->sum('jumlah_data');
        $agustus = LaporIzinOss::whereBulan('Agustus')
            ->when($tahun_filter, function ($query, $tahun_filter) {
                return $query->whereTahun($tahun_filter);
            })->when($user_id_filter, function ($query, $user_id_filter) {
                return $query->where('user_id', $user_id_filter);
            })
            ->sum('jumlah_data');
        $september = LaporIzinOss::whereBulan('September')
            ->when($tahun_filter, function ($query, $tahun_filter) {
                return $query->whereTahun($tahun_filter);
            })->when($user_id_filter, function ($query, $user_id_filter) {
                return $query->where('user_id', $user_id_filter);
            })
            ->sum('jumlah_data');
        $oktober = LaporIzinOss::whereBulan('Oktober')
            ->when($tahun_filter, function ($query, $tahun_filter) {
                return $query->whereTahun($tahun_filter);
            })->when($user_id_filter, function ($query, $user_id_filter) {
                return $query->where('user_id', $user_id_filter);
            })
            ->sum('jumlah_data');
        $november = LaporIzinOss::whereBulan('November')
            ->when($tahun_filter, function ($query, $tahun_filter) {
                return $query->whereTahun($tahun_filter);
            })->when($user_id_filter, function ($query, $user_id_filter) {
                return $query->where('user_id', $user_id_filter);
            })
            ->sum('jumlah_data');
        $desember = LaporIzinOss::whereBulan('Desember')
            ->when($tahun_filter, function ($query, $tahun_filter) {
                return $query->whereTahun($tahun_filter);
            })->when($user_id_filter, function ($query, $user_id_filter) {
                return $query->where('user_id', $user_id_filter);
            })
            ->sum('jumlah_data');

        return [
            'datasets' => [
                [
                    'label' => 'Statistik Lapor Izin OSS',
                    'data' => [$januari, $februari, $maret, $april, $mei, $juni, $juli, $agustus, $september, $oktober, $november, $desember],
                    'backgroundColor' => '#36A2EB',
                    'borderColor' => '#9BD0F5',
                ],
            ],
            'labels' => ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],

        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}
