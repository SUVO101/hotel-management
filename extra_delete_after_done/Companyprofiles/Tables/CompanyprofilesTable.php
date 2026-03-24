<?php

namespace App\Filament\Resources\Companyprofiles\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class CompanyprofilesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->searchable(),
                TextColumn::make('gst_number')
                    ->searchable(),
                TextColumn::make('logo')
                    ->searchable(),
                TextColumn::make('fav_icon')
                    ->searchable(),
                TextColumn::make('phone1')
                    ->searchable(),
                TextColumn::make('phone2')
                    ->searchable(),
                TextColumn::make('email')
                    ->label('Email address')
                    ->searchable(),
                TextColumn::make('location')
                    ->searchable(),
                TextColumn::make('fb_link')
                    ->searchable(),
                TextColumn::make('insta_link')
                    ->searchable(),
                TextColumn::make('twitter_link')
                    ->searchable(),
                TextColumn::make('youtube_link')
                    ->searchable(),
                TextColumn::make('whatsapp_link')
                    ->searchable(),
                TextColumn::make('meta_title')
                    ->searchable(),
                TextColumn::make('meta_description')
                    ->searchable(),
                TextColumn::make('meta_keywords')
                    ->searchable(),
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
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
