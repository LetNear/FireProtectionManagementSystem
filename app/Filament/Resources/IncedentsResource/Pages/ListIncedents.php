<?php

namespace App\Filament\Resources\IncedentsResource\Pages;

use App\Filament\Resources\IncedentsResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListIncedents extends ListRecords
{
    protected static string $resource = IncedentsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
