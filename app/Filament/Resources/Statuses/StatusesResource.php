<?php

namespace App\Filament\Resources\Statuses;

use App\Filament\Resources\Statuses\Pages\CreateStatuses;
use App\Filament\Resources\Statuses\Pages\EditStatuses;
use App\Filament\Resources\Statuses\Pages\ListStatuses;
use App\Filament\Resources\Statuses\Schemas\StatusesForm;
use App\Filament\Resources\Statuses\Tables\StatusesTable;
use App\Models\Statuses;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class StatusesResource extends Resource
{
    protected static ?string $model = Statuses::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Schema $schema): Schema
    {
        return StatusesForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return StatusesTable::configure($table);
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
            'index' => ListStatuses::route('/'),
            'create' => CreateStatuses::route('/create'),
            'edit' => EditStatuses::route('/{record}/edit'),
        ];
    }
}
