<?php

namespace App\Filament\Resources\Enqueries\Pages;

use App\Filament\Resources\Enqueries\EnqueryResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use Filament\Schemas\Components\Tabs\Tab;

class ListEnqueries extends ListRecords
{
    protected static string $resource = EnqueryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }

    public function getTabs(): array
    {
        return [
            'all' =>    Tab::make('All'),
            'new' => Tab::make('New')
                ->modifyQueryUsing(fn ($query) => $query->where('status', 'new')),
            'read' => Tab::make('Read')
                ->modifyQueryUsing(fn ($query) => $query->where('status', 'read')),
            'contacted' => Tab::make('Contacted')
                ->modifyQueryUsing(fn ($query) => $query->where('status', 'contacted')),
            'replied' => Tab::make('Replied')
                ->modifyQueryUsing(fn ($query) => $query->where('status', 'replied')),
            'booked' => Tab::make('Booked')
                ->modifyQueryUsing(fn ($query) => $query->where('status', 'booked')),
            'cancelled' => Tab::make('Cancelled')
                ->modifyQueryUsing(fn ($query) => $query->where('status', 'cancelled')),
        ];
    }
}
