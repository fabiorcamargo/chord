<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ImageBankResource\Pages;
use App\Filament\Resources\ImageBankResource\RelationManagers;
use App\Models\ImageBank;
use Filament\Forms;
use Filament\Forms\Components\ColorPicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\Action;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\View;

class ImageBankResource extends Resource
{
    protected static ?string $model = ImageBank::class;

    protected static ?string $slug = 'bible/image';

    protected static ?string $recordTitleAttribute = 'name';

    protected static ?string $navigationGroup = 'Configurações';

    protected static ?string $navigationIcon = 'heroicon-o-photo';

    // protected static ?string $navigationParentItem = 'Configurações';

    protected static ?string $navigationLabel = 'Imagens';

    protected static ?int $navigationSort = 2;


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name'),
                FileUpload::make('path')
                    ->image()
                    ->imageEditor()
                    ->moveFiles()
                    ->maxSize(1024)
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
        ->columns([
            Tables\Columns\TextColumn::make('name'),
            Tables\Columns\ImageColumn::make('path'),
        ])
        ->filters([
            //
        ])
        ->actions([
            Tables\Actions\EditAction::make(),
                Action::make('Fundo Bíblia')
                ->icon('heroicon-m-clipboard')
                ->requiresConfirmation()
                ->action(function (ImageBank $record) {
                    $record->set_background($record);
                }),

                Action::make('Projetar')
                ->icon('heroicon-m-clipboard')
                ->requiresConfirmation()
                ->action(function (ImageBank $record) {
                    $record->send_show($record);
                })
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
            'index' => Pages\ListImageBanks::route('/'),
            'create' => Pages\CreateImageBank::route('/create'),
            'view' => Pages\ViewImageBank::route('/{record}'),
            'edit' => Pages\EditImageBank::route('/{record}/edit'),
        ];
    }
}
