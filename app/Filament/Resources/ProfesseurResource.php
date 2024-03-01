<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProfesseurResource\Pages;
use App\Filament\Resources\ProfesseurResource\RelationManagers;
use App\Models\Professeur;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Support\Facades\Hash;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProfesseurResource extends Resource
{
    protected static ?string $model = Professeur::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('prenom')
                ->required()
                ->maxLength(255),
                TextInput::make('nom')
                ->required()
                ->maxLength(255),
                TextInput::make('email')
                ->label('Entrez Email')
                ->email()
                ->required()
                ->maxLength(255),
                TextInput::make('password')
                ->password()
                ->dehydrateStateUsing(fn ($state) => Hash::make($state)),
                TextInput::make('telephone')
                ->label('Numero de telephone')
                ->tel()
                ->required()
                ->maxLength(255),
                Forms\Components\Select::make('matieres_id')
                ->relationship('matieres', 'libelle')
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('prenom')
                ->searchable(),
                TextColumn::make('nom')
                ->searchable(),
                TextColumn::make('email')
                ->searchable(),
                TextColumn::make('telephone')
                ->searchable(),
                Tables\Columns\TextColumn::make('matieres.libelle')
                ->searchable(),
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
            'index' => Pages\ListProfesseurs::route('/'),
            'create' => Pages\CreateProfesseur::route('/create'),
            'edit' => Pages\EditProfesseur::route('/{record}/edit'),
        ];
    }
}
