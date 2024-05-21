<?php

namespace App\Filament\Resources\IncedentsResource\Pages;

use App\Filament\Resources\IncedentsResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditIncedents extends EditRecord
{
    protected static string $resource = IncedentsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
