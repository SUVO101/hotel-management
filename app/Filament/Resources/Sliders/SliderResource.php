<?php

namespace App\Filament\Resources\Sliders;

use App\Filament\Resources\Sliders\Pages\ManageSliders;
use App\Models\Slider;
use BackedEnum;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\SelectColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Table;

class SliderResource extends Resource
{
    protected static ?string $model = Slider::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-photo';

    protected static ?string $recordTitleAttribute = 'Slider';

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                RichEditor::make('text')
                    ->required(),
                FileUpload::make('image')
                   ->directory('sliders')
                    ->image()
                    ->required(),
                TextInput::make('link'),
            ])->columns(1);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('Slider')
            ->columns([
                // TextColumn::make('text')
                //     ->searchable(),
                ImageColumn::make('image'),
                TextColumn::make('link')
                    ->searchable(),
                SelectColumn::make('sort_order')
    ->options([
        1 => '1',
        2 => '2',
        3 => '3',
        4 => '4',
        5 => '5'
    ])->native(false)->default(0),
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
                ViewAction::make(),
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ])->defaultSort('created_at','desc')->defaultPaginationPageOption(5);
    }

    public static function getPages(): array
    {
        return [
            'index' => ManageSliders::route('/'),
        ];
    }
}
