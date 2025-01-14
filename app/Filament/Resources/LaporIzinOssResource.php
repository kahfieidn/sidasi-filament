<?php

namespace App\Filament\Resources;

use Filament\Forms;
use App\Models\User;
use Filament\Tables;
use App\Models\Sektor;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Models\LaporIzinOss;
use Filament\Resources\Resource;
use Filament\Tables\Actions\Action;
use Illuminate\Support\Facades\Auth;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Fieldset;
use Filament\Tables\Enums\FiltersLayout;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\LaporIzinOssResource\Pages;
use App\Filament\Resources\LaporIzinOssResource\RelationManagers;

class LaporIzinOssResource extends Resource
{
    protected static ?string $model = LaporIzinOss::class;

    protected static ?string $navigationIcon = 'heroicon-o-paper-airplane';
    protected static ?string $navigationGroup = 'Pelaporan OSS';
    protected static ?string $pluralModelLabel = 'Lapor Izin OSS';
    protected static ?int $navigationSort = 5;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make()
                    ->schema([
                        Forms\Components\Select::make('jenis_oss')
                            ->options([
                                'Perizinan' => 'Perizinan',
                            ])
                            ->required()
                            ->native(false),
                        Forms\Components\FileUpload::make('berkas')
                            ->required()
                            ->openable()
                            ->directory('lapor_izin_oss'),
                        Forms\Components\Select::make('bulan')
                            ->options([
                                'Januari' => 'Januari',
                                'Februari' => 'Februari',
                                'Maret' => 'Maret',
                                'April' => 'April',
                                'Mei' => 'Mei',
                                'Juni' => 'Juni',
                                'Juli' => 'Juli',
                                'Agustus' => 'Agustus',
                                'September' => 'September',
                                'Oktober' => 'Oktober',
                                'November' => 'November',
                                'Desember' => 'Desember',
                            ])
                            ->required()
                            ->native(false),
                        Forms\Components\Select::make('tahun')
                            ->options([
                                '2024' => '2024',
                                '2025' => '2025',
                                '2026' => '2026',
                                '2027' => '2027',
                            ])
                            ->required()
                            ->native(false),
                        Forms\Components\TextInput::make('jumlah_data')
                            ->helperText('*Bidang ini otomatis terisi dan dihitung berdasarkan jumlah data sektor yang diinputkan.')
                            ->readOnly()
                            ->columnSpanFull()
                            ->disabled()
                            ->dehydrated()
                            ->numeric(),
                    ])->columns(2),
                Section::make()
                    ->schema([
                        Forms\Components\Repeater::make('data_sektor_osses')
                            ->label('Data Sektor')
                            ->relationship('data_sektor_osses')
                            ->schema([
                                Forms\Components\Select::make('sektor_id')
                                    ->label('Sektor')
                                    ->options(Sektor::query()->pluck('nama_sektor', 'id'))
                                    ->disableOptionsWhenSelectedInSiblingRepeaterItems()
                                    ->searchable()
                                    ->live()
                                    ->required(),
                                Forms\Components\TextInput::make('jumlah_data_sektor')
                                    ->label('Jumlah Data Sektor')
                                    ->numeric()
                                    ->required(),
                            ])
                            ->columns(2)
                            ->minItems(1)
                            ->createItemButtonLabel('Tambah Data Sektor')
                            ->afterStateUpdated(function ($state, callable $get, callable $set) {
                                $totalJumlahData = collect($state)
                                    ->pluck('jumlah_data_sektor')
                                    ->filter()
                                    ->sum(); // Jumlahkan semua nilai jumlah_data_sektor yang ada
                                $set('jumlah_data', $totalJumlahData);
                            }),
                    ]),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('berkas')
                    ->searchable(),
                Tables\Columns\TextColumn::make('jenis_oss')
                    ->searchable(),
                Tables\Columns\TextColumn::make('bulan')
                    ->searchable(),
                Tables\Columns\TextColumn::make('tahun')
                    ->searchable(),
                Tables\Columns\TextColumn::make('jumlah_data')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('user.name')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('deleted_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\TrashedFilter::make(),
                SelectFilter::make('jenis_oss')
                    ->options([
                        'Perizinan' => 'Perizinan',
                    ])
                    ->searchable()
                    ->multiple(),
                SelectFilter::make('bulan')
                    ->options([
                        'Januari' => 'Januari',
                        'Februari' => 'Februari',
                        'Maret' => 'Maret',
                        'April' => 'April',
                        'Mei' => 'Mei',
                        'Juni' => 'Juni',
                        'Juli' => 'Juli',
                        'Agustus' => 'Agustus',
                        'September' => 'September',
                        'Oktober' => 'Oktober',
                        'November' => 'November',
                        'Desember' => 'Desember',
                    ])
                    ->searchable()
                    ->multiple(),
                SelectFilter::make('tahun')
                    ->options([
                        '2023' => '2023',
                        '2024' => '2024',
                        '2025' => '2025',
                        '2026' => '2026',
                        '2027' => '2027',
                        '2028' => '2028',
                        '2029' => '2029',
                        '2030' => '2030',
                        '2031' => '2031',
                        '2032' => '2032',
                        '2033' => '2033',
                    ])
                    ->searchable()
                    ->multiple(),
                Tables\Filters\SelectFilter::make('user_id')
                    ->searchable()
                    ->hidden(fn() => Auth::user()->hasRole('operator'))
                    ->preload()
                    ->label('User')
                    ->options(
                        User::whereHas('roles', function ($query) {
                            $query->where('name', 'operator');
                        })->get()->pluck('name', 'id')
                    )
                    ->multiple(),
            ], layout: FiltersLayout::AboveContent)
            ->filtersTriggerAction(
                fn(Action $action) => $action
                    ->button()
                    ->label('Filter'),
            )->filtersFormColumns(auth()->user()->hasRole('operator') ? 4 : 5)
            ->actions([
                Tables\Actions\EditAction::make(),
                Action::make('unduh_berkas')
                    ->button()
                    ->color('warning')
                    ->action(function (LaporIzinOss $lapor_izin_oss) {
                        $lapor_izin = LaporIzinOss::find($lapor_izin_oss->id);
                        return response()->download(storage_path('app/public/' . $lapor_izin->berkas));
                    })
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                    Tables\Actions\ForceDeleteBulkAction::make(),
                    Tables\Actions\RestoreBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListLaporIzinOsses::route('/'),
            'create' => Pages\CreateLaporIzinOss::route('/create'),
            'view' => Pages\ViewLaporIzinOss::route('/{record}'),
            'edit' => Pages\EditLaporIzinOss::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        $query =  parent::getEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
        $role_user_check = User::whereId(Auth::id())->first()->roles->pluck('name')->first();
        if ($role_user_check == 'super_admin' || $role_user_check == 'admin') {
            return $query;
        } else if ($role_user_check == 'operator') {
            return $query->whereUserId(Auth::id());
        } else {
            return abort(403);
        }
    }
}
