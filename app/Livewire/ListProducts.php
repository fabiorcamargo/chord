<?php

namespace App\Livewire;

use App\Models\Shop\Product;
use App\Models\Slide;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class ListProducts extends Component implements HasForms, HasTable
{
    use InteractsWithTable;
    use InteractsWithForms;

    protected $listeners = ['echo:slide,SlideEvent' => 'teste'];

    public function table(Table $table): Table
    {
        return $table
            ->query(Slide::query())
            ->columns([
                TextColumn::make('id'),
            ])
            ->filters([
                // ...
            ])
            ->actions([
                // ...
            ])
            ->bulkActions([
                // ...
            ]);
    }

    public function teste(){
        dd('s');
    }


    public function render(): View
    {
        return view('livewire.list-products');
    }
}
