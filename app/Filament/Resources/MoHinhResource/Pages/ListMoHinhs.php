<?php

namespace App\Filament\Resources\MoHinhResource\Pages;

use App\Filament\Resources\MoHinhResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMoHinhs extends ListRecords
{
    protected static string $resource = MoHinhResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
