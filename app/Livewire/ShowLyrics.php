<?php

namespace App\Livewire;

use App\Filament\Pages\ShowSlides;
use App\Models\Lyric;
use Filament\Actions\Action as ActionsAction;
use Filament\Actions\Concerns\InteractsWithActions;
use Filament\Actions\Contracts\HasActions;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Infolists\Components\Actions\Action;
use Filament\Infolists\Components\RepeatableEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Concerns\InteractsWithInfolists;
use Filament\Infolists\Contracts\HasInfolists;
use Filament\Infolists\Infolist;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
use Livewire\Component;
use Livewire\Attributes\On;

class ShowLyrics extends Component implements HasForms, HasInfolists, HasActions
{
    use InteractsWithInfolists;
    use InteractsWithForms;
    use InteractsWithActions;

    public $record;
    public $key;

    public function ShowSlide($key)
    {
        $slide_array = $this->record->Lyric->slide;
        if(isset($slide_array[$key])) {
            $this->record->Lyric->show_slide('lyric', $slide_array[$key]['text'], $this->record->Lyric->id, $key);
        } else {

            echo "A posição não existe neste array.";
        }
        $this->key = $key;
    }

    public function render()
    {
        return view('livewire.show-lyrics');
    }
}
