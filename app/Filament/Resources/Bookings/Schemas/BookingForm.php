<?php

namespace App\Filament\Resources\Bookings\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class BookingForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('enquery_id')
                    ->required()
                    ->numeric(),
                DateTimePicker::make('checkin_date')
                    ->required(),
                DateTimePicker::make('checkout_date')
                    ->required(),
                TextInput::make('total_amount')
                    ->required()
                    ->numeric()
                    ->default(0),
                TextInput::make('paid_amount')
                    ->required()
                    ->numeric()
                    ->default(0),
                TextInput::make('remaining_amount')
                    ->required()
                    ->numeric()
                    ->default(0),
                Toggle::make('is_checkin')
                    ->required(),
                Toggle::make('is_checkout')
                    ->required(),
                TextInput::make('status')
                    ->required()
                    ->default('pending'),
            ]);
    }
}
