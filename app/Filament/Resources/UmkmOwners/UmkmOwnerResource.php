<?php

namespace App\Filament\Resources\UmkmOwners;

use App\Filament\Resources\UmkmOwners\Pages\CreateUmkmOwner;
use App\Filament\Resources\UmkmOwners\Pages\EditUmkmOwner;
use App\Filament\Resources\UmkmOwners\Pages\ListUmkmOwners;
use App\Filament\Resources\UmkmOwners\Schemas\UmkmOwnerForm;
use App\Filament\Resources\UmkmOwners\Tables\UmkmOwnersTable;
use App\Models\UmkmOwner;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class UmkmOwnerResource extends Resource
{
    protected static ?string $model = UmkmOwner::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

     protected static ?string $navigationLabel = 'UMKM';

    protected static ?string $modelLabel = 'UMKM';

    protected static ?string $pluralModelLabel = 'UMKM';
    protected static ?string $recordTitleAttribute = 'UMKM';

    public static function form(Schema $schema): Schema
    {
        return UmkmOwnerForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return UmkmOwnersTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListUmkmOwners::route('/'),
            'create' => CreateUmkmOwner::route('/create'),
            'edit' => EditUmkmOwner::route('/{record}/edit'),
        ];
    }

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }
}
