<?php

namespace App\Filament\Resources\Enqueries\Pages;

use App\Filament\Resources\Enqueries\EnqueryResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListEnqueries extends ListRecords
{
    protected static string $resource = EnqueryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
