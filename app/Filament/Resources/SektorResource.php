<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SektorResource\Pages;
use App\Filament\Resources\SektorResource\RelationManagers;
use App\Models\Sektor;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SektorResource extends Resource
{
    protected static ?string $model = Sektor::class;

    protected static ?string $navigationGroup = 'Konfigurasi';
    protected static ?string $pluralModelLabel = 'Sektor';
    protected static ?int $navigationSort = 2;    

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama_sektor')
                    ->searchable(),
                Tables\Columns\TextColumn::make('nama_instansi')
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
            'index' => Pages\ListSektors::route('/'),
            'create' => Pages\CreateSektor::route('/create'),
            'view' => Pages\ViewSektor::route('/{record}'),
            'edit' => Pages\EditSektor::route('/{record}/edit'),
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
