<?php

namespace App\Filament\Pages;

use App\Models\Slide;
use Filament\Pages\Page;
use Filament\Support\Enums\MaxWidth;
use Livewire\Attributes\On;

class ShowSlides extends Page
{
    public $slide = [];

    protected static ?string $navigationIcon = 'heroicon-s-play-circle';


    protected static string $view = 'filament.pages.show-slides';


    protected static bool $shouldRegisterNavigation = true;

    protected static ?string $navigationGroup = 'Projetar';

    protected static ?string $navigationLabel = 'LIVE';

    protected static ?int $navigationSort = 2;



    public function mount()
    {

        // Dispara a abertura do modal quando o componente for montado
        $this->dispatch('open-modal');


    }

}
