<?php

namespace App\Filament\Resources\LaporIzinResource\Pages;

use App\Filament\Resources\LaporIzinResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditLaporIzin extends EditRecord
{
    protected static string $resource = LaporIzinResource::class;

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
