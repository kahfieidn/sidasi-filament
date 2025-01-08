<?php

namespace App\Filament\Resources\JenisIzinResource\Pages;

use App\Filament\Resources\JenisIzinResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListJenisIzins extends ListRecords
{
    protected static string $resource = JenisIzinResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
