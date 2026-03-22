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

                TextEntry::make('facilities.name') // relation show
                    ->badge()
                    ->label('Facilities')
                    ->color('success')
                    ->separator(', '),
            ])->columnSpan(2),

                    // 🔹 META INFO
        Section::make('Other Info')
            ->schema([
                IconEntry::make('is_active')
                    ->boolean(),

                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),

                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
            ])
            ->columns(1)->columnSpan(1),
            ])->columns(3),

            
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

        
            ])->columns(3);
    }
}
