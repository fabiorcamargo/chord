<?php

namespace App\Filament\Resources\VideoBankResource\Pages;

use App\Filament\Resources\VideoBankResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditVideoBank extends EditRecord
{
    protected static string $resource = VideoBankResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
