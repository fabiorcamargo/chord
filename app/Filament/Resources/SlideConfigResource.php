<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SlideConfigResource\Pages;
use App\Filament\Resources\SlideConfigResource\RelationManagers;
use App\Models\FontBank;
use App\Models\ImageBank;
use App\Models\SlideConfig;
use App\Models\VideoBank;
use Filament\Forms;
use Filament\Forms\Components\ColorPicker;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ColorColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SlideConfigResource extends Resource
{
    protected static ?string $model = SlideConfig::class;

    protected static ?string $navigationGroup = 'Configurações';

    protected static ?string $navigationIcon = 'heroicon-m-adjustments-horizontal';

    protected static ?string $label = 'Configurações';

    protected static ?int $navigationSort = 7;




    public static function canCreate(): bool
    {
        return false;
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                ColorPicker::make('content.bg_color')
                    ->rgba()
                    ->label('Vinheta Fundo'),

                Forms\Components\Select::make('content.type')
                    ->options([
                        'image' => 'Imagem',
                        'video' => 'Vídeo'
                    ])
                    ->label('Tipo de Fundo'),

                Forms\Components\Select::make('content.image_background')
                    ->label('Imagem')
                    ->options(
                        ImageBank::pluck('name', 'id')->toArray() // Substitua 'name' pelo nome do campo que contém o nome da imagem
                    ),
                Forms\Components\Select::make('content.video_background')
                    ->label('Vídeo')
                    ->options(
                        VideoBank::pluck('name', 'id')->toArray() // Substitua 'name' pelo nome do campo que contém o nome do vídeo
                    ),
                Forms\Components\Select::make('content.font_size')
                    ->options([
                        '3' => '3',
                        '4' => '4',
                        '5' => '5',
                        '6' => '6',
                        '7' => '7',
                        '8' => '8',
                    ])
                    ->label('Tamanho da Fonte'),

                Forms\Components\Select::make('content.font_type')
                    ->label('Fonte')
                    ->options(
                        FontBank::pluck('name', 'id')->toArray() // Substitua 'name' pelo nome do campo que contém o nome do vídeo
                    ),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ColorColumn::make('content.bg_color')
                    ->label('Cor Fundo'),
            ])
            ->filters([
                //
            ])
            ->actions([
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
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSlideConfigs::route('/'),
            //'create' => Pages\CreateSlideConfig::route('/create'),
            'edit' => Pages\EditSlideConfig::route('/{record}/edit'),
        ];
    }
}
