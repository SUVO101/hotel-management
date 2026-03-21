<?php

namespace App\Filament\Resources\Enqueries\Pages;

use App\Filament\Resources\Enqueries\EnqueryResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditEnquery extends EditRecord
{
    protected static string $resource = EnqueryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
