<?php

namespace App\Filament\Resources\SiteConfigs\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class SiteConfigsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('key')
                    ->searchable()
                    ->copyable()
                    ->weight('bold'),

                TextColumn::make('label')
                    ->searchable()
                    ->limit(30),

                TextColumn::make('value')
                    ->limit(50)
                    ->tooltip(function ($record) {
                        return strlen($record->value) > 50 ? $record->value : null;
                    })
                    ->placeholder('-'),

                TextColumn::make('type')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'text', 'textarea' => 'gray',
                        'email' => 'blue',
                        'url' => 'cyan',
                        'file', 'image' => 'purple',
                        'boolean' => 'yellow',
                        'number' => 'green',
                        'json', 'array' => 'orange',
                        default => 'gray',
                    }),

                TextColumn::make('group')
                    ->badge()
                    ->color('primary'),

                IconColumn::make('is_public')
                    ->boolean()
                    ->label('Public'),

                TextColumn::make('sort_order')
                    ->numeric()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                SelectFilter::make('group')
                    ->options(\App\Models\SiteConfig::getGroups())
                    ->placeholder('All Groups'),

                SelectFilter::make('type')
                    ->options(\App\Models\SiteConfig::getTypes())
                    ->placeholder('All Types'),

                SelectFilter::make('is_public')
                    ->options([
                        '1' => 'Public',
                        '0' => 'Private',
                    ])
                    ->placeholder('All Access Levels'),
            ])
            ->defaultSort('group')
            ->defaultSort('sort_order')
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
