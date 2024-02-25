<?php

namespace App\Filament\Resources\ElevesResource\Pages;

use App\Filament\Resources\ElevesResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListEleves extends ListRecords
{
    protected static string $resource = ElevesResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
            ->label('Ajouter un nouveau eleve'),
        ];
    }
}
