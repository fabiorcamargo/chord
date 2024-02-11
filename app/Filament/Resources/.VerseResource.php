<?php

namespace App\Filament\Resources;

use App\Filament\Clusters\BibleConfig;
use App\Filament\Resources\VerseResource\Pages;
use App\Filament\Resources\VerseResource\RelationManagers;
use App\Models\Verse;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\Action;
use Filament\Tables\Enums\FiltersLayout;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\View;

class VerseResource extends Resource
{
    protected static ?string $model = Verse::class;

    protected static ?string $slug = 'bible/verse';

    protected static ?string $recordTitleAttribute = 'name';

    protected static ?string $navigationGroup = 'Bíblia';

    protected static ?string $navigationIcon = 'heroicon-o-tag';

    protected static ?string $navigationParentItem = 'Livros';

    protected static ?string $navigationLabel = 'Versículos';

    protected static ?int $navigationSort = 1;

    public static function canCreate(): bool
    {
        return false;
    }

    public static function canEdit(Model $record): bool
    {
        return false;
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('version')
                    ->maxLength(10),
                Forms\Components\TextInput::make('testament')
                    ->numeric(),
                Forms\Components\TextInput::make('book')
                    ->numeric(),
                Forms\Components\TextInput::make('chapter')
                    ->numeric(),
                Forms\Components\TextInput::make('verse')
                    ->numeric(),
                Forms\Components\TextInput::make('text')
                    ->maxLength(75),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('version')
                    ->label('Versão')
                    ->searchable(),
                Tables\Columns\TextColumn::make('testaments.name')
                    ->label('Testamento')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('books.name')
                    ->label('Livro')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('chapter')
                    ->label('Capítulo')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('verse')
                    ->label('Versículo')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('text')
                    ->label('Texto')
                    ->html()
                    ->limit(50)
                    ->searchable(),
            ])

            ->filters([

            ], layout: FiltersLayout::AboveContent)
            ->actions([
                Tables\Actions\EditAction::make(),
                Action::make('show_slide')
                ->icon('heroicon-m-clipboard')
                ->requiresConfirmation()
                ->action(function (Verse $record) {
                    $record->show_slide();

                })
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    // Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }


    public static function getPages(): array
    {
        return [
            'index' => Pages\ListVerses::route('/'),
            'create' => Pages\CreateVerse::route('/create'),
            'view' => Pages\ViewVerse::route('/{record}'),
            'edit' => Pages\EditVerse::route('/{record}/edit'),
        ];
    }
}
