<?php

namespace App\Filament\Resources\Enqueries\Tables;

use Filament\Actions\ActionGroup;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\SelectColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Support\Carbon;

class EnqueriesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->searchable(),
                TextColumn::make('email')
                    ->label('Email address')
                    ->searchable()->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('phone')
                    ->searchable(),
                TextColumn::make('address')
                    ->searchable()->toggleable(isToggledHiddenByDefault: true),
                // TextColumn::make('checkin_date')
                //     ->date()
                //     ->sortable(),
                // TextColumn::make('checkout_date')
                //     ->date()
                //     ->sortable(),
                TextColumn::make('checkin_date')
                    ->label('Stay')
                    ->formatStateUsing(function ($record) {
                        $checkin = Carbon::parse($record->checkin_date);
                        $checkout = Carbon::parse($record->checkout_date);

                        // same month
                        if ($checkin->format('M') === $checkout->format('M')) {
                            return $checkin->format('M d') . ' - ' . $checkout->format('d');
                        }

                        // different month
                        return $checkin->format('M d') . ' - ' . $checkout->format('M d');
                    })
                    ->sortable(),
                TextColumn::make('roomtype.name')->tooltip(fn($record) => $record->roomtype->name)->words(1)->badge()->color('success')->searchable(),
                TextColumn::make('number_of_rooms')
                    ->tooltip('Rooms')
                    ->label('RM')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('number_of_adults')
                    ->tooltip('Adults')
                    ->label('Ad')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('number_of_children')
                    ->tooltip('Kids')
                    ->label('Kids')
                    ->numeric()
                    ->sortable(),
                SelectColumn::make('status')
                    ->options([
                        'new' => 'New',
                        'read' => 'Read',
                        'contacted' => 'Contacted',
                        'replied' => 'Replied',
                        'booked' => 'Booked',
                        'cancelled' => 'Cancelled',
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
                    DeleteAction::make(),
                ])->button(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ])
            ->defaultPaginationPageOption(5)
            ->defaultSort('created_at', 'desc');
    }
}
