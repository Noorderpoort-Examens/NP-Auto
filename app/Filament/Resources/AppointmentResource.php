<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AppointmentResource\Pages;
use App\Filament\Resources\AppointmentResource\RelationManagers;
use App\Models\Appointment;
use App\Models\Mechanic;
use App\Models\Service;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class AppointmentResource extends Resource
{
    protected static ?string $model = Appointment::class;

    protected static ?string $navigationIcon = 'heroicon-o-calendar-days';

    public static function getPluralLabel(): ?string
    {
        return __('Appointments');
    }

    public static function getLabel(): ?string
    {
        return __('Appointment');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('client_name')
                    ->label('Client name')
                    ->required(),
                TextInput::make('phonenumber')
                    ->tel()
                    ->required(),
                Textarea::make('additional_info')
                    ->label('Additional info'),
                DatePicker::make('date')
                    ->native(false) //disableddates does not work with native datepicker
                    ->displayFormat('d-M-Y')
                    ->disabledDates(function () {
                        //you dont need to check to see if you can plan in a date for a day that has passed.
                        $appointments = Appointment::whereDate('date', '>=', now()->toDateString())->get();

                        return $appointments
                            ->groupBy('date')
                            ->filter(function ($group) {
                                return $group->sum(fn($appointment) => $appointment->service->serviceDuration->hours ?? 0) >= 48;
                            })
                            ->keys() //take only the dates from ->groupBy('date') of the returned "full" days
                            ->toArray(); //send as array to work with disableddates()
                    })
                    ->required(),
                Select::make('service_id')
                    ->label('Service type')
                    ->relationship('service', 'name')
                    ->options(Service::all()->pluck('title', 'id'))
                    ->required(),
                Select::make('mechanic_id')
                    ->label('Mechanic')
                    ->relationship('mechanic', 'name')
                    ->options(Mechanic::all()->pluck('name', 'id'))
                    ->required(),
                /*
                 * status is a text field to give employees mare freedom describing any possible edge cases like "client didnt show up",
                 * such nuance is lost in a set few statusses.
                 */
                TextInput::make('status')
                    ->required()
                    ->helpertext('Het liefst zo kort mogelijk houden.'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('client_name')
                    ->label('Client name')
                    ->searchable(),
                TextColumn::make('date')
                    ->date('d-M-Y')
                    ->searchable(),
                TextColumn::make('mechanic.name')
                    ->label('Mechanic')
                    ->searchable(),
                TextColumn::make('service.title')
                    ->label('Service type'),
            ])
            ->filters([
                SelectFilter::make('mechanic_id')
                    ->label('Mechanic')
                    ->relationship('mechanic', 'name'),
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
        if (auth()->check() && !auth()->user()->can('manage appointments')) {
            abort(403, __('Insufficient permissions'));
        }

        return [
            'index' => Pages\ListAppointments::route('/'),
            'create' => Pages\CreateAppointment::route('/create'),
            'edit' => Pages\EditAppointment::route('/{record}/edit'),
        ];
    }
}
