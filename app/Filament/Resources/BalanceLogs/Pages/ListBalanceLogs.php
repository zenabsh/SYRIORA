<?php

namespace App\Filament\Resources\BalanceLogs\Pages;

use App\Filament\Resources\BalanceLogs\BalanceLogsResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListBalanceLogs extends ListRecords
{
    protected static string $resource = BalanceLogsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
