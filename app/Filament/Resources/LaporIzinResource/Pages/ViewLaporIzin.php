<?php

namespace App\Filament\Resources\LaporIzinResource\Pages;

use App\Filament\Resources\LaporIzinResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewLaporIzin extends ViewRecord
{
    protected static string $resource = LaporIzinResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
