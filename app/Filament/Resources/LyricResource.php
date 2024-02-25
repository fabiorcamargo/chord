<?php

namespace App\Filament\Resources;

use App\Filament\Resources\LyricResource\Pages;
use App\Filament\Resources\LyricResource\RelationManagers;
use App\Filament\Resources\SongResource\RelationManagers\LyricRelationManager;
use App\Models\FontBank;
use App\Models\Lyric;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class LyricResource extends Resource
{
    protected static ?string $model = Lyric::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static bool $shouldRegisterNavigation = false;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('image_background_id'),
                Forms\Components\TextInput::make('video_background_id'),
                Forms\Components\TextInput::make('background_type')
                    ->required()
                    ->maxLength(255),

                Forms\Components\Select::make('Inserir')
                    ->options([
                        '1' => 'Frases',
                        '2' => 'Texto'
                    ])
                    ->live(),

                Forms\Components\Select::make('font_bank_id')
                    ->label('Fonte')
                    ->options(
                        FontBank::pluck('name', 'id')->toArray() // Substitua 'name' pelo nome do campo que contém o nome do vídeo
                    ),

                Forms\Components\Repeater::make('slide')
                    ->schema([
                        Forms\Components\TextInput::make('text')->required(),
                    ])
                    ->columnSpanFull()
                    ->visible(fn (Get $get): bool => $get('Inserir') === '1'),

                Forms\Components\RichEditor::make('slidetext')
                    ->visible(fn (Get $get): bool => $get('Inserir') === '2')
                    ->columnSpanFull(),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([

                Tables\Columns\TextColumn::make('image_background_id')

                    ->sortable(),
                Tables\Columns\TextColumn::make('video_background_id')

                    ->sortable(),
                Tables\Columns\TextColumn::make('background_type')
                    ->searchable(),
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
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListLyrics::route('/'),
            'create' => Pages\CreateLyric::route('/create'),
            'view' => Pages\ViewLyric::route('/{record}'),
            'edit' => Pages\EditLyric::route('/{record}/edit'),
        ];
    }
}
