<?php

namespace App\Filament\Resources\IzinResource\Pages;

use Filament\Actions;
use App\Models\LaporIzin;
use Filament\Actions\DeleteAction;
use Illuminate\Support\Facades\Auth;
use App\Filament\Resources\IzinResource;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\EditRecord;

class EditIzin extends EditRecord
{
    protected static string $resource = IzinResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make()
                ->before(function (DeleteAction $action) {
                    $lapor_izin = LaporIzin::whereIzinId($this->record->id)->whereUserId(Auth::id())->get();
                    if ($lapor_izin != null) {
                        Notification::make()
                            ->warning()
                            ->title('Anda memiliki pelaporan dengan izin ini!')
                            ->body('Untuk melanjutkan, silahkan hapus data pelaporan izin dengan nama izin ini.')
                            ->send();
                        $action->halt();
                    }
                }),
            Actions\ForceDeleteAction::make(),
            Actions\RestoreAction::make(),
        ];
    }
}
