<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OccasionResource\Pages;
use App\Models\Occasion;
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
                TextInput::make('liscenceplate')
                    ->label('Kenteken')
                    ->required()
                    ->dehydrateStateUsing(fn ($state) => strtoupper(str_replace('-', '', $state))) //incase instructions arent read
                    ->rule(['regex:/^((([0-9]{3}(?![0-9]))|([a-z]{3}(?![a-z])))|(([0-9]{1,2})|([a-z]{1,2}))|-){6,}/']) // replace later
                    ->helperText('Format XX123X')
                    ->validationAttribute('kenteken')
                    ->readOnly(fn (string $context) => $context === 'edit'),
                TextInput::make('advertisingtitle')
                    ->label('Advertentie Titel')
                    ->required(),
                TextInput::make('askprice')
                    ->label('Vraag prijs')
                    ->integer()
                    ->minValue(0)
                    ->maxValue(2000000)
                    ->required(),
                TextInput::make('mileage')
                    ->label('Kilometerstand')
                    ->integer()
                    ->minValue(0)
                    ->maxValue(2000000)
                    ->required(),
                TextInput::make('transmission')
                    ->label('Transmissie')
                    ->required(),
                Textarea::make('description')
                    ->label('Omschrijving')
                    ->required(),
                Fieldset::make('Status')
                    ->schema([
                        Checkbox::make('sold')
                            ->label('Verkocht'),
                        Checkbox::make('reserved')
                            ->label('Gereserveerd'),
                        Checkbox::make('hidden')
                            ->label('Niet tonen'),
                    ])
                    ->visible(fn (string $context) => $context === 'edit'),
                FileUpload::make('images')
                    ->label('Afbeeldingen')
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
                TextColumn::make('liscenceplate')
                    ->label('Kenteken')
                    ->searchable(),
                TextColumn::make('advertisingtitle')
                    ->label('Advertentie Titel')
                    ->searchable(),
                TextColumn::make('brand')
                    ->label('Merk')
                    ->searchable(),
                TextColumn::make('model')
                    ->label('Model')
                    ->searchable(),
                CheckboxColumn::make('sold')
                    ->label('Verkocht'),
                CheckboxColumn::make('hidden')
                    ->label('Niet tonen in winkel'),
            ])
            ->filters([
                SelectFilter::make('sold')
                    ->label('Verkocht')
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
