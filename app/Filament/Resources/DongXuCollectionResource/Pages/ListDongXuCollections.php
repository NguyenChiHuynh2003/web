<?php

namespace App\Filament\Resources\DongXuCollectionResource\Pages;

use App\Filament\Resources\DongXuCollectionResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListDongXuCollections extends ListRecords
{
    protected static string $resource = DongXuCollectionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
