<?php

namespace App\Filament\Resources;

use App\Filament\Resources\VideoBankResource\Pages;
use App\Models\VideoBank;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;


class VideoBankResource extends Resource
{
    protected static ?string $model = VideoBank::class;

    protected static ?string $navigationIcon = 'heroicon-o-video-camera';

    protected static ?string $slug = 'bible/video';

    protected static ?string $recordTitleAttribute = 'name';

    protected static ?string $navigationGroup = 'Configurações';

    // protected static ?string $navigationParentItem = 'Livros';

    protected static ?string $navigationLabel = 'Vídeos';

    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name'),
                FileUpload::make('path')
                    ->moveFiles()
                    ->maxSize(20000)
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('path')
                    ->label('Arquivo')
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
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListVideoBanks::route('/'),
            'create' => Pages\CreateVideoBank::route('/create'),
            'view' => Pages\ViewVideoBank::route('/{record}'),
            'edit' => Pages\EditVideoBank::route('/{record}/edit'),
        ];
    }
}
