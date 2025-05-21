<?php

namespace App\Filament\Clusters\ServiceManagement\Resources;

use App\Filament\Clusters\ServiceManagement;
use App\Filament\Clusters\ServiceManagement\Resources\ServiceResource\Pages;
use App\Models\Service;
use App\Models\ServiceDuration;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class ServiceResource extends Resource
{
    protected static ?string $model = Service::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $cluster = ServiceManagement::class;

    public static function getPluralLabel(): ?string
    {
        return __('Services');
    }

    public static function getLabel(): ?string
    {
        return __('Services');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('title')
                    ->unique(ignoreRecord: true)
                    ->required(),
                TextInput::make('description')
                    ->required(),
                TextInput::make('price')
                    ->numeric()
                    ->required(),
                Select::make('service_duration_id')
                    ->label('Service Duration')
                    ->relationship('serviceDuration', 'name')
                    ->options(ServiceDuration::all()->pluck('name', 'id'))
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')
                    ->searchable(),
                TextColumn::make('description'),
                TextColumn::make('price'),
                TextColumn::make('serviceduration.name')
                ->label('Duration'),
            ])
            ->filters([
                SelectFilter::make('service_duration_id')
                    ->label('Duration')
                    ->relationship('serviceduration', 'name'),
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
            'index' => Pages\ListServices::route('/'),
            'create' => Pages\CreateService::route('/create'),
            'edit' => Pages\EditService::route('/{record}/edit'),
        ];
    }
}
