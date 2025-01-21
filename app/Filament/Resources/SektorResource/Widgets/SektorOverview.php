<?php

namespace App\Filament\Resources\SektorResource\Widgets;

use App\Models\User;
use Filament\Tables;
use App\Models\Sektor;
use App\Models\LaporIzin;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Query\Builder;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use App\Filament\Resources\SektorResource;
use Filament\Tables\Columns\Summarizers\Sum;
use Filament\Widgets\TableWidget as BaseWidget;
use Filament\Tables\Columns\Summarizers\Summarizer;

class SektorOverview extends BaseWidget
{

    protected int | string | array $columnSpan = 'full';
    protected static ?string $heading = 'Sektor Overview Non OSS 2024';

    public function table(Table $table): Table
    {
        return $table
            ->query(
                SektorResource::getEloquentQuery()
            )
            ->filters([
                SelectFilter::make('user_id')
                    ->label('Filter User')
                    ->options(function () {
                        return \App\Models\User::pluck('name', 'id')->toArray();
                    }),
            ])
            ->columns([
                TextColumn::make('nama_sektor')
                    ->wrap(),
                TextColumn::make('januari')
                    ->label('Jan')
                    ->getStateUsing(function ($record) {
                        return \App\Models\LaporIzin::whereMonth('tanggal_izin', 1)
                            ->whereYear('tanggal_izin', 2024)
                            ->whereUserId(Auth::id())
                            ->whereHas('izin', function ($query) use ($record) {
                                $query->where('sektor_id', $record->id);
                            })
                            ->count();
                    })
                    ->summarize(Summarizer::make()
                        ->using(fn(Builder $query): string => LaporIzin::query()
                            ->whereMonth('tanggal_izin', 1)
                            ->whereYear('tanggal_izin', 2024)
                            ->whereUserId(Auth::id())->count())),
                TextColumn::make('februari')
                    ->label('Feb')
                    ->getStateUsing(function ($record) {
                        return \App\Models\LaporIzin::whereMonth('tanggal_izin', 2)
                            ->whereYear('tanggal_izin', 2024)
                            ->whereUserId(Auth::id())
                            ->whereHas('izin', function ($query) use ($record) {
                                $query->where('sektor_id', $record->id);
                            })
                            ->count();
                    })
                    ->summarize(Summarizer::make()
                        ->using(fn(Builder $query): string => LaporIzin::query()
                            ->whereMonth('tanggal_izin', 2)
                            ->whereYear('tanggal_izin', 2024)
                            ->whereUserId(Auth::id())->count())),
                TextColumn::make('maret')
                    ->label('Mar')
                    ->getStateUsing(function ($record) {
                        return \App\Models\LaporIzin::whereMonth('tanggal_izin', 3)
                            ->whereYear('tanggal_izin', 2024)
                            ->whereUserId(Auth::id())
                            ->whereHas('izin', function ($query) use ($record) {
                                $query->where('sektor_id', $record->id);
                            })
                            ->count();
                    })
                    ->summarize(Summarizer::make()
                        ->using(fn(Builder $query): string => LaporIzin::query()
                            ->whereMonth('tanggal_izin', 3)
                            ->whereYear('tanggal_izin', 2024)
                            ->whereUserId(Auth::id())->count())),
                TextColumn::make('april')
                    ->label('Apr')
                    ->getStateUsing(function ($record) {
                        return \App\Models\LaporIzin::whereMonth('tanggal_izin', 4)
                            ->whereYear('tanggal_izin', 2024)
                            ->whereUserId(Auth::id())
                            ->whereHas('izin', function ($query) use ($record) {
                                $query->where('sektor_id', $record->id);
                            })
                            ->count();
                    })
                    ->summarize(Summarizer::make()
                        ->using(fn(Builder $query): string => LaporIzin::query()
                            ->whereMonth('tanggal_izin', 4)
                            ->whereYear('tanggal_izin', 2024)
                            ->whereUserId(Auth::id())->count())),
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
                    })
                    ->summarize(Summarizer::make()
                        ->using(fn(Builder $query): string => LaporIzin::query()
                            ->whereMonth('tanggal_izin', 5)
                            ->whereYear('tanggal_izin', 2024)
                            ->whereUserId(Auth::id())->count())),
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
                    })
                    ->summarize(Summarizer::make()
                        ->using(fn(Builder $query): string => LaporIzin::query()
                            ->whereMonth('tanggal_izin', 6)
                            ->whereYear('tanggal_izin', 2024)
                            ->whereUserId(Auth::id())->count())),
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
                    })
                    ->summarize(Summarizer::make()
                        ->using(fn(Builder $query): string => LaporIzin::query()
                            ->whereMonth('tanggal_izin', 7)
                            ->whereYear('tanggal_izin', 2024)
                            ->whereUserId(Auth::id())->count())),
                TextColumn::make('agustus')
                    ->label('Agus')
                    ->getStateUsing(function ($record) {
                        return \App\Models\LaporIzin::whereMonth('tanggal_izin', 8)
                            ->whereYear('tanggal_izin', 2024)
                            ->whereUserId(Auth::id())
                            ->whereHas('izin', function ($query) use ($record) {
                                $query->where('sektor_id', $record->id);
                            })
                            ->count();
                    })
                    ->summarize(Summarizer::make()
                        ->using(fn(Builder $query): string => LaporIzin::query()
                            ->whereMonth('tanggal_izin', 8)
                            ->whereYear('tanggal_izin', 2024)
                            ->whereUserId(Auth::id())->count())),
                TextColumn::make('september')
                    ->label('Sep')
                    ->getStateUsing(function ($record) {
                        return \App\Models\LaporIzin::whereMonth('tanggal_izin', 9)
                            ->whereYear('tanggal_izin', 2024)
                            ->whereUserId(Auth::id())
                            ->whereHas('izin', function ($query) use ($record) {
                                $query->where('sektor_id', $record->id);
                            })
                            ->count();
                    })
                    ->summarize(Summarizer::make()
                        ->using(fn(Builder $query): string => LaporIzin::query()
                            ->whereMonth('tanggal_izin', 9)
                            ->whereYear('tanggal_izin', 2024)
                            ->whereUserId(Auth::id())->count())),
                TextColumn::make('oktober')
                    ->label('Okt')
                    ->getStateUsing(function ($record) {
                        return \App\Models\LaporIzin::whereMonth('tanggal_izin', 10)
                            ->whereYear('tanggal_izin', 2024)
                            ->whereUserId(Auth::id())
                            ->whereHas('izin', function ($query) use ($record) {
                                $query->where('sektor_id', $record->id);
                            })
                            ->count();
                    })
                    ->summarize(Summarizer::make()
                        ->using(fn(Builder $query): string => LaporIzin::query()
                            ->whereMonth('tanggal_izin', 10)
                            ->whereYear('tanggal_izin', 2024)
                            ->whereUserId(Auth::id())->count())),
                TextColumn::make('november')
                    ->label('Nov')
                    ->getStateUsing(function ($record) {
                        return \App\Models\LaporIzin::whereMonth('tanggal_izin', 11)
                            ->whereYear('tanggal_izin', 2024)
                            ->whereUserId(Auth::id())
                            ->whereHas('izin', function ($query) use ($record) {
                                $query->where('sektor_id', $record->id);
                            })
                            ->count();
                    })
                    ->summarize(Summarizer::make()
                        ->using(fn(Builder $query): string => LaporIzin::query()
                            ->whereMonth('tanggal_izin', 11)
                            ->whereYear('tanggal_izin', 2024)
                            ->whereUserId(Auth::id())->count())),
                TextColumn::make('desember')
                    ->label('Des')
                    ->getStateUsing(function ($record) {
                        return \App\Models\LaporIzin::whereMonth('tanggal_izin', 12)
                            ->whereYear('tanggal_izin', 2024)
                            ->whereUserId(Auth::id())
                            ->whereHas('izin', function ($query) use ($record) {
                                $query->where('sektor_id', $record->id);
                            })
                            ->count();
                    })
                    ->summarize(Summarizer::make()
                        ->using(fn(Builder $query): string => LaporIzin::query()
                            ->whereMonth('tanggal_izin', 12)
                            ->whereYear('tanggal_izin', 2024)
                            ->whereUserId(Auth::id())->count())),
            ])
            // ->paginated(false)
            ->striped();
    }
}
