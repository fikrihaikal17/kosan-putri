<?php

namespace App\Filament\Resources\Rooms\Tables;

use Filament\Actions\ActionGroup;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Table;

class RoomsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('Nama Kamar')
                    ->searchable()
                    ->sortable()
                    ->weight('bold'),

                TextColumn::make('bathroom_type')
                    ->label('Tipe KM')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'Kamar Mandi Dalam' => 'success',
                        default => 'warning',
                    }),

                TextColumn::make('availability_status')
                    ->label('Ketersediaan')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'Tersedia' => 'success',
                        'Penuh' => 'danger',
                        default => 'gray',
                    }),

                TextColumn::make('formatted_price')
                    ->label('Harga / Label')
                    ->sortable(['price']),

                ToggleColumn::make('is_active')
                    ->label('Aktif'),

                TextColumn::make('sort_order')
                    ->label('Urutan')
                    ->sortable(),
            ])
            ->defaultSort('sort_order', 'asc')
            ->reorderable('sort_order')
            ->recordActions([
                ActionGroup::make([
                    EditAction::make(),
                    DeleteAction::make(),
                ]),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
