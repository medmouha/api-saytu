<?php

namespace App\Filament\Resources\ElevesResource\Pages;

use App\Filament\Resources\ElevesResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateEleves extends CreateRecord
{
    protected static string $resource = ElevesResource::class;

    protected function getCreatedNotificationTitle(): ?string
{
    return 'Eleves enregistres avec success';
}
}


