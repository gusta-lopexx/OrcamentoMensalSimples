<?php

namespace App\Filament\Resources\ReceitasResource\Pages;

use App\Filament\Resources\ReceitasResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditReceitas extends EditRecord
{
    protected static string $resource = ReceitasResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
