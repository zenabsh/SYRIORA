<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\User;
use App\Models\Post;
use App\Models\Expense;

class StatsOverview extends StatsOverviewWidget
{

    protected function getStats(): array
    {
        return [
            Stat::make('Users', User::count()),

            Stat::make('Posts', Post::count()),

            Stat::make(
                'Approved Posts',
                Post::whereHas('status', function ($q) {
                    $q->where('name', 'approved');
                })->count()
            ),

            Stat::make(
                'Rejected Posts',
                Post::whereHas('status', function ($q) {
                    $q->where('name', 'rejected');
                })->count()
            ),

            Stat::make(
                'Total Expenses',
                Expense::where('status', 'approved')->sum('amount')
            ),
        ];
    }
}
