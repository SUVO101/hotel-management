<?php

namespace App\Filament\Resources\Facilities;

use App\Filament\Resources\Facilities\Pages\ManageFacilities;
use App\Models\Facility;
use BackedEnum;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Table;
use UnitEnum;

class FacilityResource extends Resource
{
    protected static ?string $model = Facility::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-hashtag';
     protected static UnitEnum|string|null $navigationGroup = 'Room Management';
    protected static ?int $navigationSort = 4;

    protected static ?string $recordTitleAttribute = 'Hotel Facilities';


    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required(),
                FileUpload::make('icon')
                    ->directory('facilities')
                    ->image(),
            ])->columns(1);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('Hotel Facilities')
            ->defaultPaginationPageOption(5)
            ->columns([
                TextColumn::make('name')
                    ->searchable(),
                ImageColumn::make('icon')
                    ->searchable(),
                ToggleColumn::make('is_active'),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => ManageFacilities::route('/'),
        ];
    }
}
