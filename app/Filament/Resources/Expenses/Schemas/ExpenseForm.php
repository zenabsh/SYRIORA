<?php

namespace App\Filament\Resources\Expenses\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class ExpenseForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('requested_by')
                    ->required()
                    ->numeric(),
                TextInput::make('approved_by')
                    ->numeric()
                    ->default(null),
                TextInput::make('amount')
                    ->required()
                    ->numeric(),
                Textarea::make('description')
                    ->required()
                    ->columnSpanFull(),
                DatePicker::make('expnses_date')
                    ->required(),
                TextInput::make('status')
                    ->required(),
                TextInput::make('proof_document_url')
                    ->url()
                    ->required(),
            ]);
    }
}
