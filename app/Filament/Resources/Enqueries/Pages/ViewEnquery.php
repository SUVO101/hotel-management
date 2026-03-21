<?php

namespace App\Filament\Resources\Enqueries\Pages;

use App\Filament\Resources\Enqueries\EnqueryResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewEnquery extends ViewRecord
{
    protected static string $resource = EnqueryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
