<?php

namespace App\Filament\Resources\Setting2Resource\Pages;

use App\Filament\Resources\Setting2Resource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSetting2s extends ListRecords
{
    protected static string $resource = Setting2Resource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
