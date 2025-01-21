<?php

namespace App\Filament\Resources\LaporIzinOssResource\Widgets;

use App\Models\LaporIzinOss;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\Auth;

class LaporIzinOssChart extends ChartWidget
{
    protected static ?string $heading = 'Pelaporan OSS';

    protected function getData(): array
    {

        $januari = LaporIzinOss::whereBulan('Januari')->whereTahun(2024)->whereUserId(Auth::id())->sum('jumlah_data');
        $februari = LaporIzinOss::whereBulan('Februari')->whereTahun(2024)->whereUserId(Auth::id())->sum('jumlah_data');
        $maret = LaporIzinOss::whereBulan('Maret')->whereTahun(2024)->whereUserId(Auth::id())->sum('jumlah_data');
        $april = LaporIzinOss::whereBulan('April')->whereTahun(2024)->whereUserId(Auth::id())->sum('jumlah_data');
        $mei = LaporIzinOss::whereBulan('Mei')->whereTahun(2024)->whereUserId(Auth::id())->sum('jumlah_data');
        $juni = LaporIzinOss::whereBulan('Juni')->whereTahun(2024)->whereUserId(Auth::id())->sum('jumlah_data');
        $juli = LaporIzinOss::whereBulan('Juli')->whereTahun(2024)->whereUserId(Auth::id())->sum('jumlah_data');
        $agustus = LaporIzinOss::whereBulan('Agustus')->whereTahun(2024)->whereUserId(Auth::id())->sum('jumlah_data');
        $september = LaporIzinOss::whereBulan('September')->whereTahun(2024)->whereUserId(Auth::id())->sum('jumlah_data');
        $oktober = LaporIzinOss::whereBulan('Oktober')->whereTahun(2024)->whereUserId(Auth::id())->sum('jumlah_data');
        $november = LaporIzinOss::whereBulan('November')->whereTahun(2024)->whereUserId(Auth::id())->sum('jumlah_data');
        $desember = LaporIzinOss::whereBulan('Desember')->whereTahun(2024)->whereUserId(Auth::id())->sum('jumlah_data');

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
