<?php

namespace App\Livewire;

use App\Filament\Pages\ShowSlides;
use App\Models\Lyric;
use App\Models\Slide;
use App\Models\Verse;
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
    public $key_a;
    public $font_size;



    public function ShowSlide($key)
    {
        //dd($this->record->Lyric);

        $slide_array = $this->record->Lyric->slide;

        if(isset($slide_array[$key])) {
            $this->record->Lyric->show_slide('lyric', $slide_array[$key]['text'], $this->record->Lyric, $key);
        } else {

            echo "A posição não existe neste array.";
        }
        $this->key = $key;

        $this->dispatch('slide-send', ['record' => $this->record])->to(Presentation::class);
        //return redirect(request()->header('Referer'));

    }


    public function render()
    {
        $key_a = Slide::first();
        $this->key_a = json_decode($key_a->content);
        return view('livewire.show-lyrics');
    }

    #[On('slide-send')]
    public function atualiza(){
        $key_a = Slide::first();
        $this->key_a = json_decode($key_a->content)->key;
    }

    #[On('font-change')]
    public function font($data){

        $this->font_size = $data['font_size'];

    }
}
