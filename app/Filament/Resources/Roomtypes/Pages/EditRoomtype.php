<?php

namespace App\Filament\Resources\Roomtypes\Pages;

use App\Filament\Resources\Roomtypes\RoomtypeResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditRoomtype extends EditRecord
{
    protected static string $resource = RoomtypeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
