<?php

namespace App\Filament\Resources\Enqueries\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class EnqueryInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('name'),
                TextEntry::make('email')
                    ->label('Email address'),
                TextEntry::make('phone'),
                TextEntry::make('address'),
                TextEntry::make('message')
                    ->placeholder('-')
                    ->columnSpanFull(),
                TextEntry::make('checkin_date')
                    ->dateTime(),
                TextEntry::make('checkout_date')
                    ->dateTime(),
                TextEntry::make('roomtype_id')
                    ->numeric(),
                TextEntry::make('number_of_rooms')
                    ->numeric(),
                TextEntry::make('number_of_adults')
                    ->numeric(),
                TextEntry::make('number_of_children')
                    ->numeric(),
                TextEntry::make('status'),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }
}
