<?php

namespace App\Filament\Resources\LaporIzinResource\Widgets;

use App\Models\LaporIzin;
use Filament\Widgets\ChartWidget;

class LaporIzinChart extends ChartWidget
{
    protected static ?string $heading = 'Pelaporan Non OSS';

    protected function getData(): array
    {

        $januari = LaporIzin::whereMonth('tanggal_izin', 1)->get();
        $februari = LaporIzin::whereMonth('tanggal_izin', 2)->get();
        $maret = LaporIzin::whereMonth('tanggal_izin', 3)->get();
        $april = LaporIzin::whereMonth('tanggal_izin', 4)->get();
        $mei = LaporIzin::whereMonth('tanggal_izin', 5)->get();
        $juni = LaporIzin::whereMonth('tanggal_izin', 6)->get();
        $juli = LaporIzin::whereMonth('tanggal_izin', 7)->get();
        $agustus = LaporIzin::whereMonth('tanggal_izin', 8)->get();
        $september = LaporIzin::whereMonth('tanggal_izin', 9)->get();
        $oktober = LaporIzin::whereMonth('tanggal_izin', 10)->get();
        $november = LaporIzin::whereMonth('tanggal_izin', 11)->get();
        $desember = LaporIzin::whereMonth('tanggal_izin', 12)->get();

        return [

            'datasets' => [
                [
                    'label' => 'Statistik Lapor Izin Non OSS',
                    'data' => [$januari->count(), $februari->count(), $maret->count(), $april->count(), $mei->count(), $juni->count(), $juli->count(), $agustus->count(), $september->count(), $oktober->count(), $november->count(), $desember->count()],
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
