<?php

namespace App\Filament\Resources\Roomtypes\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Str;

class RoomtypeForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
        ->columns(3)
            ->components([
                Section::make()->components([
                        TextInput::make('name')
                        ->live(onBlur: true)
                        ->afterStateUpdated(function ($state, callable $set) {
                            $set('slug', Str::slug($state));
                        })
                        ->required(),
                        TextInput::make('slug')
                        ->disabled()
                        ->live(onBlur: true)
                        ->required(),
                    RichEditor::make('description')
                        ->columnSpanFull(),
                    RichEditor::make('terms_and_conditions')
                        ->columnSpanFull(),
                ])->columnSpan(2),

                Section::make()->components([
                        FileUpload::make('cover_image')
                        ->directory('roomtypes/cover_image')
                                ->image(),
                        TextInput::make('price_per_room')
                            ->required()
                            ->numeric(),
                        Select::make('facility_id')
                            ->relationship('facilities', 'name')
                            ->multiple()
                            ->preload(),
                ])->columnSpan(1),

                Section::make()->schema([
                    Repeater::make('galleries')
                        ->relationship() // VERY IMPORTANT
                        ->schema([
                            FileUpload::make('image')
                                ->directory('roomtypes')
                                ->image()
                                ->required()->columnSpan(1),
                        ])->grid(3),
                ])->columnSpanFull(),
            ]);
    }
}
