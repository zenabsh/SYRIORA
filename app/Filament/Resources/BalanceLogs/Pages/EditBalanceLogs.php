<?php

namespace App\Filament\Resources\BalanceLogs\Pages;

use App\Filament\Resources\BalanceLogs\BalanceLogsResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditBalanceLogs extends EditRecord
{
    protected static string $resource = BalanceLogsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
