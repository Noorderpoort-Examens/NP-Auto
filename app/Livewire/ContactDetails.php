<?php

namespace App\Livewire;

use Livewire\Component;

class ContactDetails extends Component
{
    public array $contact = [
        [
            'phonenumber' => '085-1234567',
            'email' => 'info@np-auto.nl',
        ]
    ];

    public function render()
    {
        return view('livewire.contact-details', [
            'contact' => $this->contact,
        ]);
    }
}
