<?php

namespace App\Filament\Resources\SiteConfigs\Schemas;

use App\Models\SiteConfig;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\KeyValue;
use Filament\Schemas\Schema;

class SiteConfigForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('key')
                    ->required()
                    ->unique(ignoreRecord: true)
                    ->helperText('Unique identifier for this configuration'),

                TextInput::make('label')
                    ->required()
                    ->helperText('Display name for this configuration'),

                Select::make('group')
                    ->options(SiteConfig::getGroups())
                    ->required()
                    ->default('general'),

                Select::make('type')
                    ->options(SiteConfig::getTypes())
                    ->required()
                    ->default('text')
                    ->live()
                    ->afterStateUpdated(function ($state, callable $set) {
                        // Reset value when type changes
                        if ($state === 'boolean') {
                            $set('value', '0');
                        } elseif ($state === 'json' || $state === 'array') {
                            $set('value', '[]');
                        } else {
                            $set('value', '');
                        }
                    }),

                // Dynamic value field based on type
                TextInput::make('value')
                    ->label('Value')
                    ->required()
                    ->visible(fn (callable $get) => in_array($get('type'), ['text', 'email', 'url', 'number']))
                    ->type(fn (callable $get) => $get('type') === 'number' ? 'number' : 'text'),

                Textarea::make('value')
                    ->label('Value')
                    ->required()
                    ->visible(fn (callable $get) => $get('type') === 'textarea')
                    ->columnSpanFull(),

                Toggle::make('value')
                    ->label('Value')
                    ->required()
                    ->visible(fn (callable $get) => $get('type') === 'boolean'),

                FileUpload::make('value')
                    ->label('File')
                    ->required()
                    ->visible(fn (callable $get) => in_array($get('type'), ['file', 'image']))
                    ->disk('public')
                    ->directory('site-configs')
                    ->acceptedFileTypes(fn (callable $get) =>
                        $get('type') === 'image' ? ['image/jpeg', 'image/png', 'image/gif', 'image/webp'] : []
                    )
                    ->maxSize(5120), // 5MB

                KeyValue::make('value')
                    ->label('JSON Data')
                    ->required()
                    ->visible(fn (callable $get) => $get('type') === 'json')
                    ->columnSpanFull()
                    ->addActionLabel('Add Property'),

                Textarea::make('description')
                    ->columnSpanFull()
                    ->helperText('Optional description for this configuration'),

                Toggle::make('is_public')
                    ->label('Public Access')
                    ->helperText('Allow public access to this configuration')
                    ->default(true),

                TextInput::make('sort_order')
                    ->numeric()
                    ->default(0)
                    ->helperText('Order for displaying this configuration'),
            ]);
    }
}
