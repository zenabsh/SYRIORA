<?php

namespace App\Filament\Resources\Posts\Pages;

use App\Filament\Resources\Posts\PostResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use Filament\Schemas\Components\Tabs\Tab;
use Illuminate\Database\Eloquent\Builder;

class ListPosts extends ListRecords
{
    protected static string $resource = PostResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
    public function getTabs(): array
{
    return [
        'all' => Tab::make('الكل'),

        'approved' => Tab::make('الموافق عليها')
            ->modifyQueryUsing(fn ($query) =>
                $query->where('', 1)
            ),

        'pending' => Tab::make('قيد الانتظار')
            ->modifyQueryUsing(fn ($query) =>
                $query->where('status_id', 2)
            ),

        'rejected' => Tab::make('مرفوضة')
            ->modifyQueryUsing(fn ($query) =>
                $query->where('status_id', 3)
            ),
    ];
}
}
