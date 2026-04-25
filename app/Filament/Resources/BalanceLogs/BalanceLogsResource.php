<?php

namespace App\Filament\Resources\BalanceLogs;

use App\Filament\Resources\BalanceLogs\Pages\CreateBalanceLogs;
use App\Filament\Resources\BalanceLogs\Pages\EditBalanceLogs;
use App\Filament\Resources\BalanceLogs\Pages\ListBalanceLogs;
use App\Filament\Resources\BalanceLogs\Schemas\BalanceLogsForm;
use App\Filament\Resources\BalanceLogs\Tables\BalanceLogsTable;
use App\Models\BalanceLogs;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class BalanceLogsResource extends Resource
{
    protected static ?string $model = BalanceLogs::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'id';

    public static function form(Schema $schema): Schema
    {
        return BalanceLogsForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return BalanceLogsTable::configure($table);
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
            'index' => ListBalanceLogs::route('/'),
            'create' => CreateBalanceLogs::route('/create'),
            'edit' => EditBalanceLogs::route('/{record}/edit'),
        ];
    }
}
