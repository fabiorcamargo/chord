<?php

namespace App\Filament\Resources\ImageBankResource\Pages;

use App\Filament\Resources\ImageBankResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewImageBank extends ViewRecord
{
    protected static string $resource = ImageBankResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
