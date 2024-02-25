<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ElevesResource\Pages;
use App\Filament\Resources\ElevesResource\RelationManagers;
use App\Models\Eleve;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\DatePicker;

class ElevesResource extends Resource
{
    protected static ?string $model = Eleve::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $modelLabel = 'Eleves';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                  Forms\Components\TextInput::make('prenom')->required(),
                  Forms\Components\TextInput::make('nom')->required(),
                  Forms\Components\TextInput::make('adresse')->required(),
                  Forms\Components\TextInput::make('matricule')->required(),
                  DatePicker::make('dateNaissance')
    ->native(false)
    ->displayFormat('d/m/Y'),
                  Forms\Components\TextInput::make('lieuNaissance')->required(),
                  Forms\Components\TextInput::make('classe_id')->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('prenom'),
                Tables\Columns\TextColumn::make('nom'),
                Tables\Columns\TextColumn::make('adresse'),
                Tables\Columns\TextColumn::make('adresse'),
                Tables\Columns\TextColumn::make('matricule'),
                Tables\Columns\TextColumn::make('dateNaissance'),
                Tables\Columns\TextColumn::make('lieuNaissance'),
                Tables\Columns\TextColumn::make('classe_id'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make()
                ->label('Modifier'),
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
            'index' => Pages\ListEleves::route('/'),
            'create' => Pages\CreateEleves::route('/create'),
            'edit' => Pages\EditEleves::route('/{record}/edit'),
        ];
    }
}
