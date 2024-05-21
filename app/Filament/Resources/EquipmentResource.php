<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EquipmentResource\Pages;
use App\Filament\Resources\EquipmentResource\RelationManagers;
use App\Filament\Resources\EquipmentResource\RelationManagers\TrackingsRelationManager;
use App\Models\Equipment;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\Select;

class EquipmentResource extends Resource
{
    protected static ?string $model = Equipment::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('description')
                    ->label('Description')
                    ->placeholder('Enter the description of the equipment')
                    ->required(),
                Select::make('type')
                ->options([
                    'hose' => 'Hose',
                    'helmet' => 'Helmet',
                    'gloves' => 'Gloves',
                    'boots' => 'Boots',
                    'jacket' => 'Jacket',
                    'pants' => 'Pants',
                    'mask' => 'Mask',
                    'radio' => 'Radio',
                    'axe' => 'Axe',
                    'hydrant' => 'Hydrant',
                    'ladder' => 'Ladder',
                    'nozzle' => 'Nozzle',
                ]),

                TextInput::make('serial_number')
                    ->label('Serial Number')
                    ->placeholder('Enter the serial number of the equipment')
                    ->required(),
                TextInput::make('quantity')
                    ->label('Quantity')
                    ->placeholder('Enter the quantity of the equipment')
                    ->required(),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('description')
                   
                    ->searchable()
                    ->sortable(),
                TextColumn::make('type')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('serial_number')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('quantity')
                    ->searchable()
                    ->sortable(),

            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            TrackingsRelationManager::make(),
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListEquipment::route('/'),
            'create' => Pages\CreateEquipment::route('/create'),
            'edit' => Pages\EditEquipment::route('/{record}/edit'),
        ];
    }
}
