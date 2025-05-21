<?php

namespace App\Filament\Resources\AppointmentResource\Pages;

use App\Filament\Resources\AppointmentResource;
use App\Models\Appointment;
use App\Models\Service;
use Filament\Actions;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\EditRecord;

class EditAppointment extends EditRecord
{
    protected static string $resource = AppointmentResource::class;

    protected function beforeSave(): void
    {
        //get the selected date.
        $selectedDate = $this->data['date'];

        $bookedHours = Appointment::whereDate('date', $selectedDate)
            ->with('service.serviceDuration')
            ->get()
            ->sum(fn($appt) => $appt->service->serviceDuration->hours ?? 0); //default to 0 if you cant find ANY appointments for the day

        $newHours = Service::with('serviceDuration')
            ->find($this->data['service_id'])
            ?->serviceDuration?->hours ?? 0;

        if ($bookedHours + $newHours > 48) {
            Notification::make()
                ->title('Afspraak verplaatsen niet gelukt')
                ->body('Het is niet mogelijk om de afspraak in te plannen, Deze datum heeft niet genoeg tijd voor deze afspraak.')
                ->danger()
                ->send();

            $this->halt();
    }
}

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
