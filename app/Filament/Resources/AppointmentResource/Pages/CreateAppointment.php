<?php

namespace App\Filament\Resources\AppointmentResource\Pages;

use App\Filament\Resources\AppointmentResource;
use App\Models\Appointment;
use App\Models\Service;
use Carbon\Carbon;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;

class CreateAppointment extends CreateRecord
{
    protected static string $resource = AppointmentResource::class;

    protected function beforeCreate(): void
    {
        //get the selected date.
        $selectedDate = $this->data['date'] ?? null;

        // check to see if date has passed before any other check
        if ($selectedDate && Carbon::parse($selectedDate)->isBefore(now())) {
            Notification::make()
                ->title('Ongeldige datum')
                ->body('Datum is al geweest.')
                ->danger()
                ->send();

            $this->halt();
        }

        //check if appointment can fit
        $bookedHours = Appointment::whereDate('date', $selectedDate)
            ->with('service.serviceDuration')
            ->get()
            ->sum(fn($appt) => $appt->service->serviceDuration->hours ?? 0);

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
}
