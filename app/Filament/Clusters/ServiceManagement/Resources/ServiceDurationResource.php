<?php

namespace App\Filament\Clusters\ServiceManagement\Resources;

use App\Filament\Clusters\ServiceManagement;
use App\Filament\Clusters\ServiceManagement\Resources\ServiceDurationResource\Pages;
use App\Models\ServiceDuration;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class ServiceDurationResource extends Resource
{
    protected static ?string $model = ServiceDuration::class;

    protected static ?string $navigationIcon = 'heroicon-o-clock';

    protected static ?string $cluster = ServiceManagement::class;

    public static function getPluralLabel(): ?string
    {
        return __('Service durations');
    }

    public static function getLabel(): ?string
    {
        return __('Service duration');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->unique(ignoreRecord: true)
                    ->required(),
                TextInput::make('hours')
                    ->integer()
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name'),
                TextColumn::make('hours'),
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
        if (auth()->check() && !auth()->user()->can('manage services')) {
            abort(403, __('Insufficient permissions'));
        }

        return [
            'index' => Pages\ListServiceDurations::route('/'),
            'create' => Pages\CreateServiceDuration::route('/create'),
            'edit' => Pages\EditServiceDuration::route('/{record}/edit'),
        ];
    }
}
