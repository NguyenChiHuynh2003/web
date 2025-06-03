<?php

namespace App\Filament\Resources\QgResource\Pages;

use App\Filament\Resources\QgResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListQgs extends ListRecords
{
    protected static string $resource = QgResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
