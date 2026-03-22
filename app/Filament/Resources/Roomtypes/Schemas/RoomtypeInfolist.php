<?php

namespace App\Filament\Resources\Roomtypes\Schemas;

use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class RoomtypeInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                // 🔹 LEFT SIDE (Main Info)
                Section::make('Room Info')
                    ->schema([


                        Section::make('Details')
                            ->schema([

                                Section::make('Room Types')
                                    ->schema([
                                        TextEntry::make('name')
                                            ->hiddenLabel()
                                            ->weight('bold'),

                                        ImageEntry::make('cover_image')
                                            ->hiddenLabel()
                                            ->height(150)
                                            ->placeholder('-'),

                                        TextEntry::make('price_per_room')
                                            ->hiddenLabel()
                                            ->prefix('₹')
                                            ->numeric(),
                                    ])->columnSpan(2),

                                    Section::make('Facilities')
                                    ->schema([
                                        TextEntry::make('facilities.name') // relation show
                                            ->badge()
                                            ->hiddenLabel()
                                            ->color('success')
                                            ->separator(', '),

                                    ])->columnSpan(1),

                                     Section::make('Room No')
                                    ->schema([
                                        TextEntry::make('rooms.room_number') // relation show
                                            ->badge()
                                            ->hiddenLabel()
                                            ->color('success')
                                            ->separator(', '),

                                    ])->columnSpan(1),

                            ])->columns(4),


                        Section::make('Description')
                            ->schema([

                                TextEntry::make('description')
                                    ->hiddenLabel()
                                    ->placeholder('-')
                                    ->markdown()
                                    ->columnSpanFull(),
                            ]),


                        Section::make('Terms and Conditions')
                            ->schema([

                                TextEntry::make('terms_and_conditions')
                                    ->hiddenLabel()
                                    ->placeholder('-')
                                    ->markdown()
                                    ->columnSpanFull(),
                            ]),


                    ])->columnSpanFull(),

                // 🔹 RIGHT SIDE (Side Info)


                // 🔹 GALLERY (BOTTOM FULL WIDTH)
                Section::make('Gallery')
                    ->schema([
                        ImageEntry::make('galleries.image')
                            ->label('Images')
                            ->columnSpanFull(),
                    ])
                    ->columnSpanFull(),

                Section::make('Other Info')
                                    ->schema([
                                        IconEntry::make('is_active')
                                            ->boolean(),

                                        TextEntry::make('created_at')
                                            ->since()
                                            ->placeholder('-'),

                                        TextEntry::make('updated_at')
                                            ->since()
                                            ->placeholder('-'),
                                    ])
                                    ->columnSpanFull()->columns(3),


            ])->columns(3);
    }
}
