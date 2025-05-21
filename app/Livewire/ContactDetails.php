<?php

namespace App\Livewire;

use App\Models\Information;
use Livewire\Component;

class ContactDetails extends Component
{
    public function render()
    {
        $phonenumber = Information::where('type', 'phonenumber')->value('content');
        $email = Information::where('type', 'email')->value('content');
        $adress = Information::where('type', 'adress')->value('content');
        $zipcode = Information::where('type', 'zipcode')->value('content');

        return view('livewire.contact-details', [
            'phonenumber' => $phonenumber,
            'email' => $email,
            'adress' => $adress,
            'zipcode' => $zipcode,
        ]);
    }
}
