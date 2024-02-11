<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FontBankResource\Pages;
use App\Filament\Resources\FontBankResource\RelationManagers;
use App\Models\FontBank;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\FontProviders\GoogleFontProvider;
use Filament\Support\Assets\Js;
use Filament\Support\Facades\FilamentAsset;
use Filament\Tables\Actions\Action;

class FontBankResource extends Resource
{
    protected static ?string $model = FontBank::class;

    protected static ?string $slug = 'bible/font';

    protected static ?string $recordTitleAttribute = 'name';

    protected static ?string $navigationGroup = 'Bíblia';

    protected static ?string $navigationIcon = 'heroicon-o-tag';

    protected static ?string $navigationParentItem = 'Livros';

    protected static ?string $navigationLabel = 'Fontes';

    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->maxLength(255)
                    ->label('Nome')
            ]);
    }

    public static function table(Table $table): Table
    {

        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('Nome')
                    ->searchable(),
                Tables\Columns\TextColumn::make('fontshow')
                    ->label('Exibição')
                    ->searchable()
                    ->html(),
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
                Tables\Actions\EditAction::make(),
                    Action::make('Fundo Bíblia')
                    ->icon('heroicon-m-clipboard')
                    ->requiresConfirmation()
                    ->action(function (FontBank $font) {
                        $font->set_font($font);
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
            'index' => Pages\ListFontBanks::route('/'),
            'create' => Pages\CreateFontBank::route('/create'),
            'edit' => Pages\EditFontBank::route('/{record}/edit'),
        ];
    }
}
