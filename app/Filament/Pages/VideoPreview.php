<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;

class VideoPreview extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.pages.video-preview';

    protected static bool $shouldRegisterNavigation = false;


}
