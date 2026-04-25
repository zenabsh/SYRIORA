<?php

namespace App\Filament\Resources\LocationTypes\Pages;

use App\Filament\Resources\LocationTypes\LocationTypesResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditLocationTypes extends EditRecord
{
    protected static string $resource = LocationTypesResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
