<?php

namespace App\Filament\Resources\LaporIzinOssResource\Pages;

use App\Filament\Resources\LaporIzinOssResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewLaporIzinOss extends ViewRecord
{
    protected static string $resource = LaporIzinOssResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
