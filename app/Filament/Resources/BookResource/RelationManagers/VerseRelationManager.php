<?php

namespace App\Filament\Resources\BookResource\RelationManagers;

use App\Models\Verse;
use Filament\Forms;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Infolist;
use Filament\Notifications\Notification;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Actions\Action;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Columns\Column;
use Filament\Tables\Enums\FiltersLayout;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class StatusSwitcher extends Column
{
    protected string $view = 'filament.tables.columns.status-switcher';
}

class VerseRelationManager extends RelationManager
{
    protected static string $relationship = 'verse';


    protected $listeners = ['SlideEvent' => 'teste'];
    public function teste(){
        return redirect(request()->header('Referer'));
    }


    public function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('chapter')->label('Capítulo')
                    ->searchable(isIndividual: true, isGlobal: false),
                Tables\Columns\TextColumn::make('verse')->label('Versículo')
                    ->searchable(isIndividual: true, isGlobal: false),
                Tables\Columns\TextColumn::make('versions.name')->label('Versão'),
                Tables\Columns\TextColumn::make('text')->limit(50)->html()->label('Texto')
                    ->searchable(isIndividual: true, isGlobal: false),
            ])
            ->filters([

                SelectFilter::make('Versão')
                    ->relationship('versions', 'name')
                    ->searchable()
                    ->preload()
            ])
            ->headerActions([
                //Tables\Actions\CreateAction::make(),

            ])
            ->actions([
                //Tables\Actions\EditAction::make(),
                //Tables\Actions\DeleteAction::make(),
                //Tables\Actions\ViewAction::make('view'),
                Action::make('Apresentar')
                    ->icon('heroicon-m-clipboard')
                    ->requiresConfirmation()

                    ->action(function (Verse $record, \Livewire\Component $livewire) {
                        $record->show_slide('bible', $record->text, $record, $record->id);
                        $livewire->dispatch('SlideEvent');

                    })


            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    //Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->searchOnBlur();
    }


    public static function getPages(): array
    {
        return [
            //'view' => Pages\ViewVerse::route('/{record}'),
        ];
    }
}
