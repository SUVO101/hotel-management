<?php

namespace App\Filament\Resources\Bookings\Tables;

use Filament\Actions\ActionGroup;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\SelectColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Table;

class BookingsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('enquery_id')
                    ->label('Enq.ID')
                    ->tooltip('Enquery ID')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('checkin_date')
                ->label('Check-In')
                    ->date()
                    ->sortable(),
                TextColumn::make('checkout_date')
                ->label('Check-Out')
                    ->date()
                    ->sortable(),
                TextColumn::make('total_amount')
                    ->label('Total')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('paid_amount')
                    ->label('Paid')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('remaining_amount')
                    ->label('Remaining')
                    ->numeric()
                    ->sortable(),
                ToggleColumn::make('is_checkin')
                    ->label('Check-In'),
                ToggleColumn::make('is_checkout')
                ->afterStateUpdated(function ($state,$record) {
                    //dd($state,$record->rooms);
                    // ✅ 1. Room status free
                    if($state){
                        foreach ($record->rooms as $room) {
                            $room->update(['status' => 'available']);
                        }
                        // ✅ 2. Pivot table delete
                        $record->rooms()->detach();
                    }
                })
                    ->label('Check-Out'),
                SelectColumn::make('status')
                    ->options([
                        'pending' => 'Pending',
                        'paid' => 'Paid',
                    ])
                    ->native(false)
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
                ActionGroup::make([
                    ViewAction::make(),
                    EditAction::make(),
                    DeleteAction::make()
                ])->iconButton()->tooltip('Actions')->color('primary'),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
