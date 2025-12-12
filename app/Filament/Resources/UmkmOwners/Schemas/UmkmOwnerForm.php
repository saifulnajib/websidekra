<?php

namespace App\Filament\Resources\UmkmOwners\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\FileUpload;
use Illuminate\Support\Str;
use Filament\Schemas\Schema;

class UmkmOwnerForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('owner_name')
                    ->required(),
                TextInput::make('phone_number')
                    ->tel(),
                TextInput::make('email')
                    ->label('Email address')
                    ->email(),
                Textarea::make('address')
                    ->columnSpanFull(),
                TextInput::make('business_name')
                    ->required()
                    ->reactive()
                    ->afterStateUpdated(function (?string $state, callable $set): void {
                        $set('business_slug', $state ? Str::slug($state) : null);
                    }),
                TextInput::make('business_slug')
                    ->required()
                    ->hint('Auto-generated from business name; you can edit if needed.'),
                Select::make('category_id')
                    ->label('Category')
                    ->relationship('category', 'name')
                    ->searchable()
                    ->preload()
                    ->required(),
                Select::make('status')
                    ->options(['aktif' => 'Aktif', 'nonaktif' => 'Nonaktif', 'verifikasi' => 'Verifikasi'])
                    ->default('verifikasi')
                    ->required(),
                TextInput::make('established_year'),
                Textarea::make('description')
                    ->columnSpanFull(),
                FileUpload::make('logo_path')
                    ->label('Logo')
                    ->image()
                    ->directory('umkm-logos')
                    ->disk('public')
                    ->visibility('public')
                    ->nullable(),
                TextInput::make('latitude')
                    ->numeric(),
                TextInput::make('longitude')
                    ->numeric(),
            ]);
    }
}
