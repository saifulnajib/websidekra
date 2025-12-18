<?php

namespace App\Filament\Resources\SiteConfigs;

use App\Filament\Resources\SiteConfigs\Pages\CreateSiteConfig;
use App\Filament\Resources\SiteConfigs\Pages\EditSiteConfig;
use App\Filament\Resources\SiteConfigs\Pages\ListSiteConfigs;
use App\Filament\Resources\SiteConfigs\Schemas\SiteConfigForm;
use App\Filament\Resources\SiteConfigs\Tables\SiteConfigsTable;
use App\Models\SiteConfig;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class SiteConfigResource extends Resource
{
    protected static ?string $model = SiteConfig::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedCog6Tooth;

    protected static ?string $navigationLabel = 'Site Config';

    protected static ?string $modelLabel = 'Site Configuration';

    protected static ?string $pluralModelLabel = 'Site Configurations';

    protected static ?string $recordTitleAttribute = 'label';

    public static function form(Schema $schema): Schema
    {
        return SiteConfigForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return SiteConfigsTable::configure($table);
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
            'index' => ListSiteConfigs::route('/'),
            'create' => CreateSiteConfig::route('/create'),
            'edit' => EditSiteConfig::route('/{record}/edit'),
        ];
    }
}
