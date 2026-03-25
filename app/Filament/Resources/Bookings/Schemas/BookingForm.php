<?php

namespace App\Filament\Resources\Bookings\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\SelectColumn;

class BookingForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                // TextInput::make('enquery_id')
                //     ->required()
                //     ->numeric(),
                // DateTimePicker::make('checkin_date')
                //     ->required(),
                // DateTimePicker::make('checkout_date')
                //     ->required(),
                // TextInput::make('total_amount')
                //     ->required()
                //     ->numeric()
                //     ->default(0),
                // TextInput::make('paid_amount')
                //     ->required()
                //     ->numeric()
                //     ->default(0),
                // TextInput::make('remaining_amount')
                //     ->required()
                //     ->numeric()
                //     ->default(0),
                // Toggle::make('is_checkin')
                //     ->required(),
                // Toggle::make('is_checkout')
                //     ->required(),
                // TextInput::make('status')
                //     ->required()
                //     ->default('pending'),
                Section::make('Booking Info')
                    ->schema([
                        TextInput::make('enquery_id')
                            ->required()
                            ->readOnly()
                            ->numeric(),

                //------------------------extra information show from enquery table------only show not store------------------
                        TextInput::make('enquery_name')
                            ->disabled()
                            ->dehydrated(false)
                            ->afterStateHydrated(function ($set, $get) {
                                $id = $get('enquery_id');

                                if ($id) {
                                    $set('enquery_name', \App\Models\Enquery::find($id)?->name);
                                }
                            }),

                        TextInput::make('enquery_email')
                            ->disabled()
                            ->dehydrated(false)
                            ->afterStateHydrated(function ($set, $get) {
                                $id = $get('enquery_id');

                                if ($id) {
                                    $set('enquery_email', \App\Models\Enquery::find($id)?->email);
                                }
                            }),

                        TextInput::make('enquery_phone')
                            ->disabled()
                            ->dehydrated(false)
                            ->afterStateHydrated(function ($set, $get) {
                                $id = $get('enquery_id');

                                if ($id) {
                                    $set('enquery_phone', \App\Models\Enquery::find($id)?->phone);
                                }
                            }),

                        Textarea::make('enquery_roomtype')
                            ->disabled()
                            ->dehydrated(false)
                            ->afterStateHydrated(function ($set, $get) {
                                $id = $get('enquery_id');

                                if ($id) {
                                    $set('enquery_roomtype', \App\Models\Enquery::find($id)?->roomtype->name);
                                }
                            }),

                        TextInput::make('enquery_rooms')
                            ->disabled()
                            ->label('Number of Rooms')
                            ->dehydrated(false)
                            ->afterStateHydrated(function ($set, $get) {
                                $id = $get('enquery_id');

                                if ($id) {
                                    $set('enquery_rooms', \App\Models\Enquery::find($id)?->number_of_rooms);
                                }
                            }),

                        TextInput::make('enquery_adults')
                            ->disabled()
                            ->label('Number of Adults')
                            ->dehydrated(false)
                            ->afterStateHydrated(function ($set, $get) {
                                $id = $get('enquery_id');

                                if ($id) {
                                    $set('enquery_adults', \App\Models\Enquery::find($id)?->number_of_adults);
                                }
                            }),

                        TextInput::make('enquery_children')
                            ->disabled()
                            ->label('Number of Children')
                            ->dehydrated(false)
                            ->afterStateHydrated(function ($set, $get) {
                                $id = $get('enquery_id');

                                if ($id) {
                                    $set('enquery_children', \App\Models\Enquery::find($id)?->number_of_children);
                                }
                            }),

                     //------------------------extra information show from enquery table------------------------

                        DateTimePicker::make('checkin_date')
                            ->required(),

                        DateTimePicker::make('checkout_date')
                            ->required(),
                    ])
                    ->columns(4)->columnSpan(3),

                Section::make('Payment Details')
                    ->schema([
                        TextInput::make('total_amount')
                            ->prefix('₹')
                            ->default(0)
                            ->dehydrateStateUsing(fn($state) => str_replace(',', '', $state)),

                        TextInput::make('paid_amount')
                        ->live(onBlur:true)
    ->afterStateUpdated(function ($state, callable $get, callable $set) {

        $total = (float) str_replace(',', '', $get('total_amount') ?? 0);
        $paid = (float) $state;

        $set('remaining_amount', $total - $paid);
    })
                            ->numeric()
                            ->default(0),

                        TextInput::make('remaining_amount')
                            ->numeric()
                            ->default(0),
                    ])
                    ->columns(1)->columnSpan(1),

                Section::make('Room Allocation')
                    ->schema([
                        Select::make('rooms')
                            ->label('Select Rooms')
                            ->relationship('rooms', 'room_number')
                            ->multiple()
                            ->preload()
                            ->options(function (callable $get) {

                                $enqueryId = $get('enquery_id');

                                if (!$enqueryId)
                                    return [];

                                $enquery = \App\Models\Enquery::find($enqueryId);

                                if (!$enquery)
                                    return [];

                                return \App\Models\Room::where('roomtype_id', $enquery->roomtype_id)
                                    ->where('status', 'available')
                                    ->pluck('room_number', 'id');
                            })
                            ->searchable(),
                    ])
                    ->columnSpan(3),

                Section::make('Status')
                    ->schema([
                        Toggle::make('is_checkin')->label('Check In'),
                        Toggle::make('is_checkout')->label('Check Out'),

                        SelectColumn::make('status')->label('Payment Status')
                            ->options([
                                'pending' => 'Pending',
                                'paid' => 'Paid',
                            ])
                            ->native(false)
                            ->default('pending'),
                    ])
                    ->columns(1)->columnSpan(1),
            ])->columns(4);
    }
}
