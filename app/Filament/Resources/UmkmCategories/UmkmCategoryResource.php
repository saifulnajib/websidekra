<?php

namespace App\Filament\Resources\UmkmCategories;

use App\Filament\Resources\UmkmCategories\Pages\CreateUmkmCategory;
use App\Filament\Resources\UmkmCategories\Pages\EditUmkmCategory;
use App\Filament\Resources\UmkmCategories\Pages\ListUmkmCategories;
use App\Filament\Resources\UmkmCategories\Schemas\UmkmCategoryForm;
use App\Filament\Resources\UmkmCategories\Tables\UmkmCategoriesTable;
use App\Models\UmkmCategory;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class UmkmCategoryResource extends Resource
{
    protected static ?string $model = UmkmCategory::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

     protected static ?string $navigationLabel = 'Kategori UMKM';

    protected static ?string $modelLabel = 'Kategori UMKM';

    protected static ?string $pluralModelLabel = 'Kategori UMKM';
    protected static ?string $recordTitleAttribute = 'Kategori UMKM';

    public static function form(Schema $schema): Schema
    {
        return UmkmCategoryForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return UmkmCategoriesTable::configure($table);
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
            'index' => ListUmkmCategories::route('/'),
            'create' => CreateUmkmCategory::route('/create'),
            'edit' => EditUmkmCategory::route('/{record}/edit'),
        ];
    }

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }
}
