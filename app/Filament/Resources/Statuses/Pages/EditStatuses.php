<?php

namespace App\Filament\Resources\Statuses\Pages;

use App\Filament\Resources\Statuses\StatusesResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditStatuses extends EditRecord
{
    protected static string $resource = StatusesResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
