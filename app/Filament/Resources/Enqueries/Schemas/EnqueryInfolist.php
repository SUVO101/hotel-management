<?php

namespace App\Filament\Resources\Enqueries\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class EnqueryInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                 // 🔹 CUSTOMER INFO
        Section::make('Customer Info')
            ->schema([
                TextEntry::make('name')
                    ->weight('bold'),

                TextEntry::make('email')
                    ->label('Email'),

                TextEntry::make('phone'),

                TextEntry::make('address')->columnSpanFull(),

                TextEntry::make('message')
                    ->placeholder('-')
                    ->columnSpanFull(),
            ])
            ->columns(3)
            ->columnSpan(2),

        // 🔹 BOOKING DETAILS
        Section::make('Booking Details')
            ->schema([
                TextEntry::make('checkin_date')
                    ->label('Check-in')
                    ->dateTime(),

                TextEntry::make('checkout_date')
                    ->label('Check-out')
                    ->dateTime(),

                TextEntry::make('roomtype.name') // 👈 relation show
                    ->label('Room Type'),

                TextEntry::make('number_of_rooms')
                    ->label('Rooms'),

                TextEntry::make('number_of_adults')
                    ->label('Adults'),

                TextEntry::make('number_of_children')
                    ->label('Children'),
            ])
            ->columns(2)
            ->columnSpan(2),

        // 🔹 STATUS + META
        Section::make('Status & Info')
            ->schema([
                TextEntry::make('status')
                    ->badge(),

                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),

                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
            ])
            ->columns(3)
            ->columnSpanFull(),
            ])->columns(4);
    }
}
