<?php

namespace App\Livewire;

use App\Models\Service;
use Livewire\Component;

class ServiceList extends Component
{

    public function render()
    {
        return view('livewire.service-list', [
            'services' => Service::with('serviceDuration')->get(),
        ]);
    }
}
