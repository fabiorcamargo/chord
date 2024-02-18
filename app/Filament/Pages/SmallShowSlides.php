<?php

namespace App\Filament\Pages;

use App\Models\Slide;
use App\Models\SlideConfig;
use Filament\Pages\Page;


class SmallShowSlides extends Page
{
    public $config;
    public $slide;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.pages.small-show-slides';

    protected static bool $shouldRegisterNavigation = false;

    protected static ?string $navigationGroup = 'Projetar';

    protected static ?string $navigationLabel = 'LIVE';

    protected static ?int $navigationSort = 2;


}
