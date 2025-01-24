<?php

namespace App\Filament\Data\Pages;

use App\Models\User;
use Filament\Forms\Form;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Pages\Dashboard\Concerns\HasFiltersForm;

class Dashboard extends \Filament\Pages\Dashboard
{
    // ...

    use HasFiltersForm;

    public function filtersForm(Form $form): Form
    {
        return $form->schema([
            Section::make('Cari data...')
                ->description('Filter data berdasarkan operator dan tahun')
                ->schema([
                    Select::make('user_id_filter')
                        ->label('Operator')
                        ->placeholder('All Users')
                        ->options(
                            User::whereHas('roles', function ($query) {
                                $query->where('name', 'operator'); // Sesuaikan nama role Anda
                            })->pluck('name', 'id')
                        )
                        ->searchable(),
                    Select::make('tahun_filter')
                        ->label('Tahun')
                        ->options([
                            '2023' => '2023',
                            '2024' => '2024',
                            '2025' => '2025',
                            '2026' => '2026',
                            '2027' => '2027',
                            '2028' => '2028',
                        ])
                        ->searchable()
                ])->columns(2),
        ]);
    }
}
