<?php

namespace App\Filament\Resources\SongResource\Pages;

use App\Filament\Resources\SongResource;
use App\Models\Category;
use App\Models\FontBank;
use App\Models\ImageBank;
use App\Models\VideoBank;
use Filament\Actions;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Wizard;
use Filament\Forms\Components\Wizard\Step;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Notifications\Actions\Action;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;
use Filament\Resources\Pages\CreateRecord\Concerns\HasWizard;

class CreateSong extends CreateRecord
{
    use HasWizard;
    protected static string $resource = SongResource::class;



    public function form(Form $form): Form
    {
        return parent::form($form)
            ->schema([
                Wizard::make($this->getSteps())
                    ->startOnStep($this->getStartStep())
                    ->cancelAction($this->getCancelFormAction())
                    ->submitAction($this->getSubmitFormAction())
                    ->skippable($this->hasSkippableSteps())
                    ->contained(false),
            ])
            ->columns(null);
    }


    protected function getSteps(): array
    {
        return [
            Step::make('Música')
                ->schema([
                    Section::make([
                    TextInput::make('name')
                        ->required()
                        ->maxLength(255),
                    Select::make('category_id')
                        ->label('Categoria')
                        ->placeholder('Escolha uma Categoria')
                        ->options(Category::all()->pluck('name', 'id'))
                        ->searchable()
                        ->preload()
                        ->required(),
                    ])->columns(2)
                ]),

            Step::make('Letra')
                ->schema([
                    Group::make([
                        Section::make([

                        Select::make('image_background_id')
                            ->label('Imagem')
                            ->options(
                                ImageBank::pluck('name', 'id')->toArray() // Substitua 'name' pelo nome do campo que contém o nome da imagem
                            )
                            ->placeholder('Escolha uma imagem')
                            ->required(),
                        Select::make('video_background_id')
                            ->label('Vídeo')
                            ->options(
                                VideoBank::pluck('name', 'id')->toArray() // Substitua 'name' pelo nome do campo que contém o nome do vídeo
                            )
                            ->placeholder('Escolha um Vídeo')
                            ->required(),
                        Select::make('background_type')
                            ->label('Tipo do Fundo')
                            ->placeholder('Escolha o Tipo')
                            ->options(
                                [
                                    'image' => 'Imagem',
                                    'video' => 'Vídeo'
                                ]
                            )
                            ->required(),
                        Select::make('font_bank_id')
                            ->label('Fonte')
                            ->placeholder('Escolha uma Fonte')
                            ->options(
                                FontBank::pluck('name', 'id')->toArray() // Substitua 'name' pelo nome do campo que contém o nome do vídeo
                            )
                            ->required(),

                        Select::make('Inserir')
                            ->label('Inserir Letra')
                            ->placeholder('Qual formato')
                            ->options([
                                '1' => 'Frases',
                                '2' => 'Texto'
                            ])
                            ->live(),

                        Repeater::make('slide')
                            ->schema([
                                TextInput::make('text')->required(),
                            ])
                            ->columnSpanFull()
                            ->visible(fn (Get $get): bool => $get('Inserir') === '1'),

                        RichEditor::make('slidetext')
                            ->visible(fn (Get $get): bool => $get('Inserir') === '2')
                            ->columnSpanFull()
                            ])->columns(2),
                    ])
                        ->relationship('Lyric')

                ]),

        ];
    }

    protected function handleRegistration(array $data)
    {
        dd($data);
    }
}
