<?php

namespace App\Filament\Resources\VideoBankResource\Pages;

use App\Filament\Resources\VideoBankResource;
use App\Livewire\VideoPreview;
use Filament\Actions;
use Filament\Infolists\Components\Livewire;
use Filament\Infolists\Infolist;
use Filament\Resources\Pages\ViewRecord;

class ViewVideoBank extends ViewRecord
{
    protected static string $resource = VideoBankResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }

    public function infolist(Infolist $infolist): Infolist
    {


        return $infolist
            ->schema([
                Livewire::make(VideoPreview::class, ['video' => $infolist->record]),

            ]);
    }
}
