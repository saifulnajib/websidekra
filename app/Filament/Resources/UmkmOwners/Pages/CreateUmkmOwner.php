<?php

namespace App\Filament\Resources\UmkmOwners\Pages;

use App\Filament\Resources\UmkmOwners\UmkmOwnerResource;
use Filament\Resources\Pages\CreateRecord;

class CreateUmkmOwner extends CreateRecord
{
    protected static string $resource = UmkmOwnerResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
