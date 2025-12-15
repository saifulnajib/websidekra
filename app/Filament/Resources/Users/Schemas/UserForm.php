<?php

namespace App\Filament\Resources\Users\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use Illuminate\Support\Facades\Hash;

class UserForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required(),
                TextInput::make('email')
                    ->label('Email address')
                    ->email()
                    ->required(),
                TextInput::make('password')
                    ->password()
                    ->required(fn(string $operation) => $operation === 'create')
                    ->nullable()
                    ->dehydrateStateUsing(fn ($state) => filled($state) ? Hash::make($state) : null),
                TextInput::make('confirm_password')
                    ->password()
                    ->label('Confirm Password')
                    ->same('password')
                    ->required(fn(string $operation) => $operation === 'create')
                    ->dehydrated(false),
            ]);
    }
}
