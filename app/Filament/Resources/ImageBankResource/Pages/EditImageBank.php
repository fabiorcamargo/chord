<?php

namespace App\Filament\Resources\ImageBankResource\Pages;

use App\Filament\Resources\ImageBankResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditImageBank extends EditRecord
{
    protected static string $resource = ImageBankResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
