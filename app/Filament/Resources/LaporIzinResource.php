<?php

namespace App\Filament\Resources;

use Filament\Forms;
use App\Models\User;
use Filament\Tables;
use Filament\Forms\Form;
use App\Models\LaporIzin;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Tables\Actions\Action;
use Illuminate\Support\Facades\Auth;
use Filament\Forms\Components\Section;
use Filament\Tables\Enums\FiltersLayout;
use Filament\Tables\Actions\ExportAction;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Exports\LaporIzinExporter;
use App\Filament\Resources\LaporIzinResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Malzariey\FilamentDaterangepickerFilter\Filters\DateRangeFilter;

class LaporIzinResource extends Resource
{
    protected static ?string $model = LaporIzin::class;

    protected static ?string $navigationIcon = 'heroicon-o-paper-airplane';
    protected static ?string $navigationGroup = 'Pelaporan Non OSS';
    protected static ?string $pluralModelLabel = 'Lapor Izin Non OSS';
    protected static ?int $navigationSort = 4;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make()
                    ->schema([
                        Forms\Components\TextInput::make('nama_perusahaan')
                            ->required()
                            ->columnSpanFull()
                            ->maxLength(255),
                        Forms\Components\Textarea::make('alamat_perusahaan')
                            ->columnSpan(2)
                            ->required(),
                        Forms\Components\Toggle::make('is_alamat_proyek')
                            ->label('Ada Alamat Proyek ?')
                            ->onIcon('heroicon-m-bolt')
                            ->offIcon('heroicon-m-user')
                            ->reactive()
                            ->columnSpanFull()
                            ->afterStateUpdated(function (callable $set, $state) {
                                $set('is_alamat_proyek', $state); // Menyimpan status toggle
                            }),
                        Forms\Components\Textarea::make('alamat_proyek')
                            ->label('Alamat Proyek')
                            ->maxLength(255)
                            ->columnSpanFull()
                            ->visible(fn(callable $get) => $get('is_alamat_proyek') || $get('alamat_proyek') != null), // Kontrol visibilitas berdasarkan toggle
                        Forms\Components\DatePicker::make('tanggal_masuk')
                            ->required(),
                        Forms\Components\DatePicker::make('tanggal_izin')
                            ->required(),
                        Forms\Components\TextInput::make('nomor_izin')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\Select::make('izin_id')
                            ->relationship(
                                name: 'izin',
                                titleAttribute: 'nama_izin',
                                modifyQueryUsing: fn(Builder $query) => $query->whereUserId(Auth::id()),
                            )
                            ->native(false)
                            ->required()
                            ->preload()
                            ->searchable(),
                    ])->columns(2)
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama_perusahaan')
                    ->wrap()
                    ->searchable(),
                Tables\Columns\TextColumn::make('alamat_perusahaan')
                    ->wrap()
                    ->searchable(),
                Tables\Columns\TextColumn::make('alamat_proyek')
                    ->wrap()
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->searchable(),
                Tables\Columns\TextColumn::make('tanggal_masuk')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('tanggal_izin')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('nomor_izin')
                    ->searchable(),
                Tables\Columns\TextColumn::make('izin.nama_izin')
                    ->numeric()
                    ->description(
                        fn(LaporIzin $record) => $record->izin->sektor->nama_sektor,
                        position: 'below'
                    )
                    ->sortable(),
                Tables\Columns\TextColumn::make('user.name')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->sortable(),
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
                Tables\Filters\SelectFilter::make('izin.sektor')
                    ->searchable()
                    ->preload()
                    ->label('Sektor')
                    ->multiple()
                    ->relationship('izin.sektor', 'nama_sektor'),
                Tables\Filters\SelectFilter::make('izin')
                    ->searchable()
                    ->preload()
                    ->label('Izin')
                    ->multiple()
                    ->relationship(
                        name: 'izin',
                        titleAttribute: 'nama_izin',
                        modifyQueryUsing: fn(Builder $query) => $query->whereUserId(Auth::id()),
                    ),
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
                DateRangeFilter::make('tanggal_izin'),
            ], layout: FiltersLayout::AboveContent)
            ->filtersTriggerAction(
                fn(Action $action) => $action
                    ->button()
                    ->label('Filter'),
            )->filtersFormColumns(auth()->user()->hasRole('operator') ? 4 : 5)
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                    Tables\Actions\ForceDeleteBulkAction::make(),
                    Tables\Actions\RestoreBulkAction::make(),
                ]),
            ])
            ->headerActions([
                ExportAction::make()
                    ->exporter(LaporIzinExporter::class)
            ]);;
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
            'index' => Pages\ListLaporIzins::route('/'),
            'create' => Pages\CreateLaporIzin::route('/create'),
            'view' => Pages\ViewLaporIzin::route('/{record}'),
            'edit' => Pages\EditLaporIzin::route('/{record}/edit'),
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
