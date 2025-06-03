<?php

namespace App\Filament\Resources\DongXuCollectionResource\Pages;

use App\Filament\Resources\DongXuCollectionResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditDongXuCollection extends EditRecord
{
    protected static string $resource = DongXuCollectionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
