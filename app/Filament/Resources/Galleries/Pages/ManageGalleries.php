<?php

namespace App\Filament\Resources\Galleries\Pages;

use App\Filament\Resources\Galleries\GalleryResource;
use App\Models\Gallery;
use App\Models\Roomtype;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ManageRecords;
use Filament\Schemas\Components\Tabs\Tab;
use Str;

class ManageGalleries extends ManageRecords
{
    protected static string $resource = GalleryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
    public function getTabs(): array
{
    $tabs = [
        'all' => Tab::make('All')->badge(Gallery::query()->count()),
    ];

    foreach (Roomtype::all() as $roomtype) {
        $tabs[$roomtype->id] = Tab::make($roomtype->name)->badge(Gallery::query()->where('roomtype_id', $roomtype->id)->count())
            ->modifyQueryUsing(fn ($query) =>
                $query->where('roomtype_id', $roomtype->id)
            );
    }

    return $tabs;
}
}
