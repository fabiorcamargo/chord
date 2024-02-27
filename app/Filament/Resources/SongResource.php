<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SongResource\Pages;
use App\Filament\Resources\SongResource\RelationManagers;
use App\Filament\Resources\SongResource\RelationManagers\LyricRelationManager;
use App\Models\Category;
use App\Models\ImageBank;
use App\Models\Song;
use App\Models\Tag;
use App\Models\VideoBank;
use Filament\Actions\CreateAction;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SongResource extends Resource
{
    protected static ?string $model = Song::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Musicas';

    protected static ?string $navigationLabel = 'Músicas';

    protected static ?string $slug = "musicas";

    protected static ?string $label = "Músicas";

    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Select::make('category_id')
                    ->label('Categoria')
                    ->options(Category::all()->pluck('name', 'id'))
                    ->searchable()
                    ->preload(),

                // Forms\Components\Select::make('image_id')
                //     ->label('Imagem')
                //     ->options(ImageBank::all()->pluck('name', 'id'))
                //     ->searchable()
                //     ->preload()
                //     ,
                // Forms\Components\Select::make('video_id')
                //     ->label('Vídeo')
                //     ->options(VideoBank::all()->pluck('name', 'id'))
                //     ->searchable()
                //     ->preload(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([

                Tables\Columns\TextColumn::make('name')
                    ->label('Nome')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('Category.name')
                    ->label('Categoria')
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('name', 'asc');;
    }

    public static function getRelations(): array
    {
        return [
            LyricRelationManager::class
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSongs::route('/'),
            'create' => Pages\CreateSong::route('/create'),
            'view' => Pages\ViewSong::route('/{record}'),
            'edit' => Pages\EditSong::route('/{record}/edit'),
        ];
    }
}
