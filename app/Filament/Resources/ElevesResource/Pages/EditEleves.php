<?php

namespace App\Filament\Resources\ElevesResource\Pages;

use App\Filament\Resources\ElevesResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditEleves extends EditRecord
{
    protected static string $resource = ElevesResource::class;
    protected ?string $heading = 'Modifier eleve';

    protected function getSavedNotificationTitle(): ?string
{
    return 'Eleves Modier avec success';
}

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make()
            ->label('Supprimer'),
        ];
    }
}
