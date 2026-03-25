<?php

namespace App\Filament\Resources\Bookings\Schemas;

use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class BookingInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                 // 🔹 CUSTOMER / ENQUIRY INFO
        Section::make('Customer Info')
            ->schema([
                TextEntry::make('enquery.name')
                ->copyable()
                    ->label('Name')
                    ->weight('bold'),

                TextEntry::make('enquery.email')
                ->copyable()
                    ->label('Email'),

                TextEntry::make('enquery.phone')
                ->copyable()
                    ->label('Phone'),

                TextEntry::make('enquery.roomtype.name')
                ->badge()->color('info')
                    ->label('Room Type'),
                
                TextEntry::make('checkin_date')
                    ->label('Check-in')
                    ->icon('heroicon-o-calendar')
                    ->badge()
                    ->color('success')
                    ->date(),

                TextEntry::make('checkout_date')
                    ->label('Check-out')
                    ->icon('heroicon-o-calendar')
                    ->badge()
                    ->color('danger')
                    ->date(),

                TextEntry::make('enquery.number_of_rooms')
                    ->label('Rooms')->badge(),

                TextEntry::make('enquery.number_of_adults')
                    ->label('Adults')->badge()->color('success'),

                TextEntry::make('enquery.number_of_children')
                    ->label('Children')->badge()->color('warning'),
            ])
            ->columns(3)
            ->columnSpan(2),


            // 🔹 PAYMENT INFO
        Section::make('Payment Info')
            ->schema([
                TextEntry::make('total_amount')
                ->color('primary')
                    ->money('INR'),

                TextEntry::make('paid_amount')
                ->color('success')
                    ->money('INR'),

                TextEntry::make('remaining_amount')
                    ->money('INR')
                    ->color(fn ($state) => $state > 0 ? 'danger' : 'success'),

                TextEntry::make('status')
                    ->badge()
                    ->color(fn ($state) => match ($state) {
                        'paid' => 'success',
                        'pending' => 'warning',
                        default => 'gray',
                    }),
            ])
            ->columns(1)
            ->columnSpan(1),

         // 🔹 ROOM INFO
        Section::make('Allocated Rooms')
            ->schema([
                TextEntry::make('rooms.room_number')
                    ->badge()
                    ->icon('heroicon-o-home')
                    ->separator(', ')
                    ->label('Allocated Room No'),
            ])
            ->columnSpan(1),

        // 🔹 BOOKING DETAILS
        Section::make('Booking Status')
            ->schema([
                IconEntry::make('is_checkin')
                    ->label('Check In')
                    ->boolean(),

                IconEntry::make('is_checkout')
                    ->label('Check Out')
                    ->boolean(),
                TextEntry::make('updated_at')
                    ->since()
                    ->placeholder('-'),
                TextEntry::make('created_at')
                    ->since()
                    ->placeholder('-'),
            ])
            ->columns(4)
            ->columnSpan(2),

        

       

       
            ])->columns(3);
    }
}
