<?php

namespace App\Filament\Resources\VerseResource\Pages;

use App\Filament\Resources\VerseResource;
use App\Livewire\Presentation;
use Filament\Actions;
use Filament\Infolists\Components\Livewire;
use Filament\Infolists\Infolist;
use Filament\Resources\Pages\ListRecords;

class ListVerses extends ListRecords
{
    protected static string $resource = VerseResource::class;

}
