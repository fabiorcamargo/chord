<?php

namespace App\Filament\Resources\SongResource\Pages;

use App\Filament\Resources\SongResource;
use App\Livewire\Presentation;
use App\Livewire\ShowLyrics;
use Filament\Actions;
use Filament\Infolists\Components\KeyValueEntry;
use Filament\Infolists\Components\Livewire;
use Filament\Infolists\Components\RepeatableEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Infolist;
use Filament\Resources\Pages\ViewRecord;



class ViewSong extends ViewRecord
{
    protected static string $resource = SongResource::class;


    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }

    public function infolist(Infolist $infolist): Infolist
    {
        //dd($infolist->record);
        return $infolist
            ->schema([
                Livewire::make(ShowLyrics::class, ['record' => $infolist->record])->lazy(),
                Livewire::make(Presentation::class)->lazy(),

            ]);
    }
}
