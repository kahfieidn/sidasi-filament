<?php

namespace App\Filament\Resources;

use Filament\Forms;
use App\Models\Izin;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Section;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\IzinResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\IzinResource\RelationManagers;

class IzinResource extends Resource
{
    protected static ?string $model = Izin::class;

    // protected static ?string $navigationIcon = 'heroicon-o-paper-airplane';
    protected static ?string $navigationGroup = 'Konfigurasi';
    protected static ?string $pluralModelLabel = 'Izin';
    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
                Section::make('Data Izin')
                    ->schema([
                        Forms\Components\TextInput::make('nama_izin')
                            ->required()
                            ->columnSpanFull()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('masa_kerja')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('biaya')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\Select::make('jenis_izin_id')
                            ->searchable()
                            ->preload()
                            ->required()
                            ->relationship(name: 'jenis_izin', titleAttribute: 'nama_izin'),
                        Forms\Components\Select::make('sektor_id')
                            ->searchable()
                            ->preload()
                            ->required()
                            ->relationship(name: 'sektor', titleAttribute: 'nama_sektor'),
                    ])->columns(2)
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama_izin')
                    ->searchable(),
                Tables\Columns\TextColumn::make('masa_kerja')
                    ->searchable(),
                Tables\Columns\TextColumn::make('biaya')
                    ->searchable(),
                Tables\Columns\TextColumn::make('jenis_izin.nama_izin')
                    ->searchable(),
                Tables\Columns\TextColumn::make('sektor.nama_sektor')
                    ->searchable(),
                Tables\Columns\TextColumn::make('user.name')
                    ->searchable(),
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
            'index' => Pages\ListIzins::route('/'),
            'create' => Pages\CreateIzin::route('/create'),
            'view' => Pages\ViewIzin::route('/{record}'),
            'edit' => Pages\EditIzin::route('/{record}/edit'),
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
