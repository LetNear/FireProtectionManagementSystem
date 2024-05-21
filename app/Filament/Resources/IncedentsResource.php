<?php

namespace App\Filament\Resources;

use App\Filament\Resources\IncedentsResource\Pages;
use App\Filament\Resources\IncedentsResource\RelationManagers;
use App\Models\Incedents;
use Filament\Forms;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\FileUpload;

class IncedentsResource extends Resource
{
    protected static ?string $model = Incedents::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('address')
                    ->label('Address')
                    ->placeholder('Enter the address of the incedent')
                    ->required(),
                Select::make('type')
                    ->options([
                        'fire' => 'Fire',
                        'accident' => 'Accident',
                        'theft' => 'Theft',
                    ]),

                DateTimePicker::make('time_start'),
                TextInput::make('landmark')
                    ->label('Landmark')
                    ->placeholder('Enter the landmark of the incedent')
                    ->required(),
                FileUpload::make('image')
                    ->image()
                    ->directory('incedents')
                    ->imageEditor()

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('address')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('type')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('time_start')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('landmark')
                    ->searchable()
                    ->sortable(),
                ImageColumn::make('image')
                    ->visibility('private')

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
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListIncedents::route('/'),
            'create' => Pages\CreateIncedents::route('/create'),
            'edit' => Pages\EditIncedents::route('/{record}/edit'),
        ];
    }
}
