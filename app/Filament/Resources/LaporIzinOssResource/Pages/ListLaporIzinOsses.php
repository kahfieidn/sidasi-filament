<?php

namespace App\Filament\Resources\LaporIzinOssResource\Pages;

use Filament\Actions;
use App\Models\LaporIzinOss;
use Filament\Resources\Components\Tab;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\LaporIzinOssResource;


class ListLaporIzinOsses extends ListRecords
{
    protected static string $resource = LaporIzinOssResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }


    public function getTabs(): array
    {
        return [
            'all' => Tab::make(),
            '2025' => Tab::make()
                ->modifyQueryUsing(fn(Builder $query) => $query->where('tahun', 2025)),
            '2024' => Tab::make()
                ->modifyQueryUsing(fn(Builder $query) => $query->where('tahun', 2024)),
        ];
    }
}
