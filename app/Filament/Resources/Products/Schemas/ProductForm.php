<?php

namespace App\Filament\Resources\Products\Schemas;

use App\Models\UmkmOwner;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Components\Utilities\Set;
use Filament\Schemas\Schema;

class ProductForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required(),
                Textarea::make('description')
                    ->columnSpanFull(),
                TextInput::make('price')
                    ->required()
                    ->numeric()
                    ->prefix('$'),
                FileUpload::make('file')
                    ->label('Product File')
                    ->disk('public')
                    ->directory('products')
                    ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/gif'])
                    ->maxSize(10240),
                Select::make('umkm_owner_id')
                    ->relationship('umkmOwner', 'business_name')
                    ->required()
                    ->afterStateUpdated(function (Set $set, $state) {
                        $owner = UmkmOwner::find($state);
                        $set('umkm_category_id', $owner?->category_id);
                    }),
                Select::make('umkm_category_id')
                    ->relationship('umkmCategory', 'name')
                    ->disabled(),
            ]);
    }
}
