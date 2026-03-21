<?php

namespace App\Filament\Resources\Roomtypes\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class RoomtypeForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required(),
                FileUpload::make('cover_image')
                        ->image(),
                RichEditor::make('description')
                    ->columnSpanFull(),
                TextInput::make('price_per_room')
                    ->required()
                    ->numeric(),
                RichEditor::make('terms_and_conditions')
                    ->columnSpanFull(),
            ]);
    }
}
