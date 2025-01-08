<?php

namespace App\Filament\Resources\LaporIzinOssResource\Pages;

use App\Filament\Resources\LaporIzinOssResource;
use App\Models\LaporIzinOss;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditLaporIzinOss extends EditRecord
{
    protected static string $resource = LaporIzinOssResource::class;


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
