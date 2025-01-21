<?php

namespace App\Filament\Resources\SektorResource\Widgets;

use App\Models\User;
use Filament\Tables;
use App\Models\Sektor;
use App\Models\LaporIzin;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Auth;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use App\Filament\Resources\SektorResource;
use Filament\Tables\Columns\Summarizers\Sum;
use Filament\Widgets\TableWidget as BaseWidget;

class SektorOverview extends BaseWidget
{

    protected int | string | array $columnSpan = 'full';
    protected static ?string $heading = 'Sektor Overview Non OSS';

    public function table(Table $table): Table
    {
        return $table
            ->query(
                SektorResource::getEloquentQuery()
            )->defaultSort('created_at', 'desc')->searchable()
            ->filters([
                SelectFilter::make('user_id')
                    ->label('Filter User')
                    ->options(function () {
                        return \App\Models\User::pluck('name', 'id')->toArray();
                    }),
            ])
            ->columns([
                TextColumn::make('nama_sektor'),
                TextColumn::make('januari')
                    ->label('Januari')
                    ->getStateUsing(function ($record) {
                        return \App\Models\LaporIzin::whereMonth('tanggal_izin', 1)
                            ->whereYear('tanggal_izin', 2024)
                            ->whereUserId(Auth::id())
                            ->whereHas('izin', function ($query) use ($record) {
                                $query->where('sektor_id', $record->id);
                            })
                            ->count();
                    })
                    ->sortable(),
                TextColumn::make('februari')
                    ->label('Februari')
                    ->getStateUsing(function ($record) {
                        return \App\Models\LaporIzin::whereMonth('tanggal_izin', 2)
                            ->whereYear('tanggal_izin', 2024)
                            ->whereUserId(Auth::id())
                            ->whereHas('izin', function ($query) use ($record) {
                                $query->where('sektor_id', $record->id);
                            })
                            ->count();
                    })->sortable(),
                TextColumn::make('maret')
                    ->label('Maret')
                    ->getStateUsing(function ($record) {
                        return \App\Models\LaporIzin::whereMonth('tanggal_izin', 3)
                            ->whereYear('tanggal_izin', 2024)
                            ->whereUserId(Auth::id())
                            ->whereHas('izin', function ($query) use ($record) {
                                $query->where('sektor_id', $record->id);
                            })
                            ->count();
                    })->sortable(),
                TextColumn::make('april')
                    ->label('April')
                    ->getStateUsing(function ($record) {
                        return \App\Models\LaporIzin::whereMonth('tanggal_izin', 4)
                            ->whereYear('tanggal_izin', 2024)
                            ->whereUserId(Auth::id())
                            ->whereHas('izin', function ($query) use ($record) {
                                $query->where('sektor_id', $record->id);
                            })
                            ->count();
                    })->sortable(),
                TextColumn::make('mei')
                    ->label('Mei')
                    ->getStateUsing(function ($record) {
                        return \App\Models\LaporIzin::whereMonth('tanggal_izin', 5)
                            ->whereYear('tanggal_izin', 2024)
                            ->whereUserId(Auth::id())
                            ->whereHas('izin', function ($query) use ($record) {
                                $query->where('sektor_id', $record->id);
                            })
                            ->count();
                    })->sortable(),
                TextColumn::make('juni')
                    ->label('Juni')
                    ->getStateUsing(function ($record) {
                        return \App\Models\LaporIzin::whereMonth('tanggal_izin', 6)
                            ->whereYear('tanggal_izin', 2024)
                            ->whereUserId(Auth::id())
                            ->whereHas('izin', function ($query) use ($record) {
                                $query->where('sektor_id', $record->id);
                            })
                            ->count();
                    })->sortable(),
                TextColumn::make('juli')
                    ->label('Juli')
                    ->getStateUsing(function ($record) {
                        return \App\Models\LaporIzin::whereMonth('tanggal_izin', 7)
                            ->whereYear('tanggal_izin', 2024)
                            ->whereUserId(Auth::id())
                            ->whereHas('izin', function ($query) use ($record) {
                                $query->where('sektor_id', $record->id);
                            })
                            ->count();
                    })->sortable(),
                TextColumn::make('agustus')
                    ->label('Agustus')
                    ->getStateUsing(function ($record) {
                        return \App\Models\LaporIzin::whereMonth('tanggal_izin', 8)
                            ->whereYear('tanggal_izin', 2024)
                            ->whereUserId(Auth::id())
                            ->whereHas('izin', function ($query) use ($record) {
                                $query->where('sektor_id', $record->id);
                            })
                            ->count();
                    })->sortable(),
                TextColumn::make('september')
                    ->label('September')
                    ->getStateUsing(function ($record) {
                        return \App\Models\LaporIzin::whereMonth('tanggal_izin', 9)
                            ->whereYear('tanggal_izin', 2024)
                            ->whereUserId(Auth::id())
                            ->whereHas('izin', function ($query) use ($record) {
                                $query->where('sektor_id', $record->id);
                            })
                            ->count();
                    })->sortable(),
                TextColumn::make('oktober')
                    ->label('Oktober')
                    ->getStateUsing(function ($record) {
                        return \App\Models\LaporIzin::whereMonth('tanggal_izin', 10)
                            ->whereYear('tanggal_izin', 2024)
                            ->whereUserId(Auth::id())
                            ->whereHas('izin', function ($query) use ($record) {
                                $query->where('sektor_id', $record->id);
                            })
                            ->count();
                    })->sortable(),
                TextColumn::make('november')
                    ->label('November')
                    ->getStateUsing(function ($record) {
                        return \App\Models\LaporIzin::whereMonth('tanggal_izin', 11)
                            ->whereYear('tanggal_izin', 2024)
                            ->whereUserId(Auth::id())
                            ->whereHas('izin', function ($query) use ($record) {
                                $query->where('sektor_id', $record->id);
                            })
                            ->count();
                    })->sortable(),
                TextColumn::make('desember')
                    ->label('Desember')
                    ->getStateUsing(function ($record) {
                        return \App\Models\LaporIzin::whereMonth('tanggal_izin', 12)
                            ->whereYear('tanggal_izin', 2024)
                            ->whereUserId(Auth::id())
                            ->whereHas('izin', function ($query) use ($record) {
                                $query->where('sektor_id', $record->id);
                            })
                            ->count();
                    })->sortable(),
            ]);
    }
}
