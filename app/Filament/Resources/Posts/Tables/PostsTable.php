<?php

namespace App\Filament\Resources\Posts\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class PostsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                /*TextColumn::make('user_id')
                    ->numeric()
                    ->sortable(),*/
                /*TextColumn::make('category_id')
                    ->numeric()
                    ->sortable(),*/
                /*TextColumn::make('status_id')
                    ->numeric()
                    ->sortable(),*/
 
                TextColumn::make('category.name')
                    ->label('Category'),
                TextColumn::make('status.name')
                    ->label('Stat'),
                TextColumn::make('user.name')
                    ->label('User'),
                TextColumn::make('title')
                    ->searchable(),
                TextColumn::make('required_amount')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('total_amount')
                    ->numeric()
                    ->sortable(),
                ImageColumn::make('image'),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
