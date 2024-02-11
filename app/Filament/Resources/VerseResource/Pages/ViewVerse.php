<?php

namespace App\Filament\Resources\VerseResource\Pages;



use App\Filament\Resources\VerseResource;
use App\Livewire\Presentation;
use App\Models\Verse;
use Filament\Actions;
use Filament\Infolists\Components\Actions\Action;
use Filament\Infolists\Components\Livewire;
use Filament\Infolists\Components\Section;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Infolist;
use Filament\Resources\Pages\ViewRecord;


class ViewVerse extends ViewRecord
{
    protected static string $resource = VerseResource::class;

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
                Livewire::make(Presentation::class)->lazy(),
                Section::make('Texto')
                    ->columns(2)
                    ->schema([
                        TextEntry::make('text')->html()->columns(1)->label(''),
                        TextEntry::make('complete')->label(''),


                    ])

            ]);
    }
}
