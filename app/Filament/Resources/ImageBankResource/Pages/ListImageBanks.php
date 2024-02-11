<?php

namespace App\Filament\Resources\ImageBankResource\Pages;

use App\Filament\Resources\ImageBankResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Support\Facades\View;

class ListImageBanks extends ListRecords
{
    protected static string $resource = ImageBankResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
