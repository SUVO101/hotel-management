<?php

namespace App\Filament\Resources\Companyprofiles;

use App\Filament\Resources\Companyprofiles\Pages\CreateCompanyprofile;
use App\Filament\Resources\Companyprofiles\Pages\EditCompanyprofile;
use App\Filament\Resources\Companyprofiles\Pages\ListCompanyprofiles;
use App\Filament\Resources\Companyprofiles\Pages\ViewCompanyprofile;
use App\Filament\Resources\Companyprofiles\Schemas\CompanyprofileForm;
use App\Filament\Resources\Companyprofiles\Schemas\CompanyprofileInfolist;
use App\Filament\Resources\Companyprofiles\Tables\CompanyprofilesTable;
use App\Models\Companyprofile;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class CompanyprofileResource extends Resource
{
    protected static ?string $model = Companyprofile::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'Company Profile';

    public static function form(Schema $schema): Schema
    {
        return CompanyprofileForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return CompanyprofileInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return CompanyprofilesTable::configure($table);
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
            'index' => ListCompanyprofiles::route('/'),
            'create' => CreateCompanyprofile::route('/create'),
            'view' => ViewCompanyprofile::route('/{record}'),
            'edit' => EditCompanyprofile::route('/{record}/edit'),
        ];
    }
}
