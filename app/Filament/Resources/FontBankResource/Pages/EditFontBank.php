<?php

namespace App\Filament\Resources\FontBankResource\Pages;

use App\Filament\Resources\FontBankResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditFontBank extends EditRecord
{
    protected static string $resource = FontBankResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
