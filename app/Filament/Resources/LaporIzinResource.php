<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use App\Models\LaporIzin;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Tables\Actions\ImportAction;
use Filament\Forms\Components\Section;
use Filament\Tables\Actions\ExportAction;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Exports\LaporIzinExporter;
use App\Filament\Imports\LaporIzinImporter;
use App\Filament\Resources\LaporIzinResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\LaporIzinResource\RelationManagers;

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
                        Forms\Components\TextArea::make('alamat_perusahaan')
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
                        Forms\Components\TextArea::make('alamat_proyek')
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
                            ->relationship('izin', 'nama_izin')
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
                    ->numeric()
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
            ])
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
        return parent::getEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}
