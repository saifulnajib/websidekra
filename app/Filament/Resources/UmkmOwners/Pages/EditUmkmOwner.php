<?php

namespace App\Filament\Resources\UmkmOwners\Pages;

use App\Filament\Resources\UmkmOwners\UmkmOwnerResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditUmkmOwner extends EditRecord
{
    protected static string $resource = UmkmOwnerResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
