<?php

namespace App\Filament\Resources\SlideConfigResource\Pages;

use App\Filament\Resources\SlideConfigResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSlideConfigs extends ListRecords
{
    protected static string $resource = SlideConfigResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
