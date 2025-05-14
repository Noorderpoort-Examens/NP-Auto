<?php

namespace App\Filament\Clusters\UserManagement\Resources;

use App\Filament\Clusters\UserManagement;
use App\Filament\Clusters\UserManagement\Resources\RoleResource\Pages;
use App\Models\Role;
use Filament\Forms\Components\CheckboxList;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class RoleResource extends Resource
{
    protected static ?string $model = Role::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $cluster = UserManagement::class;

    public static function getNavigationSort(): ?int
    {
        return 2;
    }

    public static function getPluralLabel(): ?string
    {
        return __('Roles');
    }

    public static function getLabel(): ?string
    {
        return __('Role');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->required()
                    ->unique(ignoreRecord: true),

                CheckboxList::make('permissions')
                    ->relationship('permissions', 'name')
                    ->columns(2)
                    ->bulkToggleable(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->sortable(),
                TextColumn::make('permissions.name')
                    ->badge()
                    ->separator(', ')
            ])
            ->filters([])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        if (auth()->check() && !auth()->user()->can('manage roles')) {
            abort(403, __('Insufficient permissions'));
        }

        return [
            'index' => Pages\ListRoles::route('/'),
            'create' => Pages\CreateRole::route('/create'),
            'edit' => Pages\EditRole::route('/{record}/edit'),
        ];
    }
}
