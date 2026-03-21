<?php

namespace App\Filament\Resources\Roomtypes\Pages;

use App\Filament\Resources\Roomtypes\RoomtypeResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewRoomtype extends ViewRecord
{
    protected static string $resource = RoomtypeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
