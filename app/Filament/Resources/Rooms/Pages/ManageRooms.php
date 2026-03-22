<?php

namespace App\Filament\Resources\Rooms\Pages;

use App\Filament\Resources\Rooms\RoomResource;
use App\Models\Room;
use App\Models\Roomtype;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ManageRecords;
use Filament\Schemas\Components\Tabs\Tab;
use Str;

class ManageRooms extends ManageRecords
{
    protected static string $resource = RoomResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }

//         public function getTabs(): array
// {
//     return [
//         'all' => Tab::make('All'),

//         'available' => Tab::make('Available')
//             ->modifyQueryUsing(fn ($query) => $query->where('status', 'available')),

//         'occupied' => Tab::make('Occupied')
//             ->modifyQueryUsing(fn ($query) => $query->where('status', 'occupied')),

//         'maintenance' => Tab::make('Maintenance')
//             ->modifyQueryUsing(fn ($query) => $query->where('status', 'maintenance')),
//     ];
// }
public function getTabs(): array
{
    $tabs = [
        'all' => Tab::make('All')->badge(Room::query()->count()),
        'available' => Tab::make('Available')->badge(Room::query()->where('status', 'available')->count())
            ->modifyQueryUsing(fn ($query) => $query->where('status', 'available')),

        'occupied' => Tab::make('Occupied')->badge(Room::query()->where('status', 'occupied')->count())
            ->modifyQueryUsing(fn ($query) => $query->where('status', 'occupied')),

        'maintenance' => Tab::make('Maintenance')->badge(Room::query()->where('status', 'maintenance')->count())
            ->modifyQueryUsing(fn ($query) => $query->where('status', 'maintenance')),
    ];

    foreach (Roomtype::all() as $roomtype) {
        $tabs[$roomtype->id] = Tab::make(Str::words($roomtype->name,1))->badge(Room::query()->where('roomtype_id', $roomtype->id)->count())
            ->modifyQueryUsing(fn ($query) =>
                $query->where('roomtype_id', $roomtype->id)
            );
    }

    return $tabs;
}
}
