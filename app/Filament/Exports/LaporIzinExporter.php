<?php

namespace App\Filament\Exports;

use App\Models\LaporIzin;
use Filament\Actions\Exports\ExportColumn;
use Filament\Actions\Exports\Exporter;
use Filament\Actions\Exports\Models\Export;

class LaporIzinExporter extends Exporter
{
    protected static ?string $model = LaporIzin::class;

    public static function getColumns(): array
    {
        return [
            ExportColumn::make('id')
                ->label('ID'),
            ExportColumn::make('nama_perusahaan'),
            ExportColumn::make('alamat_perusahaan'),
            ExportColumn::make('alamat_proyek'),
            ExportColumn::make('tanggal_masuk'),
            ExportColumn::make('tanggal_izin'),
            ExportColumn::make('nomor_izin'),
            ExportColumn::make('izin.nama_izin'),
            ExportColumn::make('user.name'),
        ];
    }

    public static function getCompletedNotificationBody(Export $export): string
    {
        $body = 'Your lapor izin export has completed and ' . number_format($export->successful_rows) . ' ' . str('row')->plural($export->successful_rows) . ' exported.';

        if ($failedRowsCount = $export->getFailedRowsCount()) {
            $body .= ' ' . number_format($failedRowsCount) . ' ' . str('row')->plural($failedRowsCount) . ' failed to export.';
        }

        return $body;
    }
}
