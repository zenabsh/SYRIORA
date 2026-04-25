<?php

namespace App\Filament\Resources\LocationTypes;

use App\Filament\Resources\LocationTypes\Pages\CreateLocationTypes;
use App\Filament\Resources\LocationTypes\Pages\EditLocationTypes;
use App\Filament\Resources\LocationTypes\Pages\ListLocationTypes;
use App\Filament\Resources\LocationTypes\Schemas\LocationTypesForm;
use App\Filament\Resources\LocationTypes\Tables\LocationTypesTable;
use App\Models\LocationTypes;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class LocationTypesResource extends Resource
{
    protected static ?string $model = LocationTypes::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return LocationTypesForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return LocationTypesTable::configure($table);
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
            'index' => ListLocationTypes::route('/'),
            'create' => CreateLocationTypes::route('/create'),
            'edit' => EditLocationTypes::route('/{record}/edit'),
        ];
    }
}
