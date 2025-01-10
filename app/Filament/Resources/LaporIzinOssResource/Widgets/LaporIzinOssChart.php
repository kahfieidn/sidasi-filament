<?php

namespace App\Filament\Resources\LaporIzinOssResource\Widgets;

use App\Models\LaporIzinOss;
use Filament\Widgets\ChartWidget;

class LaporIzinOssChart extends ChartWidget
{
    protected static ?string $heading = 'Pelaporan OSS';

    protected function getData(): array
    {

        $januari = LaporIzinOss::whereBulan('Januari')->sum('jumlah_data');
        $februari = LaporIzinOss::whereBulan('Februari')->sum('jumlah_data');
        $maret = LaporIzinOss::whereBulan('Maret')->sum('jumlah_data');
        $april = LaporIzinOss::whereBulan('April')->sum('jumlah_data');
        $mei = LaporIzinOss::whereBulan('Mei')->sum('jumlah_data');
        $juni = LaporIzinOss::whereBulan('Juni')->sum('jumlah_data');
        $juli = LaporIzinOss::whereBulan('Juli')->sum('jumlah_data');
        $agustus = LaporIzinOss::whereBulan('Agustus')->sum('jumlah_data');
        $september = LaporIzinOss::whereBulan('September')->sum('jumlah_data');
        $oktober = LaporIzinOss::whereBulan('Oktober')->sum('jumlah_data');
        $november = LaporIzinOss::whereBulan('November')->sum('jumlah_data');
        $desember = LaporIzinOss::whereBulan('Desember')->sum('jumlah_data');

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
