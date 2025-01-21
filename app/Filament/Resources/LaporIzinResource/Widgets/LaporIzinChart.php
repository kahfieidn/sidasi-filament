<?php

namespace App\Filament\Resources\LaporIzinResource\Widgets;

use App\Models\LaporIzin;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\Auth;

class LaporIzinChart extends ChartWidget
{
    protected static ?string $heading = 'Pelaporan Non OSS';

    protected function getData(): array
    {

        $januari = LaporIzin::whereMonth('tanggal_izin', 1)->whereYear('tanggal_izin', 2024)->whereUserId(Auth::id())->get();
        $februari = LaporIzin::whereMonth('tanggal_izin', 2)->whereYear('tanggal_izin', 2024)->whereUserId(Auth::id())->get();
        $maret = LaporIzin::whereMonth('tanggal_izin', 3)->whereYear('tanggal_izin', 2024)->whereUserId(Auth::id())->get();
        $april = LaporIzin::whereMonth('tanggal_izin', 4)->whereYear('tanggal_izin', 2024)->whereUserId(Auth::id())->get();
        $mei = LaporIzin::whereMonth('tanggal_izin', 5)->whereYear('tanggal_izin', 2024)->whereUserId(Auth::id())->get();
        $juni = LaporIzin::whereMonth('tanggal_izin', 6)->whereYear('tanggal_izin', 2024)->whereUserId(Auth::id())->get();
        $juli = LaporIzin::whereMonth('tanggal_izin', 7)->whereYear('tanggal_izin', 2024)->whereUserId(Auth::id())->get();
        $agustus = LaporIzin::whereMonth('tanggal_izin', 8)->whereYear('tanggal_izin', 2024)->whereUserId(Auth::id())->get();
        $september = LaporIzin::whereMonth('tanggal_izin', 9)->whereYear('tanggal_izin', 2024)->whereUserId(Auth::id())->get();
        $oktober = LaporIzin::whereMonth('tanggal_izin', 10)->whereYear('tanggal_izin', 2024)->whereUserId(Auth::id())->get();
        $november = LaporIzin::whereMonth('tanggal_izin', 11)->whereYear('tanggal_izin', 2024)->whereUserId(Auth::id())->get();
        $desember = LaporIzin::whereMonth('tanggal_izin', 12)->whereYear('tanggal_izin', 2024)->whereUserId(Auth::id())->get();

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
