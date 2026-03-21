<?php

namespace App\Filament\Resources\Bookings\Schemas;

use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class BookingInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('enquery_id')
                    ->numeric(),
                TextEntry::make('checkin_date')
                    ->dateTime(),
                TextEntry::make('checkout_date')
                    ->dateTime(),
                TextEntry::make('total_amount')
                    ->numeric(),
                TextEntry::make('paid_amount')
                    ->numeric(),
                TextEntry::make('remaining_amount')
                    ->numeric(),
                IconEntry::make('is_checkin')
                    ->boolean(),
                IconEntry::make('is_checkout')
                    ->boolean(),
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
