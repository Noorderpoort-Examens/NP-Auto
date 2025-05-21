<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OpeningTimeResource\Pages;
use App\Models\OpeningTime;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\TimePicker;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class OpeningTimeResource extends Resource
{
    protected static ?string $model = OpeningTime::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function getPluralLabel(): ?string
    {
        return __('Opening Times');
    }

    public static function getLabel(): ?string
    {
        return __('Time');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('day')
                    ->required(),
                TimePicker::make('start')
                    ->required()
                    ->label('Opent om')
                    ->before('end'),
                TimePicker::make('end')
                    ->required()
                    ->label('Sluit om')
                    ->after('start'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('day'),
                TextColumn::make('start'),
                TextColumn::make('end')
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
        if (auth()->check() && !auth()->user()->can('manage information')) {
            abort(403, __('Insufficient permissions'));
        }

        return [
            'index' => Pages\ListOpeningTimes::route('/'),
            'create' => Pages\CreateOpeningTime::route('/create'),
            'edit' => Pages\EditOpeningTime::route('/{record}/edit'),
        ];
    }
}
