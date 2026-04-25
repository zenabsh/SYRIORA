<?php

namespace App\Filament\Resources\LocationTypes\Pages;

use App\Filament\Resources\LocationTypes\LocationTypesResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListLocationTypes extends ListRecords
{
    protected static string $resource = LocationTypesResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
