<?php

namespace App\Filament\Widgets;

use App\Models\Classe;
use App\Models\Eleve;
use App\Models\Matiere;
use App\Models\Professeur;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Eleves', Eleve::query()->count())
            ->description('Nombre eleves inscrits'),

            Stat::make('Professeurs', Professeur::query()->count())
            ->description('Nombre professeurs enregistres'),

            Stat::make('Classes', Classe::query()->count())
            ->description('Nombre classes '),

            Stat::make('Matieres', Matiere::query()->count())
            ->description('Nombre matieres ')
        ];
    }
}
