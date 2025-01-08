<?php

namespace App\Filament\Imports;

use App\Models\LaporIzin;
use Filament\Actions\Imports\ImportColumn;
use Filament\Actions\Imports\Importer;
use Filament\Actions\Imports\Models\Import;

class LaporIzinImporter extends Importer
{
    protected static ?string $model = LaporIzin::class;

    public static function getColumns(): array
    {
        return [
            ImportColumn::make('nama_perusahaan')
                ->requiredMapping()
                ->rules(['required', 'max:255']),
            ImportColumn::make('alamat_perusahaan')
                ->requiredMapping()
                ->rules(['required', 'max:255']),
            ImportColumn::make('alamat_proyek')
                ->rules(['max:255']),
            ImportColumn::make('tanggal_masuk')
                ->requiredMapping()
                ->rules(['required', 'date']),
            ImportColumn::make('tanggal_izin')
                ->requiredMapping()
                ->rules(['required', 'date']),
            ImportColumn::make('nomor_izin')
                ->requiredMapping()
                ->rules(['required', 'max:255']),
            ImportColumn::make('izin_id')
                ->requiredMapping()
                ->numeric()
                ->rules(['required', 'integer']),
            ImportColumn::make('user_id')
                ->requiredMapping()
                ->numeric()
                ->rules(['required', 'integer']),
        ];
    }

    public function resolveRecord(): ?LaporIzin
    {
        // return LaporIzin::firstOrNew([
        //     // Update existing records, matching them by `$this->data['column_name']`
        //     'email' => $this->data['email'],
        // ]);

        return new LaporIzin();
    }

    public static function getCompletedNotificationBody(Import $import): string
    {
        $body = 'Your lapor izin import has completed and ' . number_format($import->successful_rows) . ' ' . str('row')->plural($import->successful_rows) . ' imported.';

        if ($failedRowsCount = $import->getFailedRowsCount()) {
            $body .= ' ' . number_format($failedRowsCount) . ' ' . str('row')->plural($failedRowsCount) . ' failed to import.';
        }

        return $body;
    }
}
