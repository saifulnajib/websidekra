<?php

namespace App\Filament\Resources\UmkmCategories\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Illuminate\Support\Str;
use Filament\Schemas\Schema;

class UmkmCategoryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required()
                    ->reactive()
                    ->afterStateUpdated(function (?string $state, callable $set): void {
                        $set('slug', $state ? Str::slug($state) : null);
                    }),
                TextInput::make('slug')
                    ->required()
                    ->hint('Auto-generated from name; you can edit if needed.'),
                Textarea::make('description')
                    ->columnSpanFull(),
                Toggle::make('is_active')
                    ->required(),
            ]);
    }
}
