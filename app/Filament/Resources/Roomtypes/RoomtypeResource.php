<?php

namespace App\Filament\Resources\Roomtypes;

use App\Filament\Resources\Roomtypes\Pages\CreateRoomtype;
use App\Filament\Resources\Roomtypes\Pages\EditRoomtype;
use App\Filament\Resources\Roomtypes\Pages\ListRoomtypes;
use App\Filament\Resources\Roomtypes\Pages\ViewRoomtype;
use App\Filament\Resources\Roomtypes\Schemas\RoomtypeForm;
use App\Filament\Resources\Roomtypes\Schemas\RoomtypeInfolist;
use App\Filament\Resources\Roomtypes\Tables\RoomtypesTable;
use App\Models\Roomtype;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class RoomtypeResource extends Resource
{
    protected static ?string $model = Roomtype::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'Room Types';

    public static function form(Schema $schema): Schema
    {
        return RoomtypeForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return RoomtypeInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return RoomtypesTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListRoomtypes::route('/'),
            'create' => CreateRoomtype::route('/create'),
            'view' => ViewRoomtype::route('/{record}'),
            'edit' => EditRoomtype::route('/{record}/edit'),
        ];
    }
}
