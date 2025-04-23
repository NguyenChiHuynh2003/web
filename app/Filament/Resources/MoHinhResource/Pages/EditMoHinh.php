<?php

namespace App\Filament\Resources\MoHinhResource\Pages;

use App\Filament\Resources\MoHinhResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditMoHinh extends EditRecord
{
    protected static string $resource = MoHinhResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
