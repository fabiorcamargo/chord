<?php

namespace App\Filament\Resources\SongResource\RelationManagers;

use App\Models\FontBank;
use App\Models\ImageBank;
use App\Models\Lyric;
use App\Models\VideoBank;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class LyricRelationManager extends RelationManager
{
    protected static string $relationship = 'Lyric';

    protected $listeners = ['SlideEvent' => 'teste'];
    public function teste()
    {
        return redirect(request()->header('Referer'));
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('image_background_id')
                    ->label('Imagem')
                    ->options(
                        ImageBank::pluck('name', 'id')->toArray() // Substitua 'name' pelo nome do campo que contém o nome da imagem
                    )
                    ->label('Select Image'),
                Forms\Components\Select::make('video_background_id')
                    ->label('Vídeo')
                    ->options(
                        VideoBank::pluck('name', 'id')->toArray() // Substitua 'name' pelo nome do campo que contém o nome do vídeo
                    )
                    ->label('Select Video'),
                Forms\Components\Select::make('background_type')
                    ->label('Tipo do Fundo')
                    ->options(
                        [
                            'image' => 'Imagem',
                            'video' => 'Vídeo'
                        ]
                    )
                    ->required(),
                Forms\Components\Select::make('font_bank_id')
                    ->label('Fonte')
                    ->options(
                        FontBank::pluck('name', 'id')->toArray() // Substitua 'name' pelo nome do campo que contém o nome do vídeo
                    ),

                Forms\Components\Select::make('Inserir')
                    ->label('Inserir Letra')
                    ->options([
                        '1' => 'Frases',
                        '2' => 'Texto'
                    ])
                    ->live(),

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

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('Musica')
            ->columns([
                Tables\Columns\TextColumn::make('id'),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
                //Tables\Actions\ViewAction::make()
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
