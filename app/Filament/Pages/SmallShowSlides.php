<?php

namespace App\Filament\Pages;

use App\Models\Slide;
use App\Models\SlideConfig;
use Filament\Pages\Page;
use Filament\Events\ServingFilament;


class SmallShowSlides extends Page
{
    public $table;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'livewire.list-products';

    protected static bool $shouldRegisterNavigation = false;

    protected static ?string $navigationLabel = 'LIVE';

    protected static ?int $navigationSort = 2;


}
