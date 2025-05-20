<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OccasionResource\Pages;
use App\Models\Occasion;
use App\Rules\ValidateLicencePlate;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\CheckboxColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class OccasionResource extends Resource
{
    protected static ?string $model = Occasion::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('licenceplate')
                    ->required()
                    ->unique(ignoreRecord: true)
                    ->rule(new ValidateLicencePlate)
                    ->helperText('Format XX123X')
                    ->readOnly(fn (string $context) => $context === 'edit')
                    ->disabled(fn (string $context) => $context === 'edit'),
                TextInput::make('advertisingtitle')
                    ->required(),
                TextInput::make('askprice')
                    ->numeric()
                    ->minValue(0)
                    ->maxValue(2000000)
                    ->helperText('Alleen een komma bij decimalen, getal wordt door systeem met punten verdeeld.')
                    ->required(),
                TextInput::make('mileage')
                    ->integer()
                    ->minValue(0)
                    ->maxValue(20000000)
                    ->required(),
                TextInput::make('transmission')
                    ->required(),
                Textarea::make('description')
                    ->required(),
                Fieldset::make('Status')
                    ->schema([
                        Checkbox::make('sold'),
                        Checkbox::make('hidden'),
                        Checkbox::make('reserved')
                            ->disabled(),
                    ])
                    ->visible(fn (string $context) => $context === 'edit'),
                FileUpload::make('images')
                    ->multiple()
                    ->image()
                    ->directory('occasions')
                    ->reorderable(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('licenceplate')
                    ->searchable(),
                TextColumn::make('advertisingtitle')
                    ->searchable(),
                TextColumn::make('brand')
                    ->searchable(),
                TextColumn::make('model')
                    ->searchable(),
                CheckboxColumn::make('sold'),
                CheckboxColumn::make('hidden'),
            ])
            ->filters([
                SelectFilter::make('sold')
                    ->options([
                        '1' => 'alleen verkocht',
                        '0' => 'Alleen beschikbaar',
                    ]),
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
            'index' => Pages\ListOccasions::route('/'),
            'create' => Pages\CreateOccasion::route('/create'),
            'edit' => Pages\EditOccasion::route('/{record}/edit'),
        ];
    }
}
