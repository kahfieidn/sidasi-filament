<?php

namespace App\Filament\Resources\JenisIzinResource\Pages;

use App\Filament\Resources\JenisIzinResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewJenisIzin extends ViewRecord
{
    protected static string $resource = JenisIzinResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
