<?php

namespace App\Filament\Resources\UmkmOwners\Pages;

use App\Filament\Resources\UmkmOwners\UmkmOwnerResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListUmkmOwners extends ListRecords
{
    protected static string $resource = UmkmOwnerResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
