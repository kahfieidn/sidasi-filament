<?php

namespace App\Filament\Resources\LaporIzinResource\Pages;

use Carbon\Carbon;
use Filament\Actions;
use Illuminate\Support\Collection;
use Filament\Resources\Components\Tab;
use Illuminate\Database\Eloquent\Builder;
use Filament\Resources\Pages\ListRecords;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use App\Filament\Resources\LaporIzinResource;
use Filament\Forms\Components\Actions\Action;
use App\Imports\LaporIzinImport as LaporIzinsImportDir;

class ListLaporIzins extends ListRecords
{
    protected static string $resource = LaporIzinResource::class;

    public function getTabs(): array
    {
        return [
            'all' => Tab::make(),
            '2025' => Tab::make()
                ->modifyQueryUsing(fn(Builder $query) => $query->whereYear('tanggal_izin', 2025)),
            '2024' => Tab::make()
                ->modifyQueryUsing(fn(Builder $query) => $query->whereYear('tanggal_izin', 2024)),
        ];
    }



    protected function getHeaderActions(): array
    {
        return [
            \EightyNine\ExcelImport\ExcelImportAction::make()
                ->processCollectionUsing(function (string $modelClass, Collection $collection) {
                    return $collection;
                })
                ->label('Import Excel')
                ->color("success")
                ->sampleExcel(
                    sampleData: [
                        [
                            'nama_perusahaan_or_perorangan' => 'PT. JAGOAN KODE GROUP INDONESIA',
                            'alamat_perusahaan_or_perorangan' => 'Jl. Sukaramai Km.12 Arah Uban',
                            'tanggal_masuk' => Carbon::now()->format('d/m/Y'),
                            'tanggal_izin' => Carbon::now()->format('d/m/Y'),
                            'nomor_izin' => 'DPMPTSP/111.e/2023',
                            'jenis_izin' => 'Izin Penelitian Mahasiswa'
                        ],
                    ],
                    fileName: 'sidasi_template.xlsx',
                    sampleButtonLabel: 'Download Sample',
                    customiseActionUsing: fn(Action $action) => $action->color('primary')
                        ->icon('heroicon-m-clipboard'),
                )
                ->use(LaporIzinsImportDir::class),
            Actions\CreateAction::make(),
        ];
    }
}
