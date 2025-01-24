<?php

namespace App\Filament\Resources\LaporIzinResource\Widgets;

use Carbon\Carbon;
use App\Models\LaporIzin;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\Auth;
use Filament\Widgets\Concerns\InteractsWithPageFilters;

class LaporIzinChart extends ChartWidget
{

    use InteractsWithPageFilters;

    protected static ?string $heading = 'Pelaporan Non OSS';

    protected function getData(): array
    {
        $user_id_filter = $this->filters['user_id_filter'] ?? Auth::id();
        $tahun_filter = $this->filters['tahun_filter'] ?? Carbon::now()->year;

        $januari = LaporIzin::whereMonth('tanggal_izin', 1)
            ->when($tahun_filter, function ($query, $tahun_filter) {
                return $query->whereYear('tanggal_izin', $tahun_filter);
            })->when($user_id_filter, function ($query, $user_id_filter) {
                return $query->where('user_id', $user_id_filter);
            })
            ->get();
        $februari = LaporIzin::whereMonth('tanggal_izin', 2)
            ->when($tahun_filter, function ($query, $tahun_filter) {
                return $query->whereYear('tanggal_izin', $tahun_filter);
            })->when($user_id_filter, function ($query, $user_id_filter) {
                return $query->where('user_id', $user_id_filter);
            })
            ->get();
        $maret = LaporIzin::whereMonth('tanggal_izin', 3)
            ->when($tahun_filter, function ($query, $tahun_filter) {
                return $query->whereYear('tanggal_izin', $tahun_filter);
            })->when($user_id_filter, function ($query, $user_id_filter) {
                return $query->where('user_id', $user_id_filter);
            })->get();
        $april = LaporIzin::whereMonth('tanggal_izin', 4)
            ->when($tahun_filter, function ($query, $tahun_filter) {
                return $query->whereYear('tanggal_izin', $tahun_filter);
            })->when($user_id_filter, function ($query, $user_id_filter) {
                return $query->where('user_id', $user_id_filter);
            })->get();
        $mei = LaporIzin::whereMonth('tanggal_izin', 5)
            ->when($tahun_filter, function ($query, $tahun_filter) {
                return $query->whereYear('tanggal_izin', $tahun_filter);
            })->when($user_id_filter, function ($query, $user_id_filter) {
                return $query->where('user_id', $user_id_filter);
            })->get();
        $juni = LaporIzin::whereMonth('tanggal_izin', 6)
            ->when($tahun_filter, function ($query, $tahun_filter) {
                return $query->whereYear('tanggal_izin', $tahun_filter);
            })->when($user_id_filter, function ($query, $user_id_filter) {
                return $query->where('user_id', $user_id_filter);
            })->get();
        $juli = LaporIzin::whereMonth('tanggal_izin', 7)
            ->when($tahun_filter, function ($query, $tahun_filter) {
                return $query->whereYear('tanggal_izin', $tahun_filter);
            })->when($user_id_filter, function ($query, $user_id_filter) {
                return $query->where('user_id', $user_id_filter);
            })->get();
        $agustus = LaporIzin::whereMonth('tanggal_izin', 8)
            ->when($tahun_filter, function ($query, $tahun_filter) {
                return $query->whereYear('tanggal_izin', $tahun_filter);
            })->when($user_id_filter, function ($query, $user_id_filter) {
                return $query->where('user_id', $user_id_filter);
            })->get();
        $september = LaporIzin::whereMonth('tanggal_izin', 9)
            ->when($tahun_filter, function ($query, $tahun_filter) {
                return $query->whereYear('tanggal_izin', $tahun_filter);
            })->when($user_id_filter, function ($query, $user_id_filter) {
                return $query->where('user_id', $user_id_filter);
            })->get();
        $oktober = LaporIzin::whereMonth('tanggal_izin', 10)
            ->when($tahun_filter, function ($query, $tahun_filter) {
                return $query->whereYear('tanggal_izin', $tahun_filter);
            })->when($user_id_filter, function ($query, $user_id_filter) {
                return $query->where('user_id', $user_id_filter);
            })->get();
        $november = LaporIzin::whereMonth('tanggal_izin', 11)
            ->when($tahun_filter, function ($query, $tahun_filter) {
                return $query->whereYear('tanggal_izin', $tahun_filter);
            })->when($user_id_filter, function ($query, $user_id_filter) {
                return $query->where('user_id', $user_id_filter);
            })->get();
        $desember = LaporIzin::whereMonth('tanggal_izin', 12)
            ->when($tahun_filter, function ($query, $tahun_filter) {
                return $query->whereYear('tanggal_izin', $tahun_filter);
            })->when($user_id_filter, function ($query, $user_id_filter) {
                return $query->where('user_id', $user_id_filter);
            })->get();

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
