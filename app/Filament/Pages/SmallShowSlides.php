<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;

class SmallShowSlides extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.pages.small-show-slides';

    protected static bool $shouldRegisterNavigation = false;

    protected static ?string $navigationGroup = 'Projetar';

    protected static ?string $navigationLabel = 'LIVE';

    protected static ?int $navigationSort = 2;

}
