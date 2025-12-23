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
                    ->afterStateUpdated(function ($state, callable $set, callable $get) {
                        $currentValue = $get('value');
                        // Reset all type-specific fields
                        $set('value_textarea', '');
                        $set('value_boolean', false);
                        $set('value_file', null);
                        $set('value_json', []);

                        // If we have a current value, try to convert it to the new type
                        if ($currentValue) {
                            switch ($state) {
                                case 'boolean':
                                    $set('value_boolean', filter_var($currentValue, FILTER_VALIDATE_BOOLEAN));
                                    break;
                                case 'textarea':
                                    $set('value_textarea', $currentValue);
                                    break;
                                case 'json':
                                    if (is_string($currentValue)) {
                                        $decoded = json_decode($currentValue, true);
                                        $set('value_json', $decoded ?? []);
                                    } elseif (is_array($currentValue)) {
                                        $set('value_json', $currentValue);
                                    }
                                    break;
                                case 'file':
                                case 'image':
                                    $set('value_file', $currentValue);
                                    break;
                            }
                        }
                    }),

                // Single value field that adapts based on type
                TextInput::make('value')
                    ->label('Value')
                    ->required()
                    ->visible(fn (callable $get) => in_array($get('type'), ['text', 'email', 'url', 'number']))
                    ->type(fn (callable $get) => $get('type') === 'number' ? 'number' : 'text')
                    ->dehydrateStateUsing(function ($state, callable $get) {
                        $type = $get('type');
                        return match ($type) {
                            'number' => (string) $state,
                            default => $state,
                        };
                    })
                    ->mutateDehydratedStateUsing(function ($state, callable $get) {
                        $type = $get('type');
                        return match ($type) {
                            'number' => (int) $state,
                            default => $state,
                        };
                    }),

                Textarea::make('value_textarea')
                    ->label('Value')
                    ->required()
                    ->visible(fn (callable $get) => $get('type') === 'textarea')
                    ->dehydrateStateUsing(fn ($state) => $state)
                    ->mutateDehydratedStateUsing(fn ($state) => $state)
                    ->default('')
                    ->columnSpanFull(),

                Toggle::make('value_boolean')
                    ->label('Value')
                    ->required()
                    ->visible(fn (callable $get) => $get('type') === 'boolean')
                    ->dehydrateStateUsing(fn ($state) => $state ? '1' : '0')
                    ->mutateDehydratedStateUsing(fn ($state) => filter_var($state, FILTER_VALIDATE_BOOLEAN))
                    ->default(false),

                FileUpload::make('value_file')
                    ->label('File')
                    ->required()
                    ->visible(fn (callable $get) => in_array($get('type'), ['file', 'image']))
                    ->disk('public')
                    ->directory('site-configs')
                    ->acceptedFileTypes(function (callable $get) {
                        $type = $get('type');
                        return match($type) {
                            'image' => ['image/jpeg', 'image/png', 'image/gif', 'image/webp', 'image/jpg'],
                            'file' => ['application/pdf', 'application/msword', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 'text/plain', 'application/zip', 'application/x-zip-compressed'],
                            default => [],
                        };
                    })
                    ->key(fn (callable $get) => 'file-upload-' . $get('type'))
                    ->reactive()
                    ->maxSize(5120), // 5MB

                KeyValue::make('value_json')
                    ->label('JSON Data')
                    ->required()
                    ->visible(fn (callable $get) => $get('type') === 'json')
                    ->columnSpanFull()
                    ->addActionLabel('Add Property')
                    ->dehydrateStateUsing(fn ($state) => json_encode($state))
                    ->mutateDehydratedStateUsing(function ($state) {
                        if (is_string($state)) {
                            $decoded = json_decode($state, true);
                            return $decoded ?? [];
                        }
                        return is_array($state) ? $state : [];
                    })
                    ->default([]),

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
