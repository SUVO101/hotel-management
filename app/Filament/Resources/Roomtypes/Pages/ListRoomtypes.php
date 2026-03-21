<?php

namespace App\Filament\Resources\Roomtypes\Pages;

use App\Filament\Resources\Roomtypes\RoomtypeResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListRoomtypes extends ListRecords
{
    protected static string $resource = RoomtypeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
