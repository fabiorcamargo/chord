<?php

namespace App\Filament\Resources\VideoBankResource\Pages;

use App\Filament\Resources\VideoBankResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListVideoBanks extends ListRecords
{
    protected static string $resource = VideoBankResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
