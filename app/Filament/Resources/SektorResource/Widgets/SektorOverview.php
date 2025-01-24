<?php

namespace App\Filament\Resources\SektorResource\Widgets;

use Carbon\Carbon;
use App\Models\User;
use Filament\Tables;
use App\Models\Sektor;
use App\Models\LaporIzin;
use Filament\Tables\Table;
use Filament\Tables\Filters\Filter;
use Illuminate\Support\Facades\Auth;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Section;
use Filament\Tables\Filters\Indicator;
use Illuminate\Database\Query\Builder;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\DatePicker;
use Filament\Tables\Filters\SelectFilter;
use App\Filament\Resources\SektorResource;
use Filament\Tables\Columns\Summarizers\Sum;
use Filament\Widgets\TableWidget as BaseWidget;
use Filament\Tables\Columns\Summarizers\Summarizer;
use Filament\Widgets\Concerns\InteractsWithPageFilters;

class SektorOverview extends BaseWidget
{

    use InteractsWithPageFilters;

    protected int | string | array $columnSpan = 'full';
    protected static ?string $heading = 'Sektor Overview Non OSS 2024';

    public function table(Table $table): Table
    {

        $user_id_filter = $this->filters['user_id_filter'] ?? Auth::id();
        $tahun_filter = $this->filters['tahun_filter'] ?? Carbon::now()->year;

        return $table
            ->query(
                SektorResource::getEloquentQuery()
            )
            ->columns([
                TextColumn::make('nama_sektor')
                    ->searchable()
                    ->wrap(),
                TextColumn::make('januari')
                    ->label('Jan')
                    ->getStateUsing(function ($record) use ($user_id_filter, $tahun_filter) {
                        return \App\Models\LaporIzin::whereMonth('tanggal_izin', 1)
                            ->when($tahun_filter, function ($query, $tahun_filter) {
                                return $query->whereYear('tanggal_izin', $tahun_filter);
                            })
                            ->when($user_id_filter, function ($query, $user_id_filter) {
                                return $query->whereUserId($user_id_filter);
                            }, function ($query) {
                                Auth::id();
                            })
                            ->whereHas('izin', function ($query) use ($record) {
                                $query->where('sektor_id', $record->id);
                            })
                            ->count();
                    })
                    ->summarize(Summarizer::make()
                        ->using(fn(Builder $query): string => LaporIzin::query()
                            ->whereMonth('tanggal_izin', 1)
                            ->when($tahun_filter, function ($query, $tahun_filter) {
                                return $query->whereYear('tanggal_izin', $tahun_filter);
                            })
                            ->when($user_id_filter, function ($query, $user_id_filter) {
                                return $query->where('user_id', $user_id_filter);
                            })->count())),
                TextColumn::make('februari')
                    ->label('Feb')
                    ->getStateUsing(function ($record) use ($user_id_filter, $tahun_filter) {
                        return \App\Models\LaporIzin::whereMonth('tanggal_izin', 2)
                            ->when($tahun_filter, function ($query, $tahun_filter) {
                                return $query->whereYear('tanggal_izin', $tahun_filter);
                            })
                            ->when($user_id_filter, function ($query, $user_id_filter) {
                                return $query->whereUserId($user_id_filter);
                            }, function ($query) {
                                Auth::id();
                            })
                            ->whereHas('izin', function ($query) use ($record) {
                                $query->where('sektor_id', $record->id);
                            })
                            ->count();
                    })
                    ->summarize(Summarizer::make()
                        ->using(fn(Builder $query): string => LaporIzin::query()
                            ->whereMonth('tanggal_izin', 2)
                            ->when($tahun_filter, function ($query, $tahun_filter) {
                                return $query->whereYear('tanggal_izin', $tahun_filter);
                            })
                            ->when($user_id_filter, function ($query, $user_id_filter) {
                                return $query->where('user_id', $user_id_filter);
                            })->count())),
                TextColumn::make('maret')
                    ->label('Mar')
                    ->getStateUsing(function ($record) use ($user_id_filter, $tahun_filter) {
                        return \App\Models\LaporIzin::whereMonth('tanggal_izin', 3)
                            ->when($tahun_filter, function ($query, $tahun_filter) {
                                return $query->whereYear('tanggal_izin', $tahun_filter);
                            })
                            ->when($user_id_filter, function ($query, $user_id_filter) {
                                return $query->whereUserId($user_id_filter);
                            }, function ($query) {
                                Auth::id();
                            })
                            ->whereHas('izin', function ($query) use ($record) {
                                $query->where('sektor_id', $record->id);
                            })
                            ->count();
                    })
                    ->summarize(Summarizer::make()
                        ->using(fn(Builder $query): string => LaporIzin::query()
                            ->whereMonth('tanggal_izin', 3)
                            ->when($tahun_filter, function ($query, $tahun_filter) {
                                return $query->whereYear('tanggal_izin', $tahun_filter);
                            })
                            ->when($user_id_filter, function ($query, $user_id_filter) {
                                return $query->where('user_id', $user_id_filter);
                            })->count())),
                TextColumn::make('april')
                    ->label('Apr')
                    ->getStateUsing(function ($record) use ($user_id_filter, $tahun_filter) {
                        return \App\Models\LaporIzin::whereMonth('tanggal_izin', 4)
                            ->when($tahun_filter, function ($query, $tahun_filter) {
                                return $query->whereYear('tanggal_izin', $tahun_filter);
                            })
                            ->when($user_id_filter, function ($query, $user_id_filter) {
                                return $query->whereUserId($user_id_filter);
                            }, function ($query) {
                                Auth::id();
                            })
                            ->whereHas('izin', function ($query) use ($record) {
                                $query->where('sektor_id', $record->id);
                            })
                            ->count();
                    })
                    ->summarize(Summarizer::make()
                        ->using(fn(Builder $query): string => LaporIzin::query()
                            ->whereMonth('tanggal_izin', 4)
                            ->when($tahun_filter, function ($query, $tahun_filter) {
                                return $query->whereYear('tanggal_izin', $tahun_filter);
                            })
                            ->when($user_id_filter, function ($query, $user_id_filter) {
                                return $query->where('user_id', $user_id_filter);
                            })->count())),
                TextColumn::make('mei')
                    ->label('Mei')
                    ->getStateUsing(function ($record) use ($user_id_filter, $tahun_filter) {
                        return \App\Models\LaporIzin::whereMonth('tanggal_izin', 5)
                            ->when($tahun_filter, function ($query, $tahun_filter) {
                                return $query->whereYear('tanggal_izin', $tahun_filter);
                            })
                            ->when($user_id_filter, function ($query, $user_id_filter) {
                                return $query->whereUserId($user_id_filter);
                            }, function ($query) {
                                Auth::id();
                            })
                            ->whereHas('izin', function ($query) use ($record) {
                                $query->where('sektor_id', $record->id);
                            })
                            ->count();
                    })
                    ->summarize(Summarizer::make()
                        ->using(fn(Builder $query): string => LaporIzin::query()
                            ->whereMonth('tanggal_izin', 5)
                            ->when($tahun_filter, function ($query, $tahun_filter) {
                                return $query->whereYear('tanggal_izin', $tahun_filter);
                            })
                            ->when($user_id_filter, function ($query, $user_id_filter) {
                                return $query->where('user_id', $user_id_filter);
                            })->count())),
                TextColumn::make('juni')
                    ->label('Jun')
                    ->getStateUsing(function ($record) use ($user_id_filter, $tahun_filter) {
                        return \App\Models\LaporIzin::whereMonth('tanggal_izin', 6)
                            ->when($tahun_filter, function ($query, $tahun_filter) {
                                return $query->whereYear('tanggal_izin', $tahun_filter);
                            })
                            ->when($user_id_filter, function ($query, $user_id_filter) {
                                return $query->whereUserId($user_id_filter);
                            }, function ($query) {
                                Auth::id();
                            })
                            ->whereHas('izin', function ($query) use ($record) {
                                $query->where('sektor_id', $record->id);
                            })
                            ->count();
                    })
                    ->summarize(Summarizer::make()
                        ->using(fn(Builder $query): string => LaporIzin::query()
                            ->whereMonth('tanggal_izin', 6)
                            ->when($tahun_filter, function ($query, $tahun_filter) {
                                return $query->whereYear('tanggal_izin', $tahun_filter);
                            })
                            ->when($user_id_filter, function ($query, $user_id_filter) {
                                return $query->where('user_id', $user_id_filter);
                            })->count())),
                TextColumn::make('juli')
                    ->label('Jul')
                    ->getStateUsing(function ($record) use ($user_id_filter, $tahun_filter) {
                        return \App\Models\LaporIzin::whereMonth('tanggal_izin', 7)
                            ->when($tahun_filter, function ($query, $tahun_filter) {
                                return $query->whereYear('tanggal_izin', $tahun_filter);
                            })
                            ->when($user_id_filter, function ($query, $user_id_filter) {
                                return $query->whereUserId($user_id_filter);
                            }, function ($query) {
                                Auth::id();
                            })
                            ->whereHas('izin', function ($query) use ($record) {
                                $query->where('sektor_id', $record->id);
                            })
                            ->count();
                    })
                    ->summarize(Summarizer::make()
                        ->using(fn(Builder $query): string => LaporIzin::query()
                            ->whereMonth('tanggal_izin', 7)
                            ->when($tahun_filter, function ($query, $tahun_filter) {
                                return $query->whereYear('tanggal_izin', $tahun_filter);
                            })
                            ->when($user_id_filter, function ($query, $user_id_filter) {
                                return $query->where('user_id', $user_id_filter);
                            })->count())),
                TextColumn::make('agustus')
                    ->label('Agus')
                    ->getStateUsing(function ($record) use ($user_id_filter, $tahun_filter) {
                        return \App\Models\LaporIzin::whereMonth('tanggal_izin', 8)
                            ->when($tahun_filter, function ($query, $tahun_filter) {
                                return $query->whereYear('tanggal_izin', $tahun_filter);
                            })
                            ->when($user_id_filter, function ($query, $user_id_filter) {
                                return $query->whereUserId($user_id_filter);
                            }, function ($query) {
                                Auth::id();
                            })
                            ->whereHas('izin', function ($query) use ($record) {
                                $query->where('sektor_id', $record->id);
                            })
                            ->count();
                    })
                    ->summarize(Summarizer::make()
                        ->using(fn(Builder $query): string => LaporIzin::query()
                            ->whereMonth('tanggal_izin', 8)
                            ->when($tahun_filter, function ($query, $tahun_filter) {
                                return $query->whereYear('tanggal_izin', $tahun_filter);
                            })
                            ->when($user_id_filter, function ($query, $user_id_filter) {
                                return $query->where('user_id', $user_id_filter);
                            })->count())),
                TextColumn::make('september')
                    ->label('Sep')
                    ->getStateUsing(function ($record) use ($user_id_filter, $tahun_filter) {
                        return \App\Models\LaporIzin::whereMonth('tanggal_izin', 9)
                            ->when($tahun_filter, function ($query, $tahun_filter) {
                                return $query->whereYear('tanggal_izin', $tahun_filter);
                            })
                            ->when($user_id_filter, function ($query, $user_id_filter) {
                                return $query->whereUserId($user_id_filter);
                            }, function ($query) {
                                Auth::id();
                            })
                            ->whereHas('izin', function ($query) use ($record) {
                                $query->where('sektor_id', $record->id);
                            })
                            ->count();
                    })
                    ->summarize(Summarizer::make()
                        ->using(fn(Builder $query): string => LaporIzin::query()
                            ->whereMonth('tanggal_izin', 9)
                            ->when($tahun_filter, function ($query, $tahun_filter) {
                                return $query->whereYear('tanggal_izin', $tahun_filter);
                            })
                            ->when($user_id_filter, function ($query, $user_id_filter) {
                                return $query->where('user_id', $user_id_filter);
                            })->count())),
                TextColumn::make('oktober')
                    ->label('Okt')
                    ->getStateUsing(function ($record) use ($user_id_filter, $tahun_filter) {
                        return \App\Models\LaporIzin::whereMonth('tanggal_izin', 10)
                            ->when($tahun_filter, function ($query, $tahun_filter) {
                                return $query->whereYear('tanggal_izin', $tahun_filter);
                            })
                            ->when($user_id_filter, function ($query, $user_id_filter) {
                                return $query->whereUserId($user_id_filter);
                            }, function ($query) {
                                Auth::id();
                            })
                            ->whereHas('izin', function ($query) use ($record) {
                                $query->where('sektor_id', $record->id);
                            })
                            ->count();
                    })
                    ->summarize(Summarizer::make()
                        ->using(fn(Builder $query): string => LaporIzin::query()
                            ->whereMonth('tanggal_izin', 10)
                            ->when($tahun_filter, function ($query, $tahun_filter) {
                                return $query->whereYear('tanggal_izin', $tahun_filter);
                            })
                            ->when($user_id_filter, function ($query, $user_id_filter) {
                                return $query->where('user_id', $user_id_filter);
                            })->count())),
                TextColumn::make('november')
                    ->label('Nov')
                    ->getStateUsing(function ($record) use ($user_id_filter, $tahun_filter) {
                        return \App\Models\LaporIzin::whereMonth('tanggal_izin', 11)
                            ->when($tahun_filter, function ($query, $tahun_filter) {
                                return $query->whereYear('tanggal_izin', $tahun_filter);
                            })
                            ->when($user_id_filter, function ($query, $user_id_filter) {
                                return $query->whereUserId($user_id_filter);
                            }, function ($query) {
                                Auth::id();
                            })
                            ->whereHas('izin', function ($query) use ($record) {
                                $query->where('sektor_id', $record->id);
                            })
                            ->count();
                    })
                    ->summarize(Summarizer::make()
                        ->using(fn(Builder $query): string => LaporIzin::query()
                            ->whereMonth('tanggal_izin', 11)
                            ->when($tahun_filter, function ($query, $tahun_filter) {
                                return $query->whereYear('tanggal_izin', $tahun_filter);
                            })
                            ->when($user_id_filter, function ($query, $user_id_filter) {
                                return $query->where('user_id', $user_id_filter);
                            })->count())),
                TextColumn::make('desember')
                    ->label('Des')
                    ->getStateUsing(function ($record) use ($user_id_filter, $tahun_filter) {
                        return \App\Models\LaporIzin::whereMonth('tanggal_izin', 12)
                            ->when($tahun_filter, function ($query, $tahun_filter) {
                                return $query->whereYear('tanggal_izin', $tahun_filter);
                            })
                            ->when($user_id_filter, function ($query, $user_id_filter) {
                                return $query->whereUserId($user_id_filter);
                            }, function ($query) {
                                Auth::id();
                            })
                            ->whereHas('izin', function ($query) use ($record) {
                                $query->where('sektor_id', $record->id);
                            })
                            ->count();
                    })
                    ->summarize(Summarizer::make()
                        ->using(fn(Builder $query): string => LaporIzin::query()
                            ->whereMonth('tanggal_izin', 12)
                            ->when($tahun_filter, function ($query, $tahun_filter) {
                                return $query->whereYear('tanggal_izin', $tahun_filter);
                            })
                            ->when($user_id_filter, function ($query, $user_id_filter) {
                                return $query->where('user_id', $user_id_filter);
                            })->count())),
            ])
            // ->paginated(false)
            ->striped();
    }
}
