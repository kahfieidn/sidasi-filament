<?php

namespace App\Filament\Resources\JenisIzinResource\Pages;

use App\Filament\Resources\JenisIzinResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditJenisIzin extends EditRecord
{
    protected static string $resource = JenisIzinResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
            Actions\ForceDeleteAction::make(),
            Actions\RestoreAction::make(),
        ];
    }
}
