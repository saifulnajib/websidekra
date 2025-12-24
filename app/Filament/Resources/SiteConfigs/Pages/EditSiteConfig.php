<?php

namespace App\Filament\Resources\SiteConfigs\Pages;

use App\Filament\Resources\SiteConfigs\SiteConfigResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditSiteConfig extends EditRecord
{
    protected static string $resource = SiteConfigResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }

    protected function fillForm(): void
    {
        $record = $this->getRecord();
        $data = $record->toArray();

        // Apply the resource's mutateFormDataBeforeFill method
        $data = static::getResource()::mutateFormDataBeforeFill($data);

        $this->form->fill($data);
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
