<?php

namespace App\Filament\Resources\Ratings;

use App\Filament\Resources\Ratings\Pages\ManageRatings;
use App\Models\Rating;
use BackedEnum;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Resources\Resource;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Table;

class RatingResource extends Resource
{
    protected static ?string $model = Rating::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'Ratings';

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required(),
                TextInput::make('rating')
                    ->required()
                    ->numeric(),
                Textarea::make('review'),
            ]);
    }

    public static function infolist(Schema $schema): Schema
    {
        return $schema
            ->components([

                Section::make()->components([
TextEntry::make('name')->hiddenLabel(),
                TextEntry::make('review')
                    ->placeholder('-')->hiddenLabel(),
                    TextEntry::make('rating')
                    ->numeric()
                    ->formatStateUsing(fn ($state) => str_repeat('⭐', $state))->hiddenLabel(),
                ])->columnSpan(2),
                Section::make()->components([
                    IconEntry::make('is_approved')
                        ->boolean(),
                    TextEntry::make('created_at')
                        ->since()
                        ->placeholder('-'),
                    TextEntry::make('updated_at')
                        ->since()
                        ->placeholder('-'),
                ])->columnSpan(1),
                
            ])->columns(3);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('Ratings')
            ->columns([
                TextColumn::make('name')
                    ->searchable(),
                TextColumn::make('rating')
                    ->numeric()
                    ->formatStateUsing(fn ($state) => str_repeat('⭐', $state))
                    ->sortable(),
                TextColumn::make('review')->words(3),
                ToggleColumn::make('is_approved'),
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
                ViewAction::make(),
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ])->defaultPaginationPageOption(5)->defaultSort('created_at','desc');
    }

    public static function getPages(): array
    {
        return [
            'index' => ManageRatings::route('/'),
        ];
    }
}
