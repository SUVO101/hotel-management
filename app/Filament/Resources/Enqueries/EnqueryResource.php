<?php

namespace App\Filament\Resources\Enqueries;

use App\Filament\Resources\Enqueries\Pages\CreateEnquery;
use App\Filament\Resources\Enqueries\Pages\EditEnquery;
use App\Filament\Resources\Enqueries\Pages\ListEnqueries;
use App\Filament\Resources\Enqueries\Pages\ViewEnquery;
use App\Filament\Resources\Enqueries\Schemas\EnqueryForm;
use App\Filament\Resources\Enqueries\Schemas\EnqueryInfolist;
use App\Filament\Resources\Enqueries\Tables\EnqueriesTable;
use App\Models\Enquery;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class EnqueryResource extends Resource
{
    protected static ?string $model = Enquery::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'Enquery';

    public static function form(Schema $schema): Schema
    {
        return EnqueryForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return EnqueryInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return EnqueriesTable::configure($table);
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
            'index' => ListEnqueries::route('/'),
            'create' => CreateEnquery::route('/create'),
            'view' => ViewEnquery::route('/{record}'),
            'edit' => EditEnquery::route('/{record}/edit'),
        ];
    }
}
