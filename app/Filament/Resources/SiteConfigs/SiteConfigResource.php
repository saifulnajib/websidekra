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

    public static function mutateFormDataBeforeFill(array $data): array
    {
        if (isset($data['type']) && isset($data['value'])) {
            // Map the database value to the appropriate form field based on type
            $type = $data['type'];
            $value = $data['value'];

            switch ($type) {
                case 'textarea':
                    $data['value_textarea'] = $value;
                    break;
                case 'boolean':
                    $data['value_boolean'] = filter_var($value, FILTER_VALIDATE_BOOLEAN);
                    break;
                case 'file':
                case 'image':
                    // Jika user upload file baru
                    if (!empty($data['value_file'])) {
                        $fileValue = $data['value_file'];

                        if (is_array($fileValue)) {
                            $data['value'] = $fileValue[0] ?? '';
                        } else {
                            $data['value'] = (string) $fileValue;
                        }
                    } else {
                        // 🔑 PERTAHANKAN nilai lama
                        unset($data['value']);
                    }
                    break;

                default:
                    // For text, email, url, number - keep in main 'value' field
                    break;
            }
        }
        return $data;
    }

    public static function mutateFormDataBeforeSave(array $data): array
    {
        if (isset($data['type'])) {
            $type = $data['type'];

            // Get the value from the appropriate form field
            switch ($type) {
                case 'textarea':
                    $data['value'] = $data['value_textarea'] ?? '';
                    break;
                case 'boolean':
                    $data['value'] = ($data['value_boolean'] ?? false) ? '1' : '0';
                    break;
                case 'file':
                case 'image':
                    $fileValue = $data['value_file'] ?? null;
                    if (is_array($fileValue)) {
                        $data['value'] = $fileValue[0] ?? ''; // Take first file if array
                    } else {
                        $data['value'] = (string) $fileValue;
                    }
                    break;
                case 'json':
                    $jsonData = $data['value_json'] ?? [];
                    $data['value'] = json_encode($jsonData);
                    break;
                default:
                    // For text, email, url, number - already in 'value' field
                    $data['value'] = (string) ($data['value'] ?? '');
                    break;
            }

            // Remove the form-specific fields from data before saving
            unset($data['value_textarea'], $data['value_boolean'], $data['value_file'], $data['value_json']);
        }

        return $data;
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
