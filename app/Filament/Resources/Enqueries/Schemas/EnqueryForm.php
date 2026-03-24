<?php

namespace App\Filament\Resources\Enqueries\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class EnqueryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required(),
                TextInput::make('email')
                    ->label('Email address')
                    ->email()
                    ->required(),
                TextInput::make('phone')
                    ->tel()
                    ->required(),
                TextInput::make('address')
                    ->required(),
                Textarea::make('message')
                    ->columnSpanFull(),
                DateTimePicker::make('checkin_date')
                    ->required(),
                DateTimePicker::make('checkout_date')
                    ->required(),
                Select::make('roomtype_id')
                ->relationship('roomtype','name')
                ->native(false)
                    ->required(),
                TextInput::make('number_of_rooms')
                    ->required()
                    ->numeric()
                    ->default(1),
                TextInput::make('number_of_adults')
                    ->required()
                    ->numeric()
                    ->default(1),
                TextInput::make('number_of_children')
                    ->required()
                    ->numeric()
                    ->default(0),
                TextInput::make('status')
                    ->required()
                    ->default('new'),
            ]);
    }
}
