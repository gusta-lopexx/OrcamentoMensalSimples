<?php

namespace App\Filament\Resources\DespesasResource\Pages;

use App\Filament\Resources\DespesasResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditDespesas extends EditRecord
{
    protected static string $resource = DespesasResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
